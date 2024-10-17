<?php

namespace App\Http\Middleware;

use Flasher\Laravel\Facade\Flasher;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $lang = $request->query('lang', 'en');

        // return $request->expectsJson() ? null : route('login');
        if (! $request->expectsJson()) {
            Flasher::addWarning(__('keywords.please_login'));
            //return redirect()->route('login')->with('message', 'Please login to continue');
            return route('login', ['lang' => $lang]);
        }
        return null;
    }
}
