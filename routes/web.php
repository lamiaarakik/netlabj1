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
Route::get('/dynamic', function () {
    return view('dynamic');
});
Route::get('/dynamicform', function () {
    return view('dynamicform');
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
Route::get('/staticroutingform', function () {
    return view('staticroutingform');
});
Route::post('/dynamic',['uses'=>'DynamicController@create', 
'as'=>'dynamic.create'
]);
Route::post('/create',['uses'=>'LoopbackController@create', 
'as'=>'loopback.create'
]);
Route::post('/staticRouting',['uses'=>'StaticRoutingController@create', 
'as'=>'static.create'
]);
Route::get('/OSPFUnicast', function () {
    return view('OSPFUnicast');
});
Route::get('/OSPFUnicastForm', function () {
    return view('OSPFUnicastForm');
});

Route::post('/createOSPF',['uses'=>'OSPFUnicastController@create',
    'as'=>'OSPFUnicast.create'
]);
Route::get('/RipUnicast', function () {
    return view('RipUnicast');
});

Route::get('/ripunicastform', function () {
    return view('ripUnicastform');
});

Route::post('/createRip',['uses'=>'RipController@create',
    'as'=>'ripUnicast.createRip'
]);
Route::get('/Ip6OverIp4Form', function () {
    return view('Ip6OverIp4Form');
});
Auth::routes();

Route::get('/Ip6OverIp4', function () {
    return view('Ip6OverIp4');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/privateVlan', function () {
    return view('privateVlan');
});