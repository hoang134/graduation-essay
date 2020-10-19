<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check())
            return redirect()->route('home');
        if (Auth::user()->role == User::ROLE_SUPER_ADMIN)
            return $next($request);
        if (Auth::user()->role == User::ROLE_ADMIN)
            return $next($request);
        else
             return redirect()->route('home');

    }
}
