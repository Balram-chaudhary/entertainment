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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.login');
    Route::post('/authenticate','AdminController@authenticate')->name('admin.login.submit');
    Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/dashboard/logout','AdminController@logout')->name('admin.dashboard.logout');

});
