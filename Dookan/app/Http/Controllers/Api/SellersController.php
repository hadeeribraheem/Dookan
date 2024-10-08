<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiProductResource;
use App\Http\Resources\ProductsResource;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'role:seller,admin']);
    }
    public function dashboard()
    {
        $sellerId = Auth::id();
        $usersCount = User::whereHas('orders.items.product', function ($query) use ($sellerId) {
            $query->where('user_id', $sellerId);
        })->distinct()->count();

        $productsCount = Products::where('user_id', $sellerId)->count();

        $totalSales = OrderItem::whereHas('product', function ($query) use ($sellerId) {
            $query->where('user_id', $sellerId);
        })->sum(DB::raw('price * quantity'));

        return response()->json([
            'usersCount' => $usersCount,
            'productsCount' => $productsCount,
            'totalSales' => $totalSales,
        ], 200);
    }
    public function getProducts()
    {
        $userId = auth()->user()->id;
        $products = Products::with(['user','category','images'])
            ->where('user_id', $userId)
            ->orderBy('id','DESC')
            ->get();

        $productsResource = ApiProductResource::collection($products)->resolve();
        //dd($productsResource);
        return $productsResource;
    }
    public function getUsers($sellerId)
    {
        $users = User::whereHas('orders.items.product', function ($query) use ($sellerId) {
            $query->where('user_id', $sellerId);
        })->distinct()->get();
        return $users;
    }
}
