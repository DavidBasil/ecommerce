<?php

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

Route::get('/', 'FrontEndController@index')->name('index');

Route::resource('products', 'ProductsController');

Route::get('product/{id}', 'FrontEndController@single')->name('product.single');

Route::post('cart/add', 'ShopController@add_to_cart')->name('cart.add');

Route::get('cart', 'ShopController@cart')->name('cart');

Route::get('cart/delete/{id}', 'ShopController@cart_delete')->name('cart.delete');
Route::get('cart/incr/{id}/{qty}', 'ShopController@incr')->name('cart.incr');
Route::get('cart/decr/{id}/{qty}', 'ShopController@decr')->name('cart.decr');
Route::get('cart/checkout', 'CheckoutController@index')->name('cart.checkout');
Route::post('cart/checkout', 'CheckoutController@pay')->name('cart.checkout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
