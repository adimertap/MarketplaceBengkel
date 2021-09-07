<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */


Auth::routes();

Route::namespace('AdminMarketplace')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/', "DashboardController@index")->name('dashboard-admin');

        // JENIS
        Route::resource('category', 'CategoryController');
        Route::post('category/{id_jenis_sparepart}/set-status', 'CategoryController@setStatus')
                    ->name('jenis-sparepart-pengajuan');

        // MERK
        Route::resource('merk', 'MerkController');
        Route::post('merk/{id_merk}/set-status', 'MerkController@setStatus')
                    ->name('merk-sparepart-pengajuan');

        // KONVERSI
        Route::resource('konversi', 'KonversiController');
        Route::post('konversi/{id_konversi}/set-status', 'KonversiController@setStatus')
                    ->name('konversi-pengajuan');

        // KEMASAN
        Route::resource('kemasan', 'KemasanController');
        Route::post('kemasan/{id_kemasan}/set-status', 'KemasanController@setStatus')
                    ->name('kemasan-pengajuan');

        Route::resource('user', 'UserController');

        // SPAREPART
        Route::resource('sparepart', 'SparepartController');
        Route::post('sparepart/{id_sparepart}/set-status', 'SparepartController@setStatus')
                    ->name('sparepart-status-pengajuan');
        Route::get('sparepart/getmerk/{id}', 'SparepartController@getmerk');

        Route::resource('bengkel', 'BengkelController');

        Route::resource('keuangan', 'KeuanganController');
    });

// Route::get('/debug-sentry', function () {
//     throw new Exception('My first Sentry error!');
// });
