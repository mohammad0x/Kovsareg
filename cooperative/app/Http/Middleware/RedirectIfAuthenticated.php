<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
//     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard)
    {
        if (\auth()->guard('admin')->check()){
            return redirect()->route('index.admin');
        }elseif(\auth()->guard('user')->user()->role==1){
            return redirect()->route('index.premium');
        }elseif (\auth()->guard('user')->user()->role == 0){
            return redirect()->route('index.web0');
        }





        return $next($request);
    }
}
