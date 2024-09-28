<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        $userRole = $request->user()->role;

        if (!in_array($userRole, $roles)) {
            if ($userRole == 'seller') {
                return redirect()->route('seller.dashboard');
            } elseif ($userRole == 'admin') {
                return redirect()->route('seller.profile');
            } else {
                return redirect()->route('products.index');  // users that didnt login they will redirected to home where they can see all products
            }
        }
        //dd($request->url());
        return $next($request);
    }
}
