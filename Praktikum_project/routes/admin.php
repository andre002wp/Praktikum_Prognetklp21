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
Route::Post('/courier','Admin\CourierController@store')->middleware('auth:admin');
Route::get('/courier{id}','Admin\CourierController@delete')->name('delete.courier')->middleware('auth:admin');
Route::get('/courier/add', 'Admin\CourierController@add')->name('add.courier')->middleware('auth:admin');
Route::get('/courier/edit{id}', 'Admin\CourierController@edit')->name('edit.courier')->middleware('auth:admin');
Route::Post('/courier/edit{id}', 'Admin\CourierController@update')->name('update.courier')->middleware('auth:admin');

//categories
Route::get('/categories','Admin\CategoriesController@index')->name('categories')->middleware('auth:admin');
Route::Post('/categories','Admin\CategoriesController@store')->middleware('auth:admin');
Route::get('/categories{id}','Admin\CategoriesController@delete')->name('delete.categories')->middleware('auth:admin');
Route::get('/categories/add', 'Admin\CategoriesController@add')->name('add.categories')->middleware('auth:admin');
Route::get('/categories/edit{id}', 'Admin\CategoriesController@edit')->name('edit.categories')->middleware('auth:admin');
Route::Post('/categories/edit{id}', 'Admin\CategoriesController@update')->name('update.categories')->middleware('auth:admin');


//transaksi
Route::get('/transaksi', 'Admin\AdminTransaksiController@index')->name('transaksi')->middleware('auth:admin');
Route::get('/transaksi/detail/{id}', 'Admin\AdminDetailTransaksiController@index')->name('transaksi-detail')->middleware('auth:admin');
Route::post('/transaksi/detail/status', 'Admin\AdminDetailTransaksiController@updateStatus')->middleware('auth:admin');
