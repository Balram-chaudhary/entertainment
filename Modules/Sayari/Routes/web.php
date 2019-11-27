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

Route::prefix('sayari')->group(function() {
    Route::get('/', 'SayariController@index');
    Route::any('/create','SayariController@create')->name('sayari.create');
    Route::get('/list','SayariController@list')->name('sayari.list');
    Route::any('/edit/{id}','SayariController@edit')->name('sayari.edit');
    Route::get('/remove/{id}','SayariController@remove')->name('sayari.remove');
});
