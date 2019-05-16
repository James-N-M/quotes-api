<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/quotes', 'QuotesController@index');

Route::post('/quotes','QuotesController@store');

Route::get('/quotes/{quote}', 'QuotesController@show');

Route::delete('/quotes/{quote}', 'QuotesController@destroy');

Route::get('/quotes/{quote}/tags', 'QuoteTagsController@show');

Route::post('/quotes/{quote}/tags/{tag}', 'QuoteTagsController@store');

Route::delete('/quotes/{quote}/tags/{tag}', 'QuoteTagsController@destroy');

Route::get('/tags/{tag}', 'TagsController@show');

Route::post('/tags', 'TagsController@store');

Route::delete('/tags/{tag}', 'TagsController@destroy');

Route::post('/likes', 'LikesController@store');

Route::patch('/account', 'UserAccountController@update');

Route::patch('/account/quotes/{quote}', 'QuotesController@update');

Route::get('/random-quote', 'RandomQuoteController@show');

Route::get('/status', 'ApplicationStatusController@show');
