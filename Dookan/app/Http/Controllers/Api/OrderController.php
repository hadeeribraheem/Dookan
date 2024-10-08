<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\UserAddress;
use App\Services\AddressService;
use App\Services\API\Messages;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
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

        return Messages::success(__('keywords.order_placed_success'));
    }
}
