<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    if (!session('login')) {
      return redirect('/login');
    }

    if (auth()->user()->role === 'mitra' && auth()->user()->status_mitra === 'pending') {
      Auth::logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('/login')->with('loginError', 'Akun anda belum disetujui admin');
    }

    return $next($request);
  }
}
