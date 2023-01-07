<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/login', [AuthController::class, "index"])->middleware('guest');
Route::get('/logout', [AuthController::class, "logout"]);
Route::post('/authenticate', [AuthController::class, "authenticate"]);
Route::get('/register', [AuthController::class, "register"])->middleware('guest');

// Login
Route::group(['middleware' => 'login'], function () {
  Route::get('/dashboard', [DashboardController::class, "index"]);
});

// Admin
Route::group(['middleware' => ['login', 'admin']], function () {
  //
});

// Mitra
Route::group(['middleware' => ['login', 'mitra']], function () {
  //
});
