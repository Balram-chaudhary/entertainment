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

Route::prefix('pictures')->group(function() {
    Route::any('/create', 'PicturesController@create')->name('pictures.create');
    Route::get('/list', 'PicturesController@list')->name('pictures.list');
    Route::any('/edit/{id}', 'PicturesController@edit')->name('pictures.edit');
    Route::get('/remove/{id}', 'PicturesController@remove')->name('pictures.remove');
});
