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

/*
|--------------------------------------------------------------------------
| QuotesController Routes
|--------------------------------------------------------------------------
*/
Route::get('/quotes', 'QuotesController@index');

Route::get('/quotes/{quote}', 'QuotesController@show');

Route::post('/quotes','QuotesController@store');

Route::patch('/quotes/{quote}', 'QuotesController@update');

Route::delete('/quotes/{quote}', 'QuotesController@destroy');
/*
|--------------------------------------------------------------------------
| QuoteTagController Routes
|--------------------------------------------------------------------------
*/
Route::get('/quotes/{quote}/tags', 'QuoteTagsController@show');

Route::post('/quotes/{quote}/tags/{tag}', 'QuoteTagsController@store');

Route::delete('/quotes/{quote}/tags/{tag}', 'QuoteTagsController@destroy');

/*
|--------------------------------------------------------------------------
| TagsController Routes
|--------------------------------------------------------------------------
*/

Route::get('/tags/{tag}', 'TagsController@show');

Route::post('/tags', 'TagsController@store');

Route::get('/tags-search', 'TagsController@search');

Route::delete('/tags/{tag}', 'TagsController@destroy');

/*
|--------------------------------------------------------------------------
| TagQuotesController Routes
|--------------------------------------------------------------------------
*/

Route::get('/tags/{tag}/quotes', 'TagQuotesController@show');

/*
|--------------------------------------------------------------------------
| LikesController Routes
|--------------------------------------------------------------------------
*/
Route::post('/likes', 'LikesController@store');
/*
|--------------------------------------------------------------------------
| UserAccountController Routes
|--------------------------------------------------------------------------
*/
Route::patch('/account', 'UserAccountController@update');
/*
|--------------------------------------------------------------------------
| Utility Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('/random-quote', 'RandomQuoteController@show');
Route::get('/status', 'ApplicationStatusController@show');
