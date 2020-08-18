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
Route::get('/', 'LandingPageController@index')->name('landing-page');

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
Route::resource('checkout', 'CheckoutController')->only(['index', 'store'])->middleware('auth');
Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

// Thankyou page route
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

// Authentication routes
Auth::routes();

// Homepage route
Route::get('/home', 'HomeController@index')->name('home');

// Search routes
Route::get('/search', 'ShopController@search')->name('search');
Route::get('/search-algolia', 'ShopController@searchAlgolia')->name('search-algolia');

// User routes
Route::middleware('auth')->group(function () {
    Route::get('/my-dashboard', 'UsersController@dashboard')->name('users.dashboard');

    Route::get('/my-downloads', 'UsersController@downloads')->name('users.downloads');

    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile/{user}', 'UsersController@update')->name('users.update');

    Route::get('/my-password', 'UsersController@password_edit')->name('users-password.edit');
    Route::patch('/my-password/{user}', 'UsersController@password_update')->name('users-password.update');

    Route::get('/my-address', 'UsersController@address_edit')->name('users-address.edit');
    Route::patch('/my-address/{user}', 'UsersController@address_update')->name('users-address.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
