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

Route::prefix('gossips')->group(function() {
    Route::any('/create','GossipsController@create')->name('gossips.create');
    Route::get('/list','GossipsController@list')->name('gossips.list');
    Route::any('/edit/{id}','GossipsController@edit')->name('gossips.edit');
    Route::get('/remove/{id}','GossipsController@remove')->name('gossips.remove');
});
