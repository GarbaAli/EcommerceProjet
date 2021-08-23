<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* ADMINISTRATION */
    Route::group(['as' => 'admin::', 'prefix' => 'admin'], function() {

        Route::get('/product/list', 'Admin\AdminProductController@index');
        Route::get('/product/create', 'Admin\AdminProductController@createNew');
        Route::post('/product/create', 'Admin\AdminProductController@create')->name("create.product");
        Route::get('/product/{id}/update', 'Admin\AdminProductController@updateNew')->name('update.product');
        Route::patch('/product/{id}', 'Admin\AdminProductController@update')->name("update.product.save");
        Route::get('/product/delete/{id}', 'Admin\AdminProductController@delete')->name("delete.product");
        Route::get('/product/detail/{id}', 'Admin\AdminProductController@detail')->name("view.product");
    });



/*  PRODUITS   */
Route::get('/', 'ProductController@index');
Route::get('/shop', 'ProductController@shop')->name('product.shop');
Route::get('/show/{product}', 'ProductController@show')->name('product.show');

/*CART */
Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');
Route::get('/videpanier', function () {
    Cart::destroy();
});
Route::get('/panier', 'CartController@index')->name('cart.index');
