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
*/

// Landing page routes
Route::get('/', 'LandingPageController@index')->name('landing-name');

// Shop routes
Route::resource('shop', 'ShopController')->only(['index', 'show']);

// Cart routes
Route::resource('cart', 'CartController')->except(['create', 'edit', 'show']);

// Wishlist routes
Route::resource('wishlist', 'WishListController')->only(['index', 'store', 'update', 'destroy']);

// Coupon routes
Route::resource('coupon', 'CouponsController')->only(['store', 'destroy']);
Route::delete('/coupon/{coupon}/condition', 'CouponsController@destroyCondition')->name('coupon.condition');

// Checkout routes
Route::resource('checkout', 'CheckoutController')->only(['index', 'store']);
Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');
Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');

// Thankyou page route
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

// Authentication routes
Auth::routes();

// Homepage route
Route::get('/home', 'HomeController@index')->name('home');

// Search routes
Route::get('/search', 'ShopController@index')->name('search');
Route::get('/search-algolia', 'ShopController@searchAlgolia')->name('search-algolia');

// User routes
Route::middleware('auth')->group(function () {
    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile', 'UsersController@update')->name('users.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});
