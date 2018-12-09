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
Route::post('/biodata-alamat','AuthController@update_alamat');
Route::post('/biodata-foto','AuthController@upload_foto');

//home
Route::get('/home','HomeController@index');

Route::get('/servis','HomeController@create_servis');
Route::post('/servis','HomeController@set_servis');

Route::get('/lokasi-jemput-antar','HomeController@set_lokasi');
Route::post('/lokasi-jemput-antar','HomeController@update_lokasi');

Route::get('/list-servis/','HomeController@list_servis');


// ===========================================================
//Route Admin
Route::get('/home-admin','AdminController@index');
Route::get('home-login','AdminController@login');
Route::get('home-register','AdminController@register');
Route::get('data-user','AdminController@data_user');
Route::get('data-customer','AdminController@data_customer');