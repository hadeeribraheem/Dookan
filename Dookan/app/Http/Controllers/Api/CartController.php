<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\UserAddressResource;
use App\Models\Cart;
use App\Models\UserAddress;
use App\Models\Wishlist;
use App\Services\API\Messages;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product.images')
            ->where('user_id', auth()->id())
            ->get();

        $cartResource = CartResource::collection($carts)->resolve();
        $distinctProductCount = collect($cartResource)->pluck('name')->count();
        $addresses = UserAddress::where('user_id', auth()->id())
            ->get();
        $addressesResource = UserAddressResource::collection($addresses)->resolve();

        return response()->json([
            'Cart: ' => $cartResource,
            'Count of Products: ' => $distinctProductCount,
            'Addresses: ' => $addressesResource,
        ], 200);
    }

    public function store(Request $request)
    {
        $cart = Cart::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $request->product_id],
            ['quantity' => $request->quantity]
        );

        $wishlistItem = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();
        if($wishlistItem){
            $wishlistItem->delete();
        }
        return Messages::success($cart,__('keywords.added_to_cart'));
    }
}
