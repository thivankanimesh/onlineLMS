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

Route::get('/viewebook/{id}','WelcomeController@viewEbook');

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/profile/download/{id}','ProfileController@download');

Route::get('/profile/delete/{id}','ProfileController@delete');

Route::get('/admin','AdminController@index');

Route::get('/admin/login','AdminController@login');

Route::get('/admin/logout','AdminController@logout');

Route::post('/admin/ebook/add','EbookController@add');

Route::post('/admin/ebook/update/{id}','EbookController@update');

Route::get('/admin/ebook/delete/{id}','EbookController@delete');

Route::post('/admin/author/add','AuthorController@add');

Route::post('/admin/author/update/{id}','AuthorController@update');

Route::get('/admin/author/delete/{id}','AuthorController@delete');

Route::post('/admin/publisher/add','PublisherController@add');

Route::post('/admin/publisher/update/{id}','PublisherController@update');

Route::get('/admin/publisher/delete/{id}','PublisherController@delete');

Route::get('/admin/shoppingcart','ShoppingCartController@index');

Route::get('/admin/shoppingcart/addtocart/{id}','ShoppingCartController@addToCart');

Route::get('/admin/shoppingcart/changequantity/{id}','ShoppingCartController@changeQuantity');

Route::get('/admin/shoppingcart/removefromcart/{id}','ShoppingCartController@removeFromCart');

Route::get('/admin/shoppingcart/purchase','ShoppingCartController@purchase');

Route::get('/admin/shoppingcart/purchase/pay/{subtotal}','PaymentController@payWithpaypal');
