<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
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
               // return view('admin.tables.products', compact('productsResource'));
            }
            elseif (auth()->user()->role === 'seller') {
               // return view('admin.tables.products', compact('productsResource'));
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
                    'price' => $itemData['price'], // Use the submitted product's price
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

        if ($order && $order->status === 'Pending') {
            $order->delete();
            session()->flash('success', __('keywords.order_cancel_success'));
        } else {
            session()->flash('error', __('keywords.order_cancel_fail'));
        }

        return redirect()->back();
    }
}
