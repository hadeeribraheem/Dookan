<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Flasher\Laravel\Facade\Flasher;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login'); // Show the login view
    }

    public function save(LoginFormRequest $request)
    {
        $data = $request->validated();

        if (auth()->attempt($data)) {
            $user = auth()->user()->load('image');
            session(['user' => $user]);
            Flasher::addSuccess(__('keywords.login_success'));

            if ($user->role === 'seller')
            {
                return redirect()->route('seller.profile');
            }
            else
            {
                return redirect()->route('products.index');

            }
        }
        else
        {
            Flasher::addError(__('keywords.login_error'));
            return redirect()->back();
        }
    }
}
