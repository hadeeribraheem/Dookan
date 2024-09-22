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
    public function handle(Request $request, Closure $next, $role): Response
    {
        if($request->user()->role !== $role){
            if($request->user()->role == 'seller'){
                return redirect()->route('seller.dashbaord');
            }elseif ($request->user()->role == 'admin'){
                return redirect()->route('admin.dashbaord');
            }else {
                return redirect()->route('user.profile');
            }
        }
        return $next($request);
    }
}
