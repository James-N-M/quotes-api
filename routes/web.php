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

//Route::get('/quotes/create', 'QuotesController@create');
//
//Route::get('/account', 'UserAccountController@index');
//
Route::get('/quotes-download', 'QuotesFileController@downloadQuote');

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/search/quotes/{tag}', 'TagQuotesController@index' );
