<?php

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

Route::get('/login', [AuthController::class, "index"])->middleware('guest');
Route::get('/logout', [AuthController::class, "logout"]);
Route::post('/authenticate', [AuthController::class, "authenticate"]);
Route::get('/register', [AuthController::class, "register"])->middleware('guest');
Route::post('/register', [AuthController::class, "store"]);

// Login
Route::group(['middleware' => 'login'], function () {
    Route::get('/dashboard', [DashboardController::class, "index"]);
});
