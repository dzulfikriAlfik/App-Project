<?php

use Illuminate\Support\Facades\Route;
use App\Models\Perda;
use App\Http\Controllers\VideoController;

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

// Landing Page Routes
Route::get('/', 'AuthController@Login');
Route::get('/register', 'AuthController@Register');
Route::get('/404', 'NotFoundController@NotFound');

// // route login
Route::get('/login_process/{role}', 'AuthController@login_process');
Route::get('/login', 'AuthController@Login');

// CMS Routes
// route superadmin
Route::group(['middleware' => ['login.middleware', 'superadmin.middleware']], function () {
    Route::prefix('cms')->group(function () {
        Route::get('/users', 'UsersController@Users');
        Route::get('/trivias', 'TriviasController@Trivias');
        Route::get('/systems', 'SystemsController@Systems');
    });
});

// route all users
Route::group(['middleware' => ['login.middleware']], function () {
    Route::get('/cms', 'DashboardController@Cms');
    Route::get('/logout', 'AuthController@logout');
    Route::prefix('cms')->group(function () {
        Route::get('/dashboard', 'DashboardController@Dashboard');
        Route::get('/video', 'VideoController@Video');
        Route::get('/userprofile', 'UsersController@Profile');
        // Route::post('/uploadprofile', 'UsersController@testupload');
        Route::post('/video', [VideoController::class, 'store']);
    });
});

// route partner
Route::group(['middleware' => ['login.middleware', 'partner.middleware']], function () {
    Route::prefix('cms')->group(function () {
        Route::get('/partner_dashboard', 'PartnerControllerController@Index');
    });
});

// route adminads
Route::group(['middleware' => ['login.middleware', 'adminads.middleware']], function () {
    Route::prefix('cms')->group(function () {
        Route::get('/partner_lists', 'AdminAdsController@Index');
        Route::get('/ads_lists', 'AdminAdsController@ads_lists');
    });
});
