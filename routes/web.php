<?php

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

Route::get('/','WelcomeController@index');

Auth::routes();

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/profile/download/{id}','ProfileController@download');

Route::get('/profile/delete/{id}','ProfileController@delete');

Route::get('/admin','AdminController@index');

Route::get('/admin/login','AdminController@login');

Route::get('/admin/logout','AdminController@logout');

Route::post('/ebook/add','EbookController@add');

Route::post('/ebook/update/{id}','EbookController@update');

Route::get('/ebook/delete/{id}','EbookController@delete');

Route::post('/author/add','AuthorController@add');

Route::post('/author/update/{id}','AuthorController@update');

Route::get('/author/delete/{id}','AuthorController@delete');

Route::post('/publisher/add','PublisherController@add');

Route::post('/publisher/update/{id}','PublisherController@update');

Route::get('/publisher/delete/{id}','PublisherController@delete');

Route::get('/shoppingcart','ShoppingCartController@index');

Route::get('/shoppingcart/addtocart/{id}','ShoppingCartController@addToCart');

Route::get('/shoppingcart/changequantity/{id}','ShoppingCartController@changeQuantity');

Route::get('/shoppingcart/removefromcart/{id}','ShoppingCartController@removeFromCart');

Route::get('/shoppingcart/purchase','ShoppingCartController@purchase');

Route::get('/pay/{subtotal}','PaymentController@payWithpaypal');
