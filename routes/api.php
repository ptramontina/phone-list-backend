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
    
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::post('add-test-user', function () {
    $user = App\User::firstOrCreate([
        'name' => 'John Doe',
        'email' => 'john@doe.com',
        'password' => bcrypt('test')
    ]);
    
    return response()->json([
        'success' => true,
        'user' => $user
    ]);
});