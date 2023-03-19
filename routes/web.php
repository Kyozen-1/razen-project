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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false, 'login' => false]);

Route::get('/login','Auth\RazenProjectLoginController@showLoginForm')->name('razen-project.login');
Route::post('/login', 'Auth\RazenProjectLoginController@login')->name('razen-project.login.submit');
Route::get('/logout', 'Auth\RazenProjectLoginController@logout')->name('razen-project.logout');

Route::get('/', 'LandingPageRazenProject\HomeController@beranda')->name('beranda');
Route::get('/perusahaan', 'LandingPageRazenProject\HomeController@perusahaan')->name('perusahaan');
Route::get('/layanan', 'LandingPageRazenProject\HomeController@layanan')->name('layanan');
Route::get('/proyek', 'LandingPageRazenProject\HomeController@proyek')->name('proyek');
Route::get('/kontak', 'LandingPageRazenProject\HomeController@kontak')->name('kontak');
Route::get('/blog', 'LandingPageRazenProject\HomeController@blog')->name('blog');
Route::post('/kontak-kami', 'LandingPageRazenProject\HomeController@kontak_kami')->name('kontak-kami');
Route::post('/email-berlangganan', 'LandingPageRazenProject\HomeController@email_berlangganan')->name('email-berlangganan');

Route::group(['middleware' => 'auth:razen_project'], function(){
    @include('razen-project.php');
});
