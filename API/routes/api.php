<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'API'], function () {
    Route::get('/configs', 'ConfigsController@index');
    Route::get('/home', 'HomeController@index');

    
    Route::get('/mapbox', 'IndexController@mapbox');
    Route::get('/static_content', 'IndexController@staticContent');

    Route::post('/send_message', 'IndexController@sendMessage');
    Route::post('/send_contact', 'IndexController@sendContact');

});