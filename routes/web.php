<?php

use Gloudemans\Shoppingcart\Facades\Cart;

Route::get('/', function () {
    return view('index');
})->name('home');
//tester no item select
Route::get('/empty', function () {
    Cart::destroy();
});



Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['role:admin']],
    function () {
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
        Route::resource('product', 'ProductController');
        Route::resource('categories', 'CategoriesController');
    }
);


//cart
Route::resource('cart', 'CartController');
Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

//checout
Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('checkout/store', 'CheckoutController@store')->name('checkout.store');

//production
Route::resource('shop', 'ShopController');
Auth::routes();
