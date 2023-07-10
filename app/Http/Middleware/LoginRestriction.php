<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginRestriction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('isLogin'))
        {
            return redirect('login')->with('login-alert', 'Please Login first to access Dashboard');
        }
        return $next($request);
    }
}
