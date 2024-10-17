<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only('logout_system');
    }
    public function logout_system()
    {
        if (auth()->check()) {
            auth()->logout();
        }
        //dd(app()->getLocale());
        return redirect()->route('products.index', ['lang' => app()->getLocale()]);

    }

}
