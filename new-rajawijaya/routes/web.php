<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WebController::class, "index"]);
Route::get('/tentang-kami', [WebController::class, "tentangKami"]);
Route::get('/kegiatan', [WebController::class, "kegiatan"]);
Route::get('/mitra', [WebController::class, "mitra"]);
Route::get('/kontak', [WebController::class, "kontak"]);
