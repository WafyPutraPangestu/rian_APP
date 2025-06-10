<?php

use App\Http\Controllers\data;
use App\Http\Controllers\kamusController;
use App\Http\Controllers\RekapanduaController;
use App\Http\Controllers\RekapansatuController;
use App\Http\Controllers\RekapantigaController;
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
    // Route::controller(data::class)->group(function () {
    //     Route::get('/input', 'index')->name('input');
    //     Route::post('/input', 'store')->name('input.store');
    //     Route::get('data', 'dataShow')->name('data');
    // });

    Route::controller(kamusController::class)->prefix('kamus')->name('kamus.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{kamus}', 'edit')->name('edit');
        Route::patch('/update/{kamus}', 'update')->name('update');
        Route::delete('/destroy/{kamus}', 'destroy')->name('destroy');
    });
    Route::get('/api/kamus/search', [kamusController::class, 'searchByNamaBu'])->name('kamus.search');

    Route::controller(RekapansatuController::class)->prefix('rekapanSatu')->name('rekapansatu.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(RekapanduaController::class)->prefix('rekapanDua')->name('rekapandua.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(RekapantigaController::class)->prefix('rekapanTiga')->name('rekapantiga.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/auth/logout', [sessionController::class, 'logout'])->name('auth.logout');
});
