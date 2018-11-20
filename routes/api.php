<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// For UserController
Route::resource('users', 'UserController');
Route::get('/verify/{token}', 'UserController@verifyUser')->name('user-verify');
Route::post('/login', 'UserController@authenticate');

// For SchoolController
Route::resource('schools', 'SchoolController');

// For CampaignController
Route::resource('campaigns', 'CampaignController');
Route::get('campaigns/by-user/{id}', 'CampaignController@getByUser');

// For DonationController
Route::resource('donations', 'DonationController');
