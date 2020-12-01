<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'API'], function () {
    Route::get('/configs', 'ConfigsController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('/static_content', 'StaticController@staticContent');
    Route::get('/gallery', 'GalleryController@index');
    Route::get('/mapbox', 'ContactController@mapbox');
    Route::post('/send_message', 'ContactController@sendMessage');
    Route::post('/send_contact', 'ContactController@sendContact');
});