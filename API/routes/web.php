<?php


Route::get('/{url?}/{id?}', function (){
   return view('welcome');
});