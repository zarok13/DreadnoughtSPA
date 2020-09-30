<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'API'], function () {
    Route::get('/configs', 'ConfigsController@index');
    Route::get('/home', 'HomeController@index');

    Route::get('/menu', 'IndexController@menu');
    Route::get('/slider', 'IndexController@getSlider');
    Route::get('/intro_section_1', 'IndexController@getIntro1');
    Route::get('/intro_section_2', 'IndexController@getIntro2');
    Route::get('/intro_section_3', 'IndexController@getIntro3');
    Route::get('/blog_list', 'IndexController@blogList');
    Route::get('/footer', 'IndexController@getFooter');
    Route::get('/mapbox', 'IndexController@mapbox');
    Route::get('/static_content', 'IndexController@staticContent');

    Route::post('/send_message', 'IndexController@sendMessage');
    Route::post('/send_contact', 'IndexController@sendContact');

});