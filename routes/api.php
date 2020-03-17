<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * IMPORTANT:
 * To work properly, header "Accept: application/json" should be added to all requests
 */

Route::group(['middleware' => 'api'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('refresh', 'AuthController@refresh');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('logout', 'AuthController@logout');
        Route::post('me', 'AuthController@me');

        Route::apiResource('phone', 'PhoneController');

        Route::group(['middleware' => 'admin'], function () {
            Route::apiResource('company', 'CompanyController');
            Route::apiResource('user', 'UserController');
        });
    });

    Route::get('get-phone-list', 'PhoneListController@getPhoneList');

});
