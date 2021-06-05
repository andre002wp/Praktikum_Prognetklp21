<?php

Route::get('/dashboard', 'Admin\PageController@index')->name('dashboard')->middleware('auth:admin');

//product
Route::get('/product', 'Admin\ProductController@index')->name('product')->middleware('auth:admin');
Route::get('/product/add', 'Admin\ProductController@add')->name('add.product')->middleware('auth:admin');
Route::get('/product/{id}/edit', 'Admin\ProductController@edit')->name('edit.product')->middleware('auth:admin');
Route::Post('/product/{id}/edit', 'Admin\ProductController@update')->name('update.product')->middleware('auth:admin');
Route::get('/product/{id}', 'Admin\ProductController@delete')->name('delete.product')->middleware('auth:admin');
Route::get('/product/view/{id}', 'cart@add');
Route::get('/product/buy/{id}', 'cart@cart');

//courier
Route::get('/courier','Admin\CourierController@index')->name('courier')->middleware('auth:admin');
Route::Post('/courier','Admin\CourierController@store');
Route::get('/courier{id}','Admin\CourierController@delete')->name('delete.courier');
Route::get('/courier/add', 'Admin\CourierController@add')->name('add.courier');
Route::get('/courier/edit{id}', 'Admin\CourierController@edit')->name('edit.courier');
Route::Post('/courier/edit{id}', 'Admin\CourierController@update')->name('update.courier');

//categories
Route::get('/categories','Admin\CategoriesController@index')->name('categories')->middleware('auth:admin');
Route::Post('/categories','Admin\CategoriesController@store');
Route::get('/categories{id}','Admin\CategoriesController@delete')->name('delete.categories');
Route::get('/categories/add', 'Admin\CategoriesController@add')->name('add.categories');
Route::get('/categories/edit{id}', 'Admin\CategoriesController@edit')->name('edit.categories');
Route::Post('/categories/edit{id}', 'Admin\CategoriesController@update')->name('update.categories');


//transaksi
Route::get('/transaksi', 'Admin\AdminTransaksiController@index')->name('transaksi')->middleware('auth:admin');
Route::get('/transaksi/detail/{id}', 'Admin\AdminDetailTransaksiController@index')->name('transaksi-detail')->middleware('auth:admin');
Route::post('/transaksi/detail/status', 'Admin\AdminDetailTransaksiController@updateStatus');
