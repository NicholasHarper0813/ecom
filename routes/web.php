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


Route::get('/','FrontController@index')->name('home');
Route::get('/products','FrontController@products')->name('products');
Route::get('/alternatives','FrontController@alternatives')->name('alternatives');
Route::get('/product','FrontController@product')->name('product');


Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');
Route::resource('/cart', 'CartController');
Route::get('/cart/addItem/{id}', 'CartController@addItem')->name('cart.addItem');
Route::get('/cart/add-item/{id}', 'CartController@addAlternativeItem')->name('cart.addAlternativeItem');

Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
    Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')->name('toggle.deliver');

    Route::get('/', function (){
        return view('admin.index');
    })->name('admin.index');

    Route::resource('product','ProductsController');
    Route::resource('alternative','AlternativeController');
    Route::resource('category','CategoriesController');

    Route::get('orders/{type?}','OrderController@Orders');
});

Route::resource('address','AddressController');

//Route::get('checkout','CheckoutController@step1');
Route::group(['middleware' => 'auth'], function (){
    Route::get('shipping-info','CheckoutController@shipping')->name('checkout.shipping');
});

Route::get('payment','CheckoutController@payment')->name('checkout.payment');
Route::post('store-payment','CheckoutController@storePayment')->name('payment.store');