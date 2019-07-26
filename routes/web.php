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

Route::get('/admin','AdminController@index');

Route::get('/admin/login','AdminController@login');

Route::get('/admin/logout','AdminController@logout');

Route::post('/ebook/add','EbookController@add');

Route::post('/author/add','AuthorController@add');

Route::post('/publisher/add','PublisherController@add');

Route::get('/pay','PaymentController@payWithpaypal');
