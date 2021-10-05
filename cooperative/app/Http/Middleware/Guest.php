<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (\auth()->guard('admin')->check()){
            return redirect()->route('index.admin');
        }elseif(\auth()->guard('user')->check()) {
            if (auth()->guard('user')->user()->role == 1)
                return redirect()->route('index.premium');
            else return redirect()->route('index.web');
        }
        return $next($request);
    }
}
