<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProdukMasukController;
use App\Http\Controllers\ProdukKeluarController;


Route::get('/blank', function () {
   return view('_blank');
});

// Authentication
Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register/store', [AuthController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout']);

// Get list-produk
Route::get('pembelian/list-produk/{produk}', [PembelianController::class, 'list_product']);
Route::get('list_pembelian/{pembelian}', [ProdukKeluarController::class, 'list_pembelian']);
Route::get('list_produk/{produk}', [ProdukKeluarController::class, 'list_produk']);

// Route::group(['middleware' => 'auth'], function () {
Route::group(['middleware' => ['auth', 'admingudang']], function () {
   // Dashboard
   Route::get('/dashboard', [AuthController::class, 'dashboard']);
   // Suppliers
   Route::resource('suppliers', SupplierController::class);
   // Pembelian
   Route::resource('pembelian', PembelianController::class);
   // Produk Masuk
   Route::resource('produk-masuk', ProdukMasukController::class);
   // Users
   Route::resource('users', UserController::class);
});

Route::group(['middleware' => ['auth', 'adminproduksi']], function () {
   // Dashboard
   Route::get('/dashboard', [AuthController::class, 'dashboard']);
   // Produk
   Route::resource('produks', ProdukController::class);
   // Produk Keluar
   Route::resource('produk-keluar', ProdukKeluarController::class);
});

// admingudang
// adminproduksi
