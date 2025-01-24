<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    // Auth::logout();
    echo 'Welcome';
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';