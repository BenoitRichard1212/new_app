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
Route::resource('global_settings', 'GlobalSettingsController');
Route::resource('rooms', 'RoomsController');
Route::resource('sensors', 'SensorsController');
Route::resource('relays', 'RelaysController');

Route::get('/edit/global_settings/{name}','GlobalSettingsController@edit');
Route::patch('/edit/global_settings/{name}','GlobalSettingsController@update');

Route::get('/edit/rooms/{name}','RoomsController@edit');
Route::patch('/edit/rooms/{name}','RoomsController@update');

Route::get('/edit/relays/{name}','RelaysController@edit');
Route::patch('/edit/relays/{name}','RelaysController@update');

Route::get('/edit/sensors/{sensor}','SensorsController@edit');
Route::patch('/edit/sensors/{sensor}','SensorsController@update');
