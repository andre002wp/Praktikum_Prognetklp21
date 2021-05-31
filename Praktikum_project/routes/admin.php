<?php

Route::get('/dashboard', 'Admin\PageController@index')->name('dashboard');

//product
Route::get('/product', 'Admin\ProductController@index')->name('product');
Route::get('/product/add', 'Admin\ProductController@add')->name('add.product');
Route::get('/product/{id}/edit', 'Admin\ProductController@edit')->name('edit.product');
Route::get('/product/{id}', 'Admin\ProductController@delete')->name('delete.product');
Route::get('/product/view/{id}', 'cart@add');
Route::get('/product/buy/{id}', 'cart@cart');

//courier
// Route::resource('/courier','Admin\CourierController');
Route::get('/courier','Admin\CourierController@index')->name('courier');
Route::Post('/courier','Admin\CourierController@store');
Route::get('/courier{id}','Admin\CourierController@delete')->name('delete.courier');
Route::get('/courier/add', 'Admin\CourierController@add')->name('add.courier');
Route::get('/courier/edit', 'Admin\CourierController@edit')->name('edit.courier');



//categories
Route::get('/categories','Admin\CategoriesController@index')->name('categories');
Route::Post('/categories','Admin\CategoriesController@store');
Route::get('/categories{id}','Admin\CategoriesController@delete')->name('delete.categories');
Route::get('/categories/add', 'Admin\CategoriesController@add')->name('add.categories');
Route::get('/categories/edit', 'Admin\CategoriesController@edit')->name('edit.categories');