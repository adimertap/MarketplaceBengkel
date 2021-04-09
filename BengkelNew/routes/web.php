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
Route::get("/", "HomeController@index");
Route::get("/categories", "CategoriesController@index");

Route::get("/categories/{id}", "CategoriesController@index")->name('categories-detail');
Route::get("/details/{id}", "DetailController@index")->name('detail');
Route::get("/cart", "CartController@index");


Route::prefix('admin')
    ->namespace('AdminMarketplace')
    ->group(function(){
        Route::get('/', "DashboardController@index");
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('sparepart', 'SparepartController');
        Route::resource('bengkel', 'BengkelController');

    });
    






Route::get("/checkout", "getApi@index");
// Route::get("/registeri", "getApi@register");

// Route::get("/a", "getApi@ongkir");

// Route::get("/getcity/ajax/{id}", "getApi@ajax");

// Route::get('/trans', function () {
//     return view('pages.trans');
// });

// Route::get('/logini', function () {
//     return view('pages.login');
// });

// Route::get('/loginku', function () {
//     return view('pages.login');
// });
// Route::get('/cart', function () {
//     return view('pages.cart');
// });
// Route::get('/faq', function () {
//     return view('pages.faq');
// });

// Route::get('/productdetail', function () {
//     return view('pages.productdetail');
// });

// Route::get('/bengkeldetail', function () {
//     return view('pages.bengkeldetail');
// });

// Route::get('/categories', function () {
//     return view('pages.categories');
// });
// Route::get('/debug-sentry', function () {
//     throw new Exception('My first Sentry error!');
// });
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');





// // admin
// Route::get('/adminku', function () {
//     return view('admin.pages.dashboard');
// });