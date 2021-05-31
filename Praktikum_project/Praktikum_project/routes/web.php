<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcomenew');
});

Route::get('/home', function () {
    return view('welcomenew');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Auth::routes();

// verify route
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function () {
    // Dashboard route
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // Login routes
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login')->middleware('guest');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    // Logout route
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Register routes
    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register')->middleware('guest');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

});

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'HomeController@logout');
Route::get('purchase/{id}', 'PurchaseController@index');
Route::post('purchase/{id}', 'PurchaseController@purchase');
Route::get('cart', 'CartController@show');
Route::get('/marknotif', 'HomeController@marknotif');
Route::get('/notif', 'HomeController@notif');

