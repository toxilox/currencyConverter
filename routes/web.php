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

Route::get('/', 'CurrenciesController@index');

Route::post('/clear-currencies', 'CurrenciesController@truncate');
Route::post('/update-currencies', 'CurrenciesController@updateCurrencies');
