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

Route::prefix('sports')->group(function() {
    Route::get('/', 'SportsController@index');
    Route::any('/create','SportsController@create')->name('sports.create');
    Route::get('/list','SportsController@list')->name('sports.list');
    Route::any('/edit/{id}','SportsController@edit')->name('sports.edit');
    Route::get('/remove/{id}','SportsController@remove')->name('sports.remove');
});
