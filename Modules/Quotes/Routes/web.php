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

Route::prefix('quotes')->group(function() {
    Route::any('/create','QuotesController@create')->name('quotes.create');
    Route::get('/list','QuotesController@list')->name('quotes.list');
    Route::any('/edit/{id}','QuotesController@edit')->name('quotes.edit');
    Route::get('/remove/{id}','QuotesController@remove')->name('quotes.remove');
});
