<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/store-session-data/{key}', 'App\Http\Controllers\SessionController@storeSessionData');
Route::get('/get-session-data/{key}', 'App\Http\Controllers\SessionController@getSessionData');
Route::get('/delete-session-data/{key}', 'App\Http\Controllers\SessionController@deleteSessionData');
Route::get('/store-cookie-data/{key}', 'App\Http\Controllers\SessionController@storeCookieData');
Route::get('/get-cookie-data/{key}', 'App\Http\Controllers\SessionController@getCookieData');
Route::get('/delete-cookie-data/{key}', 'App\Http\Controllers\SessionController@deleteCookieData');
Route::get('/get-all-cookies', 'App\Http\Controllers\SessionController@getAllCookies');
