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
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
           /*if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }*/
            if(Auth::guard($guard)->check() && Auth::user()->role==env('ROL_PACIENT')){
                return redirect()->route('pacient.dashboard');
            }elseif(Auth::guard($guard)->check() && Auth::user()->role==env('ROL_METGE')){
                return redirect()->route('metge.dashboard');
            }elseif(Auth::guard($guard)->check() && Auth::user()->role==env('ROL_ADMIN')){
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}
