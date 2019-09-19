<?php

Route::get('/admin/dashboard', function () {
    return view('admin.home');
})->name('admin.dashboard');
