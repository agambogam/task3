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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','GalleriesController@index')->name('root');

Route::get('create','GalleriesController@create')->name('create');

Route::post('create','GalleriesController@store');

Route::resource('galleries','GalleriesController');