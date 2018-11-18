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

// For user

Route::get('/', 'IndexController@index');
Route::get('/create', 'IndexController@index');
Route::get('/profile', 'IndexController@index');

// For Admin

Route::get('/admin', 'IndexController@admin');

Route::get('/admin/{any}', function () {
    return view('admin');
})->where('any', '[\/\w\.-]*');

Route::get('/{any}', function () {
    return view('index');
})->where('any', '[\/\w\.-]*');
