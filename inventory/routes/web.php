<?php
//use App\Http\Controllers\suplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\data_barangController;
use App\Http\Controllers\suplierController;
use App\Http\Controllers\userController;
use App\Http\Controllers\permintaan_produksiController;
use App\Http\Controllers\barang_keluarController;
use App\Http\Controllers\rcv_barang_masukController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KeluarController;


Route::get('/', function () {
   return view('post.dashboard');
});
// Route::get('/dashboard', 'v_tamplateController@dashboard');
Route::get('/supliers', [SuplierController::class, 'index']);

// Pembelian
Route::resource('pembelian', PembelianController::class);
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
