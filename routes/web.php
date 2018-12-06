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
// ================================================================================
//Authentifikasi
Route::get('/login','AuthController@index');
Route::post('/login','AuthController@cek_data');
Route::get('/register','AuthController@index2');
Route::post('/register','AuthController@daftar');
Route::get('/biodata','AuthController@bio');
Route::post('/biodata','AuthController@update_bio');

//home
Route::get('/home','HomeController@index');

Route::get('/servis','HomeController@create_servis');