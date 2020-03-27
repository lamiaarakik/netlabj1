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
    return view('index');
});
Route::get('/loopback', function () {
    return view('loopback');
});
Route::get('/staticRouting', function () {
    return view('staticRouting');
});
Route::get('/code', function () {
    return view('code');
});
Route::get('/form', function () {
    return view('form');
});
Route::get('/loopbackform', function () {
    return view('loopbackform');
});
Route::post('/create',['uses'=>'LoopbackController@create', 
'as'=>'loopback.create'
]);