<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Models\Categories;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

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

        return view('admin.dashboard', compact('adminCount', 'sellerCount', 'customerCount', 'categoryCount', 'productCount', 'orderCount'));
        //return view('admin.dashboard');
    }

    public function login(Request $request)
    {
       // dd($request->url());
        return view('admin.auth.login');

    }

    public function save(LoginFormRequest $request)
    {
        $data = $request->validated();

        if (auth()->attempt($data)) {
            $user = auth()->user()->load('image');
            session(['user' => $user]);
            return view('admin.profile.index');
        }
        else {
            Flasher::addError(__('keywords.login_error'));
        }
    }
}
