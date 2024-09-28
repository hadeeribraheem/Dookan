<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsResource;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{

    public function dashboard()
    {
        $sellerId = Auth::id();
        $usersCount = User::whereHas('orders.items.product', function ($query) use ($sellerId) {
            $query->where('user_id', $sellerId);
        })->distinct()->count();

        $productsCount = Products::where('user_id', $sellerId)->count();

        //total revenue
        $totalSales = OrderItem::whereHas('product', function ($query) use ($sellerId) {
            $query->where('user_id', $sellerId);
        })->sum(DB::raw('price * quantity'));

        return view('seller.dashboard', compact('usersCount', 'productsCount', 'totalSales'));
    }
    public function getProducts()
    {
        $userId = auth()->user()->id;
        $products = Products::with(['user','category','images'])
            ->where('user_id', $userId)
            ->orderBy('id','DESC')
            ->get();

        $productsResource = ProductsResource::collection($products)->resolve();
        //dd($productsResource);
        return view('seller.tables.products', compact('productsResource'));
    }
    public function getUsers($sellerId)
    {
        $users = User::whereHas('orders.items.product', function ($query) use ($sellerId) {
                        $query->where('user_id', $sellerId);
                    })->distinct()->get();
        return view('seller.tables.users', compact('users'));
    }
}
