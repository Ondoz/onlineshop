<?php

use Gloudemans\Shoppingcart\Facades\Cart;

Route::get('/', function () {
    return view('index');
})->name('home');
//tester no item select
Route::get('/empty', function () {
    Cart::destroy();
});


//cart
Route::resource('cart', 'CartController');
Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

//checout
Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('checkout/store', 'CheckoutController@store')->name('checkout.store');

//production
Route::resource('shop', 'ProductController');

Auth::routes();
