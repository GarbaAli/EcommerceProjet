<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*  PRODUITS   */
Route::get('/', 'ProductController@index');
Route::get('/shop', 'ProductController@shop')->name('product.shop');
Route::get('/show/{product}', 'ProductController@show')->name('product.show');