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

Route::any('/', 'HomeController@home')->name('home');

Route::get('send-email', 'HomeController@sendEmail')->name('send.email');

Route::get('make/paypal/checkout', 'PaymentController@paypalCheckout')->name('make.paypal.checkout');

Route::get('payment/paypal/success', 'PaymentController@paymentPaypalSuccess')->name('payment.paypal.success');

Route::get('payment/paypal/cancel', 'PaymentController@paymentPaypalCancel')->name('payment.paypal.cancel');

Route::get('items','ItemsController@items')->name('items');