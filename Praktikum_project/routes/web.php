<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Http\Request;
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
    return view('Auth.login');
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
    Route::get('/notif', 'AdminController@notif');
});

Route::get('/user/notif', 'HomeController@notif');
Route::get('logout', 'HomeController@logout');
Route::get('/marknotif', 'HomeController@marknotif');


//cart
Route::get('purchase/{id}', 'PurchaseController@index');
Route::post('cart/{id}', 'CartController@purchase');
Route::get('cart', 'CartController@show');
Route::delete('delete/{cart:id}', 'CartController@destroy')->name('delete');
Route::get('/checkout', 'CheckoutController@index')->name('user.checkout');
Route::post('/checkout', 'CheckoutController@index')->name('user.checkout');

//transaksi
Route::get('/transaksi/{id}', 'TransaksiController@index')->name('user.transaksi');
Route::get('/kota/{id}', 'CheckOngkirController@getCities');
Route::get('/transaksi/bayar/{id}', 'TransaksiController@payment')->name('bayar.transaksi');;
Route::post('/payment', 'TransaksiController@store');
Route::get('/transaksi/detail/{id}', 'DetailTransaksiController@index')->name('transaksi_detail');
Route::post('/transaksi/detail/upload/payment', 'DetailTransaksiController@uploadPayment');
Route::put('cancel/{transaksi:id}', 'DetailTransaksiController@cancelTransaction')->name('cancel');

//ongkir
Route::post('cekongkir', 'CheckOngkirController@check_ongkir')->name('cekongkir');

//bayar
Route::post('/checkout/transaksi', 'CheckoutController@submit');

//rate
Route::post('/addRating', 'DetailTransaksiController@addrating')->name('addRating');




