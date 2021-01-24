<?php


Route::get('/{url?}/{id?}', function (){
   dd('404');
   return view('welcome');
});