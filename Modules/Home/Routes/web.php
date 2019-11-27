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

Route::prefix('/')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/pictures/result', 'HomeController@pictures')->name('pictures.result');
    Route::get('/videos/result', 'HomeController@videos')->name('videos.result');
    Route::get('/videos/detail/{id}', 'HomeController@videosdetail')->name('videos.detail');
    Route::get('/sports/result', 'HomeController@sports')->name('sports.result');
    Route::get('/sports/detail/{id}', 'HomeController@sportsdetail')->name('sports.detail');
    Route::get('/sayari-and-gagal', 'HomeController@sayari')->name('sayari.result');
    Route::get('/quotes/result', 'HomeController@quotes')->name('quotes.result');
    Route::get('/gossips/result', 'HomeController@gossip')->name('gossips.result');
    Route::get('/gossip/detail/{id}', 'HomeController@gossipdetail')->name('gossip.detail');
    Route::get('/upload/create', 'HomeController@upload')->name('upload');
    Route::post('/upload/create', 'HomeController@uploadeddata')->name('upload.submit');
});
