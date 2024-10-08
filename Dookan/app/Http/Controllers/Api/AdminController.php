<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Models\Categories;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use App\Services\API\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminCount = User::where('role', 'admin')->count();
        $sellerCount = User::where('role', 'seller')->count();
        $customerCount = User::where('role', 'customer')->count();

        $categoryCount = Categories::count();
        $productCount = Products::count();

        //$orderCount = Order::count();
        $orderCount = Order::sum('total_price');

        return response()->json([
            'adminCount' => $adminCount,
            'sellerCount' => $sellerCount,
            'customerCount' => $customerCount,
            'categoryCount' => $categoryCount,
            'productCount' => $productCount,
            'orderCount' => $orderCount,
        ], 200);
    }
}
