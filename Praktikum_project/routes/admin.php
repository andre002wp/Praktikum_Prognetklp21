<?php

Route::get('/dashboard', 'Admin\PageController@index')->name('dashboard');

//product
Route::get('/product', 'Admin\ProductController@index')->name('product')->middleware('auth:admin');
Route::get('/product/add', 'Admin\ProductController@add')->name('add.product')->middleware('auth:admin');
Route::get('/product/{id}/edit', 'Admin\ProductController@edit')->name('edit.product')->middleware('auth:admin');
Route::get('/product/{id}', 'Admin\ProductController@delete')->name('delete.product')->middleware('auth:admin');
Route::get('/product/view/{id}', 'cart@add');
Route::get('/product/buy/{id}', 'cart@cart');

//courier
// Route::resource('/courier','Admin\CourierController');
Route::get('/courier','Admin\CourierController@index')->name('courier')->middleware('auth:admin');
Route::Post('/courier','Admin\CourierController@store');
Route::get('/courier{id}','Admin\CourierController@delete')->name('delete.courier');
Route::get('/courier/add', 'Admin\CourierController@add')->name('add.courier');
Route::get('/courier/edit', 'Admin\CourierController@edit')->name('edit.courier');



//categories
Route::get('/categories','Admin\CategoriesController@index')->name('categories')->middleware('auth:admin');
Route::Post('/categories','Admin\CategoriesController@store');
Route::get('/categories{id}','Admin\CategoriesController@delete')->name('delete.categories');
Route::get('/categories/add', 'Admin\CategoriesController@add')->name('add.categories');
Route::get('/categories/edit', 'Admin\CategoriesController@edit')->name('edit.categories');

// Detail transaksi
Route::get('/transaksi','Admin\AdminTransaksiController@index')->name('transaksi')->middleware('auth:admin');
Route::get('/transaksi/detail/{id}','Admin\AdminDetailTransaksiController@index')->name('detail_transaksi')->middleware('auth:admin');
Route::post('/transaksi/detail/status', 'AdminDetailTransaksiController@membatalkanPesanan');
Route::post('/transaksi/detail/review', 'ResponseController@create');