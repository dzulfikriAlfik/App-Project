<?php

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

// Landing Page Routes
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

// Profil
Route::get('/profile', 'HomeController@profileLembaga');
Route::get('/profile/{section}', function ($section) {
  return redirect()->to("/profile#$section");
});

// Kesiswaan
Route::get('/siswa/kurikulum', 'HomeController@siswaKurikulum');
Route::get('/siswa/ekskul', 'HomeController@siswaEkskul');

// Info
Route::get('/info/kontak', 'HomeController@infoKontak');
Route::get('/info/beasiswa', 'HomeController@infoBeasiswa');
Route::get('/info/layanan', 'HomeController@infoLayanan');

// Berita
Route::get('/berita', 'HomeController@berita');

// Galery
Route::get('/galery', 'HomeController@galery');

// Auth
Route::get('/register', 'AuthController@Register');
Route::get('/404', 'NotFoundController@NotFound');

// Kirim masukan
Route::post('/kirim-masukan', 'DashboardController@sendMasukan');

// // route login
Route::get('/login_process/{role}', 'AuthController@login_process');
Route::get('/login', 'AuthController@Login');

// CMS Routes
// route superadmin
Route::group(['middleware' => ['login.middleware', 'superadmin.middleware']], function () {
  Route::prefix('cms')->group(function () {
    Route::get('/users', 'UsersController@Users');
  });
});

// route all users
Route::group(['middleware' => ['login.middleware']], function () {
  Route::get('/cms', 'DashboardController@Cms');
  Route::get('/logout', 'AuthController@logout');
  Route::prefix('cms')->group(function () {
    Route::get('/dashboard', 'DashboardController@Dashboard');
    Route::get('/gallery', 'DashboardController@gallery');
    Route::get('/profile_lembaga', 'DashboardController@profile_lembaga');
    Route::post('/edit_profile_lembaga', 'DashboardController@editProfileLembaga');
  });
});

// Iframe
Route::get('/iframe-gallery', 'IframeController@gallery');
