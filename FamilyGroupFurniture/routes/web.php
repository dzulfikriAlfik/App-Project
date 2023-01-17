<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
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
    Route::get('/list', [AdminController::class, "listAdmin"]);
    Route::get('/list/add', [AdminController::class, "addAdmin"]);
    Route::post('/store', [AdminController::class, "store"]);
    Route::get('/list/{user}/edit', [AdminController::class, "edit"]);
    Route::post('/{user}/update', [AdminController::class, "update"]);
    Route::get('/{user}/delete', [AdminController::class, "destroy"]);
  });

  Route::prefix('customer')->group(function () {
    Route::get('/list', [CustomerController::class, "listCustomer"]);
    Route::get('/list/add', [CustomerController::class, "create"]);
    Route::post('/store', [CustomerController::class, "store"]);
    Route::get('/list/{user}/edit', [CustomerController::class, "edit"]);
    Route::post('/{user}/update', [CustomerController::class, "update"]);
    Route::get('/{user}/delete', [CustomerController::class, "destroy"]);
  });
});
