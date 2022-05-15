<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

Use Alert;

class LoginMiddleware
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
        if(!session('login')){
            // Alert::error('Error', 'Anda tidak memiliki izin untuk akses! Silahkan login terlebih dahulu!');
            // session(['unAuth' => true]);
            return redirect('/login?unAuth');
        }
        return $next($request);
    }
}
