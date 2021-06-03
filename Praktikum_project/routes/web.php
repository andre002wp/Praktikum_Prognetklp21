<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
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

Route::get('logout', 'HomeController@logout');
Route::get('/marknotif', 'HomeController@marknotif');
Route::get('/notif', 'HomeController@notif');

//cart
Route::get('purchase/{id}', 'PurchaseController@index');
Route::post('cart/{id}', 'CartController@purchase');
Route::get('cart', 'CartController@show');
Route::delete('delete-cart', 'CartController@destroy')->name('delete-cart');
Route::delete('delete/{cart:id}', 'CartController@destroy')->name('delete');

Route::post('/checkout', 'CheckoutController@index')->name('user.checkout');

//transaksi
Route::get('/transaksi', 'TransaksiController@index')->name('user.transaksi');
Route::get('/transaksi/{id}', 'TransaksiController@payment');
Route::post('/payment', 'TransaksiController@store');

//ongkir
Route::post('cekongkir', [CheckoutController::class, 'cekongkir'])->name('cekongkir');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('checkout-all', [CheckoutController::class, 'store'])->name('checkout-all');
Route::get('getkota', [CheckoutController::class, 'getkota'])->name('getkota');