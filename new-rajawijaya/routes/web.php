<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\MitraController;
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
Route::post('/register', [AuthController::class, "store"]);

// Login
Route::group(['middleware' => 'login'], function () {
  Route::get('/dashboard', [DashboardController::class, "index"]);
});

// Admin
Route::group(['middleware' => ['login', 'admin']], function () {
  Route::prefix('admin')->group(function () {
    Route::get('/company-profile', [AdminController::class, "companyProfile"]);
    Route::post('/company-profile/{company}/update', [AdminController::class, "updateCompanyProfile"]);
    Route::get('/list', [AdminController::class, "listAdmin"]);
    Route::get('/list/add', [AdminController::class, "addAdmin"]);
    Route::post('/store', [AdminController::class, "store"]);
    Route::get('/list/{user}/edit', [AdminController::class, "edit"]);
    Route::post('/{user}/update', [AdminController::class, "update"]);
    Route::get('/{user}/delete', [AdminController::class, "destroy"]);
  });

  Route::prefix('mitra')->group(function () {
    Route::get('/list', [MitraController::class, "listMitra"]);
    Route::get('/list/add', [MitraController::class, "create"]);
    Route::post('/store', [MitraController::class, "store"]);
    Route::get('/{user}/approve', [MitraController::class, "approve"]);
    Route::get('/list/{user}/edit', [MitraController::class, "edit"]);
    Route::post('/{user}/update', [MitraController::class, "update"]);
    Route::get('/{user}/delete', [MitraController::class, "destroy"]);
  });

  Route::prefix('kegiatan')->group(function () {
    Route::get('/list', [KegiatanController::class, "index"]);
    Route::get('/list/{gallery}/show', [KegiatanController::class, "show"]);
    Route::get('/list/add', [KegiatanController::class, "create"]);
    Route::post('/store', [KegiatanController::class, "store"]);
    Route::get('/list/{gallery}/edit', [KegiatanController::class, "edit"]);
    Route::post('/{gallery}/update', [KegiatanController::class, "update"]);
    Route::get('/{gallery}/delete', [KegiatanController::class, "destroy"]);
  });
});

// Mitra
Route::group(['middleware' => ['login', 'mitra']], function () {
  //
});
