<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



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
Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy'); 
Route::patch('/panier/{rowId}', 'CartController@update')->name('cart.update');

/*Checkout */
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/payer','CheckoutController@store')->name('checkout.store');
Route::get('/merci', 'CheckoutController@show')->name('checkout.merci');
