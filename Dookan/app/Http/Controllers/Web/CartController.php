<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\UserAddressResource;
use App\Models\Cart;
use App\Models\UserAddress;
use App\Models\Wishlist;
use Flasher\Laravel\Facade\Flasher;
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

        return view('Home.cart', compact('cartResource','distinctProductCount','addressesResource'));
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
        Flasher::addSuccess(__('keywords.added_to_cart'));


        return redirect()->back();
    }

}
