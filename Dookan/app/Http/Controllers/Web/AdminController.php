<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        return view('admin.auth.login');

    }

    public function save(LoginFormRequest $request)
    {
        $data = $request->validated();

        if (auth()->attempt($data)) {
            $user = auth()->user()->load('image');
            session(['user' => $user]);

            return view('admin.dashboard');

        }
        else {
            return redirect()->back()->withErrors([
                'error' => 'Email or password is incorrect.'
            ]);
        }
    }
}
