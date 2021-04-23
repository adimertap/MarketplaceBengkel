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
Route::get("/", "HomeController@index") ->name('home');
Route::get("/categories", "CategoriesController@index");

Route::get("/categories/{id}", "CategoriesController@index")->name('categories-detail');
Route::get("/details/{id}", "DetailController@index")->name('detail');
Route::post("/details/{id}", "DetailController@add")->name('detail-add');

Route::get("/a", "CheckoutController@ongkir");

Route::post("/checkout/process", "CheckoutController@process")->name('checkout-process');
Route::get("/checkout/callback", "CheckoutController@callbak")->name('checkout-callback');


Route::get("/getkabupaten/{id}", "CheckoutController@kabupaten");

Route::prefix('admin')
    ->namespace('AdminMarketplace')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/', "DashboardController@index");
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('sparepart', 'SparepartController');
        Route::resource('bengkel', 'BengkelController');

    });

Auth::routes();
Route::get("/getcity/ajax/{id}", "Auth\RegisterController@ajax");

Route::group(['middleware' => ['auth']], function(){

    Route::get("/cart", "CartController@index")->name('cart');
    Route::delete("/cart/{id}", "CartController@delete")->name('cart-delete');

    Route::get("/checkout", "CheckoutController@index")->name('checkout');
   

});

    






// Route::get("/checkout", "getApi@index");
Route::get("/registeri", "getApi@register");



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



// Route::get('/home', 'HomeController@index')->name('home');





// // admin
// Route::get('/adminku', function () {
//     return view('admin.pages.dashboard');
// });