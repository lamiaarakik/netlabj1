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
Route::resource('posts', 'API\LoopbackAPIController');
Route::resource('static', 'API\StaticRoutingAPIController');
Route::resource('dynamic', 'API\DynamicAPIController');
Route::resource('Rips', 'API\APIRipController');
Route::resource('ospfs', 'API\LoopbackAPIController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
