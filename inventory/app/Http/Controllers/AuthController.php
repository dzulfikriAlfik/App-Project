<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Pembelian;
use App\Models\ProdukMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function index()
   {
      return view("auth.login");
   }

   public function dashboard()
   {
      $data = [
         "suppliers" => Supplier::all()->count(),
         "products" => Produk::all()->count(),
         "pembelian" => Pembelian::all()->count(),
         "produk_masuk" => ProdukMasuk::all()->count()
      ];
      return view('auth.dashboard', $data);
   }

   public function authenticate(Request $request)
   {
      $credentials = $request->validate([
         "email"    => "required|email:dns",
         "password" => "required|min:5|max:12"
      ]);

      if (Auth::attempt($credentials)) {
         $request->session()->regenerate();

         return redirect()->intended('/dashboard');
      }

      return back()->with('error', "Login tidak valid");
   }

   public function register()
   {
      return view("auth.register");
   }

   public function store(Request $request)
   {
      $validatedData = $request->validate([
         'name'          => 'required|string',
         'username'      => 'required|unique:users,username',
         'email'         => 'required|email:dns|unique:users,email',
         'password'      => 'required|min:5|max:12'
      ]);

      $validatedData['password'] = Hash::make($validatedData['password']);

      // dd($request);

      User::create($validatedData);

      return redirect('login')->with('success', ' User baru berhasil di registrasi');
   }

   public function logout(Request $request)
   {
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('/');
   }
}
