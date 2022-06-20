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
use App\Http\Controllers\PermintaanProdukController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\suplierController;
use App\Http\Controllers\barang_keluarController;
use App\Http\Controllers\rcv_barang_masukController;
use App\Http\Controllers\permintaan_produksiController;


Route::get('/blank', function () {
   return view('_blank');
});

// Authentication
Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register/store', [AuthController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout']);

// Route::get('produk-keluar', [ProdukKeluarController::class, 'index']);

// Get list-produk
Route::get('pembelian/list-produk/{produk}', [PembelianController::class, 'list_product']);
Route::get('list_pembelian/{pembelian}', [ProdukKeluarController::class, 'list_pembelian']);
Route::get('list_produk/{produk}', [ProdukKeluarController::class, 'list_produk']);

Route::group(['middleware' => 'auth'], function () {
   // Dashboard
   Route::get('/dashboard', [AuthController::class, 'dashboard']);
   // Suppliers
   Route::resource('suppliers', SupplierController::class);
   // Pembelian
   Route::resource('pembelian', PembelianController::class);
   // Produk
   Route::resource('produks', ProdukController::class);
   // Produk Masuk
   Route::resource('produk-masuk', ProdukMasukController::class);
   // Produk Keluar
   Route::resource('produk-keluar', ProdukKeluarController::class);
   // Permintaan Produk
   Route::resource('permintaan-produk', PermintaanProdukController::class);
   // Users
   Route::resource('users', UserController::class);
});

// Route::get('/dashboard', 'v_tamplateController@dashboard');
// Route::post('/pembelian/list_product', [PembelianController::class, 'list_product']);
// Route::post('/pembelian/list_suplier', [PembelianController::class, 'list_suplier']);

// // Data Barang
// Route::resource('data_barangs', data_barangController::class);

// // User
// Route::resource('users', userController::class);

// // Post
// Route::resource('posts/cari', PostController::class);
// Route::resource('posts', PostController::class);
// Route::post('/posts/list_data', [PostController::class, 'list_data']);

// Route::resource('permintaan_produksis', permintaan_produksiController::class);
// Route::resource('barang_keluars', barang_keluarController::class);
// Route::resource('rcv_barang_masuks', rcv_barang_masukController::class);
// Route::resource('pengeluarans', KeluarController::class);
// Route::post('/pengeluarans/list_product', [KeluarController::class, 'listProduct']);
// Route::post('/rcv_barang_masuks/list_po', [rcv_barang_masukController::class, 'list_po']);
// Route::post('/barang_keluars/list_barangkeluar', [barang_keluarController::class, 'list_barangkeluar']);
