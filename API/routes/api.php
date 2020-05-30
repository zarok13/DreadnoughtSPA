<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'API'], function () {
    Route::get('/menu', 'IndexController@menu');
    Route::get('/slider', 'IndexController@getSlider');
    Route::get('/intro_section_1', 'IndexController@getIntro1');
    Route::get('/intro_section_2', 'IndexController@getIntro2');
    Route::get('/intro_section_3', 'IndexController@getIntro3');
    Route::get('/blog_list', 'IndexController@blogList');
    Route::get('/footer', 'IndexController@getFooter');

    Route::post('/send_mail', 'IndexController@sendMail');
});