<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login'); // Show the login view
    }

    public function save(LoginFormRequest $request)
    {
        $data = $request->validated(); // Validate the incoming request
        if (auth()->attempt($data)) {
            $user = auth()->user()->load('image');
            session(['user' => $user]);

            // Flash success message to session
            toastr()->success('You have successfully logged in.');

            if ($user->role === 'seller') {
/*                dd('here');*/
                return view('seller.dashboard');
            }
            else{
                return view('Home.home', compact('user'));
            }
        } else {
            //dd($data);  // To check the incoming request data
            // If authentication fails, redirect back with an error message
            return redirect()->back()->withErrors([
                'error' => 'Email or password is incorrect.'
            ]);
        }
    }
}
