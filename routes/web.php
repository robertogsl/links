<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/links', 'LinkController@index')->name('showLink');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/links', 'LinkController@store')->name('createLink');

Route::get('/remoteConfig', 'AplicationController@index')->name('showRC');

Route::get('/remoteConfig/config/{id}', 'ConfigController@index')->name('showConfig');

Route::post('/remoteConfig/config/{id}', 'ConfigController@store')->name('storeConfig');

Route::get('/remoteConfig/cadastrar', 'AplicationController@viewRegisterAplication')->name('showAplication');

Route::post('/remoteConfig/cadastrar', 'AplicationController@store')->name('createAplication');