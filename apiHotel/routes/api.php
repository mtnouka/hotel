<?php

use Carbon\Traits\Timestamp;
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

Route::apiResources([
    'guests' => 'GuestController',
    'checkins' => 'CheckinController'
]);

Route::get('in/guests', 'FilterController@guestsCheckin');
Route::get('out/guests', 'FilterController@guestsCheckout');
