<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WishlistResource;
use App\Models\Wishlist;
use App\Services\API\Messages;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('product.category','product.images')
            ->where('user_id', auth()->id())
            ->get();
        $wishlistResource = WishlistResource::collection($wishlists)->resolve();
        return Messages::success($wishlistResource, __('keywords.wishlist_fetched_successfully'));
    }
    public function store(Request $request)
    {
        $wishlist = Wishlist::updateOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id
        ]);
        return Messages::success($wishlist, __('keywords.add_to_wishlist_success'));
    }
}
