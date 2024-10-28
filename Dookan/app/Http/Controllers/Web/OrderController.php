<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderItemResource;
use App\Http\Resources\OrderResource;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Products;
use App\Models\UserAddress;
use App\Services\AddressService;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    public function index(){
            if (auth()->user()->role === 'admin') {
                $blade_orders = Order::with(['items.product.images', 'address'])
                                ->get();

                $orders = OrderResource::collection($blade_orders)->resolve();
                return view('admin.tables.orders', compact('orders'));
            }
            elseif (auth()->user()->role === 'seller') {
                $user = auth()->user();
                $blade_orders = Order::whereHas('items.product', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->with(['items.product.images', 'address'])->get();

                $orders = OrderResource::collection($blade_orders)->resolve();
                return view('seller.tables.orders', compact('orders'));
            }
                $userId = auth()->id();
                $blade_orders = Order::with(['items.product.images', 'address'])
                    ->where('user_id', $userId)
                    ->get();

                $orders = OrderResource::collection($blade_orders)->resolve();
                return view('Home.customer_profile.orders', compact('orders'));
    }
    public function store(OrderRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();

        if (!isset($data['selected_address'])) {
            $address = $this->addressService->storeAddress($data, $user->id);
        } else {
            $address = UserAddress::findOrFail($data['selected_address']);
        }

        $cartItems = $data['cart_items'];
        $totalPrice = 0;

        foreach ($cartItems as $itemId => $itemData) {
            $cartItem = Cart::find($itemId);
            if ($cartItem) {
                $cartItem->quantity = $itemData['quantity'];
                $cartItem->save();

                $totalPrice += $itemData['price'] * $cartItem->quantity;

                $product = Products::find($cartItem->product_id);
                if ($product) {
                    $product->quantity -= $cartItem->quantity;

                    if ($product->quantity <= 0) {
                        $product->quantity = 0;
                        $product->status = 0;
                    }

                    $product->save();
                }
            }
        }

        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $address->id,
            'total_price' => $totalPrice + 5, // Add shipping cost
        ]);

        foreach ($cartItems as $itemId => $itemData) {
            $cartItem = Cart::find($itemId);
            if ($cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $itemData['price'],
                ]);
            }
        }

        Cart::where('user_id', $user->id)->delete();

        Flasher::addSuccess(__('keywords.order_placed_success'));
        return redirect()->route('products.index');
    }

    public function cancelOrder($orderId)
    {
        $order = Order::find($orderId);

        if ($order && ($order->status === 'Pending') ) {
            $order->delete();
            Flasher::addSuccess(__('keywords.order_cancel_success'));
        } else {
            Flasher::addWarning(__('keywords.order_cancel_fail'));
        }

        return redirect()->back();
    }

    public function updateOrderStatus(Order $order)
    {
        $itemStatuses = $order->items()->pluck('status')->unique();

        if ($itemStatuses->contains('Pending')) {
            $order->status = 'Pending';
        } elseif ($itemStatuses->contains('Shipped') && !$itemStatuses->contains('Pending') && !$itemStatuses->contains('Delivered')) {
            $order->status = 'Shipped';
        } elseif ($itemStatuses->count() === 1 && $itemStatuses->contains('Delivered')) {
            $order->status = 'Delivered';
        }

        $order->save();
    }

    public function orderItemUpdateStatus(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:order_items,id',
            'status' => 'required|string|in:Pending,Shipped,Delivered',
        ]);

        $item = OrderItem::findOrFail($request->item_id);
        if (auth()->user()->role === 'admin' ||$item->product->user_id === auth()->id()) {
            $item->status = $request->status;
            $item->save();

            $this->updateOrderStatus($item->order);

            return redirect()->back()->with('success', 'Item status updated successfully.');
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }
    public function showOrderItems($orderId)
    {
        if (auth()->user()->role === 'admin') {
            // For admin, retrieve the full order with all items
            $blade_order_items = Order::with('items.product.images')
                ->where('id', $orderId)
                ->first();

            $order = OrderResource::make($blade_order_items)->resolve();

            return view('admin.tables.order_items', compact('order'));
        } elseif (auth()->user()->role === 'seller') {

            $blade_order_items = Order::with(['items' => function ($query) {
                $query->whereHas('product', function ($productQuery) {
                    $productQuery->where('user_id', auth()->id());
                });
            }, 'items.product.images'])
                ->where('id', $orderId)
                ->first();

            $order = OrderResource::make($blade_order_items)->resolve();

            return view('seller.tables.order_items', compact('order'));
        }
    }

}
