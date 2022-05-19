<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\TriviaApiController;
use App\Http\Controllers\Api\SystemApiController;
use App\Http\Controllers\Api\VideoApiController;
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
Route::get('user/get_partner', [UserApiController::class, 'get_partner'])->middleware('jwt.verify');
Route::get('user/get/statistic', [UserApiController::class, 'getStatistic'])->middleware('jwt.verify');
Route::get('user/get/{id}', [UserApiController::class, 'show'])->middleware('jwt.verify');
Route::put('user/put/{user}', [UserApiController::class, 'update'])->middleware('jwt.verify');
Route::delete('user/block/{user}',  [UserApiController::class, 'block'])->middleware('jwt.verify');
Route::delete('user/unblock/{user}',  [UserApiController::class, 'unblock'])->middleware('jwt.verify');
Route::delete('user/activate/{user}',  [UserApiController::class, 'activate'])->middleware('jwt.verify');
Route::delete('user/pending/{user}',  [UserApiController::class, 'pending'])->middleware('jwt.verify');
Route::delete('user/delete/{user}',  [UserApiController::class, 'destroy'])->middleware('jwt.verify');

Route::post('user/admin/{user}',  [UserApiController::class, 'admin'])->middleware('jwt.verify');
Route::post('user/superadmin/{user}',  [UserApiController::class, 'superAdmin'])->middleware('jwt.verify');
Route::post('user/adminads/{user}',  [UserApiController::class, 'adminAds'])->middleware('jwt.verify');
Route::post('user/removeadmin/{user}',  [UserApiController::class, 'removeAdmin'])->middleware('jwt.verify');

//======== TRIVIA
Route::get('trivia/get', [TriviaApiController::class, 'get'])->middleware('jwt.verify');
Route::post('trivia/create', [TriviaApiController::class, 'store'])->middleware('jwt.verify');
Route::get('trivia/get/{id}', [TriviaApiController::class, 'show'])->middleware('jwt.verify');
Route::put('trivia/put/{id}', [TriviaApiController::class, 'update'])->middleware('jwt.verify');
Route::delete('trivia/delete/{id}',  [TriviaApiController::class, 'destroy'])->middleware('jwt.verify');

//======== SYSTEM MASTER
Route::get('sys/get', [SystemApiController::class, 'index'])->middleware('jwt.verify');
Route::post('sys/create', [SystemApiController::class, 'store'])->middleware('jwt.verify');
Route::get('sys/get/{id}', [SystemApiController::class, 'show'])->middleware('jwt.verify');
Route::put('sys/put/{system}',  [SystemApiController::class, 'update'])->middleware('jwt.verify');
Route::delete('sys/delete/{system}',  [SystemApiController::class, 'destroy'])->middleware('jwt.verify');

//======== VIDEO
Route::get('video/get', [VideoApiController::class, 'index'])->middleware('jwt.verify');
Route::post('video/create', [VideoApiController::class, 'store'])->middleware('jwt.verify');
Route::get('video/get/{id}', [VideoApiController::class, 'show'])->middleware('jwt.verify');
Route::get('video/download/{id}', [VideoApiController::class, 'download']);
// put ga bisa form data
Route::post('video/update/{video}',  [VideoApiController::class, 'update'])->middleware('jwt.verify');
Route::delete('video/delete/{video}',  [VideoApiController::class, 'destroy'])->middleware('jwt.verify');

//======== STATISTICS
Route::get('stat/get', [StatisticApiController::class, 'index'])->middleware('jwt.verify');
Route::get('stat/chart', [StatisticApiController::class, 'chart'])->middleware('jwt.verify');
Route::post('stat/create', [StatisticApiController::class, 'store'])->middleware('jwt.verify');
Route::get('stat/get/{id}', [StatisticApiController::class, 'show'])->middleware('jwt.verify');
Route::put('stat/put/{system}',  [StatisticApiController::class, 'update'])->middleware('jwt.verify');
Route::delete('stat/delete/{system}',  [StatisticApiController::class, 'destroy'])->middleware('jwt.verify');
