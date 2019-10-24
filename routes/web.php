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

Route::get('/', function () {
    return view('welcome');
});
//Web
//Route::get('/rooms', 'RoomsController@index');
//Route::get('/sensors', 'SensorsController@index');
//Route::get('/relays', 'RelaysController@index');
//Route::get('/global_settings', 'GlobalSettingsController@index');

//Ressources
Route::resource('/global_settings', 'GlobalSettingsController@index');
Route::resource('/rooms', 'RoomsController@index');
Route::resource('/sensors', 'SensorsController@index');
Route::resource('/relays', 'RelaysController@index');
