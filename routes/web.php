<?php

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

Route::get("/", "HomeController@index") ->name('home');
Route::get("/kabupaten/{id}", "HomeController@kabupaten_baru");
Route::get("/kecamatan/{id}", "HomeController@kecamatan_baru");
Route::get("/desa/{id}", "HomeController@desa_baru");

Route::get("/bengkel/{id}", "BengkelController@index") ->name('bengkel');

Route::get("/categories", "CategoriesController@index");
Route::get("/categories/{id}", "CategoriesController@index")->name('categories-detail');
Route::get("/sparepart/terlaris", "CategoriesController@terlaris")->name('categories-terlaris');
Route::get("/sparepart/terbaru", "CategoriesController@terbaru")->name('categories-terbaru');

Route::get("/sparepart/all", "CategoriesController@all")->name('all');


Route::get("/details/{id}", "DetailController@index")->name('detail');
Route::post("/details/{id}", "DetailController@add")->name('detail-add');

Route::get("/a", "CheckoutController@ongkir");
Route::post("/checkout/process/{id}", "CheckoutController@process")->name('checkout-process');
Route::get("/getkabupaten/{id}", "CheckoutController@kabupaten");

Route::get("/bengkel/{id}/faq", "FaqController@index")->name('faq');
Route::post("/faq/send-faq", "FaqController@send")->name('send-faq');

Route::get("/maps", "MapsController@index")->name('maps');
Route::get("/maps/databengkel", "MapsController@data")->name('maps-data');
Route::get("/maps/{id}", "MapsController@bengkel")->name('bengkel-maps');
Route::post("/callback", "CheckoutController@callback")->name('checkout-callback');



Route::prefix('admin')
    ->namespace('AdminMarketplace')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/', "DashboardController@index");
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('sparepart', 'SparepartController');
        Route::resource('bengkel', 'BengkelController');

        Route::resource('keuangan', 'KeuanganController');
    });

Route::get("/getkabupaten/{id}", "Auth\RegisterController@kabupaten_baru");
Route::get("/getkecamatan/{id}", "Auth\RegisterController@kecamatan_baru");
Route::get("/getdesa/{id}", "Auth\RegisterController@desa_baru");


Route::group(['middleware' => ['auth']], function(){

    Route::get("/cart", "CartController@index")->name('cart');
    Route::get("/bengkel/{id}/reservasi", "BengkelController@reservasi")->name('reservasi');
    Route::post("/bengkel/{id}/reservasi/kirim", "BengkelController@kirim")->name('reservasi-kirim');


    Route::post("/updateqty", "CartController@update");

    Route::delete("/cart/{id}", "CartController@delete")->name('cart-delete');

    Route::get("/checkout/{id}", "CheckoutController@index")->name('checkout');

    Route::get("/transaksi", "TransaksiController@index")->name('transaksi');

    Route::get("/booking", "BookingController@index")->name('booking');
    Route::get("/transaksi/bayar/{id}", "TransaksiController@bayar")->name('bayar');

    Route::post("/review", "TransaksiController@review")->name('review');
    Route::post("/konfirmasi", "TransaksiController@diterima")->name('diterima');

    Route::get("/account-setting", "AccountController@index")->name('account-setting');
    Route::post("/account-update", "AccountController@update")->name('account-update');


});

Route::get("/cekresi", "TransaksiController@cekresi")->name('cekresi');

// Route::get('/debug-sentry', function () {
//     throw new Exception('My first Sentry error!');
// });
