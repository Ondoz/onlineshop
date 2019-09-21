<?php
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.home');
    })->name('admin.dashboard');

    Route::get('/admin/data', function() {
        return "data";
    });
});
