<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class SellerController extends Controller
{

    public function dashboard()
    {
        return view('seller.dashboard');
    }
}
