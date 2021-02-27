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
Route::get("/", "getApi@index");
Route::get("/a", "getApi@ongkir");

// Route::get('/', function () {
//     return view('pages.home');
// });

Route::get("/getcity/ajax/{id}", "getApi@ajax");


Route::get('/checkout', function () {
    return view('pages.checkout');
});

Route::get('/loginku', function () {
    return view('pages.login');
});
Route::get('/cart', function () {
    return view('pages.cart');
});

Route::get('/productdetail', function () {
    return view('pages.productdetail');
});

Route::get('/categories', function () {
    return view('pages.categories');
});
Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
