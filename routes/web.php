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
        // SPAREPART
        Route::resource('sparepart', 'SparepartController');
        Route::post('sparepart/{id_sparepart}/set-status', 'SparepartController@setStatus')
                    ->name('sparepart-status-pengajuan');
        Route::get('sparepart/getmerk/{id}', 'SparepartController@getmerk');
         // KONVERSI
         Route::resource('konversi', 'KonversiController');
         // KEMASAN
         Route::resource('kemasan', 'KemasanController');
         // PPH21
        Route::resource('pph21', 'Pph21Controller');
        // PTKP
        Route::resource('ptkp', 'PTKPController');
         // JABATAN
        Route::resource('jabatan', 'JabatanController');
        // JENIS TRANSAKSI
        Route::resource('jenistransaksi', 'JenistransaksiController');
        // FOP
        Route::resource('fop', 'FOPControllerr');
        // JENIS PERBAIKAN
        Route::resource('jenisperbaikan', 'JenisperbaikanController');
        Route::post('jenisperbaikan/{id_jenis_perbaikan}/set-status', 'JenisperbaikanController@setStatus')
            ->name('jenisperbaikan-pengajuan');
        // MERK KENDARAAN
        Route::resource('merkkendaraan', 'MerkkendaraanController');
         // JENIS KENDARAAN
         Route::resource('jenis-kendaraan', 'JeniskendaraanController');
          // KENDARAAN
        Route::resource('kendaraan', 'KendaraanController');
        Route::post('kendaraan/{id_kendaraan}/set-status', 'KendaraanController@setStatus')
            ->name('kendaraan-pengajuan');
        // DISKON
        Route::resource('diskon', 'DiskonControllerr');

        Route::resource('user', 'UserController');
        Route::resource('bengkel', 'BengkelController');
        Route::resource('keuangan', 'KeuanganController');

    });

// Route::get('/debug-sentry', function () {
//     throw new Exception('My first Sentry error!');
// });
