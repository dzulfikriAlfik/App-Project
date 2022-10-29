<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdsApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\VideoApiController;
use App\Http\Controllers\api\SurveyApiController;
use App\Http\Controllers\Api\SystemApiController;
use App\Http\Controllers\Api\TriviaApiController;
use App\Http\Controllers\Api\AdsTypeApiController;
use App\Http\Controllers\api\VoucherApiController;
use App\Http\Controllers\api\KuesionerApiController;
use App\Http\Controllers\Api\StatisticApiController;
use App\Http\Controllers\Api\AdsPlatformApiController;
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
Route::post('user/topup', [UserApiController::class, 'topup'])->middleware('jwt.verify');
// Route::post('user/upload', [UserApiController::class, 'upload'])->middleware('jwt.verify');
Route::get('logout', [UserApiController::class, 'logout'])->middleware('jwt.verify');
Route::get('get_user', [UserApiController::class, 'getAuthenticatedUser'])->middleware('jwt.verify');
Route::get('user/get', [UserApiController::class, 'get'])->middleware('jwt.verify');
Route::get('user/get_saldo/{id}', [UserApiController::class, 'get_saldo'])->middleware('jwt.verify');
Route::get('user/get_partner', [UserApiController::class, 'get_partner'])->middleware('jwt.verify');
Route::get('user/get/statistic', [UserApiController::class, 'getStatistic'])->middleware('jwt.verify');
Route::get('user/get/{id}', [UserApiController::class, 'show'])->middleware('jwt.verify');
Route::put('user_partner/put/{user}', [UserApiController::class, 'update_partner'])->middleware('jwt.verify');
Route::put('admin_pass/put/{user}', [UserApiController::class, 'admin_pass'])->middleware('jwt.verify');
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

//======== ADS
Route::get('ads/get', [AdsApiController::class, 'get'])->middleware('jwt.verify');
Route::get('ads/download/{id}', [AdsApiController::class, 'download']);
Route::post('ads/create', [AdsApiController::class, 'store'])->middleware('jwt.verify');
Route::get('ads/partner_ads', [AdsApiController::class, 'partner_ads'])->middleware('jwt.verify');
Route::delete('ads/approve/{ads}',  [AdsApiController::class, 'approve'])->middleware('jwt.verify');
Route::put('ads/reject/{id}',  [AdsApiController::class, 'reject'])->middleware('jwt.verify');
Route::put('ads/update_qty/{ads}',  [AdsApiController::class, 'update_qty'])->middleware('jwt.verify');
Route::delete('ads/pause/{ads}',  [AdsApiController::class, 'pause'])->middleware('jwt.verify');
Route::delete('ads/resume/{ads}',  [AdsApiController::class, 'resume'])->middleware('jwt.verify');
Route::put('ads/suspend/{ads}',  [AdsApiController::class, 'suspend'])->middleware('jwt.verify');
Route::put('ads/put/{ads}', [AdsApiController::class, 'update'])->middleware('jwt.verify');
Route::delete('ads/destroy/{ads}',  [AdsApiController::class, 'destroy'])->middleware('jwt.verify');

//======== ADS TYPE
Route::get('ads_type/get', [AdsTypeApiController::class, 'get'])->middleware('jwt.verify');
Route::get('ads_type/get/{ads_type}', [AdsTypeApiController::class, 'show'])->middleware('jwt.verify');
Route::post('ads_type/create', [AdsTypeApiController::class, 'store'])->middleware('jwt.verify');
Route::put('ads_type/put/{ads_type}', [AdsTypeApiController::class, 'update'])->middleware('jwt.verify');
Route::delete('ads_type/activate/{ads_type}',  [AdsTypeApiController::class, 'activate'])->middleware('jwt.verify');
Route::delete('ads_type/inactive/{ads_type}',  [AdsTypeApiController::class, 'inactive'])->middleware('jwt.verify');
Route::delete('ads_type/destroy/{ads_type}',  [AdsTypeApiController::class, 'destroy'])->middleware('jwt.verify');

//======== ADS PLATFORM
Route::get('ads_platform/get', [AdsPlatformApiController::class, 'get'])->middleware('jwt.verify');
Route::get('ads_platform/get/{ads_platform}', [AdsPlatformApiController::class, 'show'])->middleware('jwt.verify');
Route::post('ads_platform/create', [AdsPlatformApiController::class, 'store'])->middleware('jwt.verify');
Route::put('ads_platform/put/{ads_platform}', [AdsPlatformApiController::class, 'update'])->middleware('jwt.verify');
Route::delete('ads_platform/activate/{ads_platform}',  [AdsPlatformApiController::class, 'activate'])->middleware('jwt.verify');
Route::delete('ads_platform/inactive/{ads_platform}',  [AdsPlatformApiController::class, 'inactive'])->middleware('jwt.verify');
Route::delete('ads_platform/destroy/{ads_platform}',  [AdsPlatformApiController::class, 'destroy'])->middleware('jwt.verify');

//======== VOUCHER
Route::get('voucher/get', [VoucherApiController::class, 'index'])->middleware('jwt.verify');
Route::get('voucher/get/{voucher}', [VoucherApiController::class, 'show'])->middleware('jwt.verify');
Route::get('voucher/get_by_code', [VoucherApiController::class, 'get_by_code'])->middleware('jwt.verify');
Route::post('voucher/create', [VoucherApiController::class, 'store'])->middleware('jwt.verify');
Route::put('voucher/update/{voucher}', [VoucherApiController::class, 'update'])->middleware('jwt.verify');
Route::delete('voucher/delete/{voucher}', [VoucherApiController::class, 'destroy'])->middleware('jwt.verify');
Route::delete('voucher/activate/{voucher}',  [VoucherApiController::class, 'activate'])->middleware('jwt.verify');
Route::delete('voucher/inactive/{voucher}',  [VoucherApiController::class, 'inactive'])->middleware('jwt.verify');

//======== SURVEY & KUESIONER
Route::post('survey/create', [SurveyApiController::class, 'store'])->middleware('jwt.verify');
Route::post('kuesioner/create', [KuesionerApiController::class, 'store'])->middleware('jwt.verify');

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
