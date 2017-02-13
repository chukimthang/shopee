<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SellerMiddleware
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
        if (!Auth::user()->shop->id) {
            return redirect('/');
        }
        return $next($request);
    }
}
