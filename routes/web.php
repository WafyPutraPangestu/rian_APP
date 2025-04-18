<?php

use App\Http\Controllers\data;
use App\Http\Controllers\sessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [data::class, 'home']);


Route::middleware('guest')->group(function () {

    Route::controller(sessionController::class)->prefix('auth')->name('auth.')->group(function () {
        Route::get('login', 'loginView')->name('login');
        Route::get('register', 'registerView')->name('register');
        Route::post('login', 'storeLogin')->name('login');
        Route::post('register', 'storeRegister');
    });
});
Route::middleware('user')->group(function () {
    Route::controller(data::class)->group(function () {
        Route::get('/input', 'index')->name('input');
        Route::post('/input', 'store')->name('input.store');
        Route::get('data', 'dataShow')->name('data');
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/auth/logout', [sessionController::class, 'logout'])->name('auth.logout');
});
