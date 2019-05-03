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
Auth::routes();


//Route::resource('index', 'ItemsController'); 
Route::get('/index', 'ItemsController@index'); 

Route::get('/bill', 'ItemsController@store'); 
Route::get('/reports', 'LaravelGoogleGraph@index');
Route::get('/reportLinegraph', 'LineGraph@index');
Route::get('/bargraphchart', 'BarGraph@index');

