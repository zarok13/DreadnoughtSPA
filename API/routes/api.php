<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'API'], function () {
    Route::get('configs', 'ConfigsController');
    Route::get('home', 'HomeController');
    Route::get('static_content', 'StaticController');
    Route::get('products', 'ProductsController');
    Route::get('gallery', 'GalleryController');
    Route::get('contact/mapbox', 'ContactController@mapbox');
    Route::post('contact/send_message_footer', 'ContactController@sendMessage');
    Route::post('contact/send_message_contact', 'ContactController@sendContact');
});