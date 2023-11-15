<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class routegroup
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
        // http://127.0.0.1:8000/responseget?checkage=55
        if($request->checkage<50 && $request->checkage>18){
        echo "<h1> you can access </h1>";
        // return redirect('product');
        die;
        }
        // if(!session('email')){
        //     return redirect('/login');
        // }
       
        return $next($request);
    }
}
