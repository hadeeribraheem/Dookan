<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Services\API\Messages;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginFormRequest $request)
    {
        $data = $request->validated();
        if (auth()->attempt($data)) {
            $user = auth()->user()->load('image');

            $user['token'] = $user->createToken($user['phone'])->plainTextToken;
            //dd($user['name']);
            if ($user->role === 'seller')
            {
                return Messages::success($user, __('keywords.welcome_seller', ['name' => $user['name']]));
            }
            elseif ($user->role === 'admin'){
                return Messages::success($user, __('keywords.welcome_admin', ['name' => $user['name']]));
            }
            else
            {
                return Messages::success($user, __('keywords.welcome_customer', ['name' => $user['name']]));
            }
        }
        else
        {
            return Messages::error(__('keywords.email_password_incorrect'));

            //Flasher::addError('Email or Password is Incorrect');
        }
    }
}
