<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Pembelian;
use App\Models\ProdukMasuk;
use Illuminate\Http\Request;

class AdminProduksiMiddleware
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
      if (session('role') == 'admin-produksi') {
         return $next($request);
      } else {
         $data = [
            "suppliers" => Supplier::all()->count(),
            "products" => Produk::all()->count(),
            "pembelian" => Pembelian::all()->count(),
            "produk_masuk" => ProdukMasuk::all()->count()
         ];
         return response()->view('auth.dashboard', $data);
      }
   }
}
