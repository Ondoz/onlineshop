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

//production
    Route::resource('shop', 'ProductController');
    Route::get('/shop/{slug}', 'ProductController@show')->name('product.show');

Auth::routes();


