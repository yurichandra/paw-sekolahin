<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

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

// For AuthController
Route::post('/login', 'AuthController@authenticate');
Route::get('/whoami', 'AuthController@validateToken');

// For SchoolController
Route::resource('schools', 'SchoolController');

// For CampaignController
Route::resource('campaigns', 'CampaignController');
Route::get('campaigns/by-user/{id}', 'CampaignController@getByUser');

// For DonationController
Route::resource('donations', 'DonationController');
Route::get('donations/by-user/{id}', 'DonationController@getByUser');

//For upload proof
Route::post('/upload-proof/{id}', [
    'middleware' => 'cors',
    'uses' => 'DonationController@uploadProof'
]);

//For verify donation
Route::get('/verify-donation/{id}', 'DonationController@verifyDonation');
