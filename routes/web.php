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

Route::get('/', 'AccountController@index')->name('account.index');

Route::get('/account_entry', 'AccountController@entry')->name('account.entry');

Route::post('account_update', 'AccountController@update')->name('account.update');

Route::get('/account_entry_ajax', 'AccountController@entryAjax')->name('account.entry.ajax');

Route::get('/porducts', 'ProductController@index')->name('product.index');
