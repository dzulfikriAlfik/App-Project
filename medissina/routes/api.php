<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\GalleryApiController;
use App\Http\Controllers\Api\StatisticApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//========== USER
Route::get('password', [UserApiController::class, 'hashPassword']);
Route::post('login', [UserApiController::class, 'authenticate']);
Route::post('register', [UserApiController::class, 'register']);
Route::post('user/create', [UserApiController::class, 'store'])->middleware('jwt.verify');
Route::post('user/upload', [UserApiController::class, 'upload']);
// Route::post('user/upload', [UserApiController::class, 'upload'])->middleware('jwt.verify');
Route::get('logout', [UserApiController::class, 'logout'])->middleware('jwt.verify');
Route::get('get_user', [UserApiController::class, 'getAuthenticatedUser'])->middleware('jwt.verify');
Route::get('user/get', [UserApiController::class, 'get'])->middleware('jwt.verify');
Route::get('user/get/statistic', [UserApiController::class, 'getStatistic'])->middleware('jwt.verify');
Route::get('user/get/{id}', [UserApiController::class, 'show'])->middleware('jwt.verify');

Route::post('user/superadmin/{user}',  [UserApiController::class, 'superAdmin'])->middleware('jwt.verify');
Route::post('user/admin/{user}',  [UserApiController::class, 'admin'])->middleware('jwt.verify');

//======== FOTO KEGIATAN
Route::get('gallery/get', [GalleryApiController::class, 'get']);

//======== STATISTICS
Route::get('stat/get', [StatisticApiController::class, 'index'])->middleware('jwt.verify');
Route::get('stat/chart', [StatisticApiController::class, 'chart'])->middleware('jwt.verify');
Route::post('stat/create', [StatisticApiController::class, 'store'])->middleware('jwt.verify');
Route::get('stat/get/{id}', [StatisticApiController::class, 'show'])->middleware('jwt.verify');
Route::put('stat/put/{system}',  [StatisticApiController::class, 'update'])->middleware('jwt.verify');
Route::delete('stat/delete/{system}',  [StatisticApiController::class, 'destroy'])->middleware('jwt.verify');
