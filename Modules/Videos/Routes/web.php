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

Route::prefix('videos')->group(function() {
    Route::any('/create', 'VideosController@create')->name('videos.create');
    Route::get('/list', 'VideosController@list')->name('videos.list');
    Route::any('/edit/{id}', 'VideosController@edit')->name('videos.edit');
     Route::get('/remove/{id}', 'VideosController@remove')->name('videos.remove');
    // Route::get('/search','VideosController@search')->name('videos.search');
    // Route::post('/sort','VideosController@sort')->name('videos.sort');
});
