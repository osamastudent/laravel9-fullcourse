<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Sesssion;
class dontgodashboard
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
        if(!session('email')){
            return redirect('login');
                    }
        
        return $next($request);
    }
}
