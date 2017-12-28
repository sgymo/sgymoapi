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

Route::resource('users', 'UserController');

// Route::post('login', 'AuthController@login');

Route::post('login', 'UserController@login');

Route::get('gym/{gym}/customers', 'CustomerController@index');

Route::get('gym/{gym}/customers/{customer}', 'CustomerController@show');

Route::post('gym/{gym}/customers/store', 'CustomerController@store');

Route::put('gym/{gym}/customers/edit/{customer}', 'CustomerController@update');

Route::pots('gym/{gym}/customers/edit/length/{customer}', 'LengthPartController@store');