<?php

//product
Route::get('/product', 'Admin\ProductController@index')->name('product');
Route::get('/product/add', 'Admin\ProductController@add')->name('add.product');
Route::get('/product/{id}', 'Admin\ProductController@edit')->name('edit.product');
Route::get('/product/{id}/delete', 'Admin\ProductController@delete')->name('delete.product');
Route::post('/product', 'Admin\ProductController@delete')->name('update.product');

Route::get('/product/view/{id}', 'cart@add');
Route::get('/product/buy/{id}', 'cart@cart');

// Route::get('get.image/{id}', 'Admin\ProductController@getimage')->name('get.image');

