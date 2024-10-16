<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsResource;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['getSellers','getProductsBySellerID']);
    }
    public function dashboard()
    {
        $sellerId = Auth::id();
        return view('seller.dashboard', [
            'usersCount' => $this->getUsersCount($sellerId),
            'productsCount' => $this->getProductsCount($sellerId),
            'totalSales' => $this->getTotalSales($sellerId),
        ]);
    }

    public function getProducts()
    {
        $products = $this->queryProductsByUser(auth()->user()->id);
        $productsResource = ProductsResource::collection($products)->resolve();
        return view('seller.tables.products', compact('productsResource'));
    }

    public function getUsers($sellerId)
    {
        $users = User::whereHas('orders.items.product', function ($query) use ($sellerId) {
            $query->where('user_id', $sellerId);
        })->distinct()->get();
        return view('seller.tables.users', compact('users'));
    }

    public function getSellers()
    {
        $sellers = User::where('role', 'seller')->get();
        return view('Home.all_sellers', compact('sellers'));
    }

    public function getProductsBySellerID($vendorID)
    {
        $products = $this->queryProductsByUser($vendorID);
        $productsResource = ProductsResource::collection($products)->resolve();
        return view('Home.seller_products', compact('productsResource') );
    }

    private function queryProductsByUser($userId)
    {
        return Products::with(['user', 'category', 'images'])
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->get();
    }

    private function getUsersCount($sellerId)
    {
        return User::whereHas('orders.items.product', function ($query) use ($sellerId) {
            $query->where('user_id', $sellerId);
        })->distinct()->count();
    }

    private function getProductsCount($sellerId)
    {
        return Products::where('user_id', $sellerId)->count();
    }

    private function getTotalSales($sellerId)
    {
        return OrderItem::whereHas('product', function ($query) use ($sellerId) {
            $query->where('user_id', $sellerId);
        })->sum('price * quantity');
    }
}
