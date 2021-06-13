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

Route::get('/', function () {
    return view('web.pages.home');
});

Route::get('admin/login', 'Auth\AuthController@index')->middleware('guest')->name('admin.login');
Route::post('authenticate', 'Auth\AuthController@authenticate')->name('admin.login.authenticate');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', 'Dashboard\DashboardController@index')->name('admin.dashboard');
    Route::get('admin/logout', 'Auth\AuthController@logout')->name('admin.logout');

    //User
    Route::get('user', 'User\UserController@index')->name('admin.user.index');
    Route::get('user/{id}', 'User\UserController@edit')->name('admin.user.edit');
    Route::get('user-create', 'User\UserController@create')->name('admin.user.create');
    Route::post('user', 'User\UserController@store')->name('admin.user.store');
    Route::post('user-update', 'User\UserController@update')->name('admin.user.update');
    Route::get('user-delete/{id}', 'User\UserController@delete')->name('admin.user.delete');

    //Facility
    Route::get('facility', 'Facility\FacilityController@index')->name('admin.facility.index');
    Route::get('admin/facility/{id}', 'Facility\FacilityController@edit')->name('admin.facility.edit');
    Route::get('facility-create', 'Facility\FacilityController@create')->name('admin.facility.create');
    Route::post('facility', 'Facility\FacilityController@store')->name('admin.facility.store');
    Route::post('facility-update', 'Facility\FacilityController@update')->name('admin.facility.update');
    Route::get('facility-delete/{id}', 'Facility\FacilityController@delete')->name('admin.facility.delete');

    //Location
    Route::get('location', 'Location\LocationController@index')->name('admin.location.index');
    Route::get('location/{id}', 'Location\LocationController@edit')->name('admin.location.edit');
    Route::get('location-create', 'Location\LocationController@create')->name('admin.location.create');
    Route::post('location', 'Location\LocationController@store')->name('admin.location.store');
    Route::post('location-update', 'Location\LocationController@update')->name('admin.location.update');
    Route::get('location-delete/{id}', 'Location\LocationController@delete')->name('admin.location.delete');

    //Product
    Route::get('product', 'Product\ProductController@index')->name('admin.product.index');
    Route::get('product/{id}', 'Product\ProductController@edit')->name('admin.product.edit');
    Route::get('product-create', 'Product\ProductController@create')->name('admin.product.create');
    Route::post('product', 'Product\ProductController@store')->name('admin.product.store');
    Route::post('product-update', 'Product\ProductController@update')->name('admin.product.update');
    Route::get('product-delete/{id}', 'Product\ProductController@delete')->name('admin.product.delete');

    //Clients
    Route::get('client', 'Client\ClientController@index')->name('admin.client.index');
    Route::get('client/{id}', 'Client\ClientController@edit')->name('admin.client.edit');
    Route::get('client-create', 'Client\ClientController@create')->name('admin.client.create');
    Route::post('client', 'Client\ClientController@store')->name('admin.client.store');
    Route::post('client-update', 'Client\ClientController@update')->name('admin.client.update');
    Route::get('client-delete/{id}', 'Client\ClientController@delete')->name('admin.client.delete');

    //Orders
    Route::get('order', 'Order\OrderController@index')->name('admin.order.index');
    Route::get('order/confirm-payment/{id}', 'Order\OrderController@approvePayment')->name('admin.order.paid');

    //Booking
    Route::get('admin-booking', 'Booking\BookingController@adminIndex')->name('admin.booking.index');
});

Route::get('login', 'Web\WebController@login')->name('web.login');
Route::get('register', 'Web\WebController@register')->name('web.register');
Route::get('about-us', 'Web\WebController@aboutUs')->name('web.about');
Route::get('pricing', 'Web\WebController@pricing')->name('web.pricing');
Route::get('buy/{id}', 'Order\OrderController@buy')->name('web.buy');

Route::post('doRegister', 'Auth\AuthController@clientRegister')->name('web.auth.register');
Route::post('doLogin', 'Auth\AuthController@clientLogin')->name('web.auth.login');

Route::group(['middleware' => ['client']], function () {

    //Client Dashboard
    Route::get('home', 'Home\HomeController@index')->name('web.home');

    //Auth for Client
    Route::get('doLogout', 'Auth\AuthController@clientLogout')->name('web.auth.logout');

    Route::get('transaction/{id}', 'Order\OrderController@orderPage')->name('web.transaction.detail');
    Route::post('transaction/upload-payment-proof', 'Order\OrderController@uploadPaymentProof')->name('web.transaction.uploadPaymentProof');
    Route::get('book-room', 'Booking\BookingController@index')->name('web.booking');
    Route::get('facility/{id}', 'Facility\FacilityController@webShow')->name('web.facility');
    Route::post('facility-book', 'Facility\FacilityController@bookFacility')->name('web.facility.book');
    Route::get('account-settings' , 'Client\ClientController@publicIndex')->name('web.settings.index');
    Route::post('personal-info' , 'Client\ClientController@changePersonalInfo')->name('account.change.personal');
    Route::post('password' , 'Client\ClientController@changePassword')->name('account.change.password');
});