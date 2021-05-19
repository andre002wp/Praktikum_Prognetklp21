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
Route::get('/marknotif', 'HomeController@marknotif');
Route::get('/transaksi_show', 'TransaksiController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'HomeController@logout');