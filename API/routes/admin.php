<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

$lang = urlLang();

/* Symlinks */
Route::get('/admin/storage', function () {
    App::make('files')->link(storage_path('app/public'), public_path('storage'));
    App::make('files')->link(base_path('blade_components'), public_path('blade_components'));
});
Route::group(['prefix' => 'admin'], function () use ($lang) {
    /* System Routes */
    Route::get('/' . $lang . '/login/', 'Auth\LoginController@showLoginForm');
    Route::post('/' . $lang . '/login/', 'Auth\LoginController@login')->name('login');
    Route::get('/' . $lang . '/logout/', 'Auth\LoginController@logout')->name('logout');
    Route::group(['namespace' => 'Admin\Dreadnought'], function () use ($lang) {
        Route::get('/', 'IndexController@index')->name('mainPage');
        Route::get('/' . $lang, 'IndexController@index');
        Route::get('/' . $lang . '/home', 'HomeController@index')->name('home');
        // clear_cache //
        Route::get('/clear_cache', 'HomeController@clearCache')->name('clearCache');
        // No Permissions //
        Route::get('/no_permissions', 'HomeController@noPermissions')->name('noPermissions');
        /* Administration */
        // Roles //
        Route::get('/administration/roles', 'RolesController@index')->name('administration.roles');
        Route::post('/administration/roles/create', 'RolesController@create')->name('administration.roles.create');
        Route::post('/administration/roles/update', 'RolesController@update')->name('administration.roles.update');
    });
    /* Default Routes */
    Route::group(['namespace' => 'Admin\Defaults'], function () use ($lang) {
        // Menu //
        Route::get('/' . $lang . '/menu', 'MenuController@index')->name('menu');
        Route::get('/' . $lang . '/menu/add', 'MenuController@add')->name('menu.add');
        Route::post('/' . $lang . '/menu/create', 'MenuController@create')->name('menu.create');
        Route::get('/' . $lang . '/menu/edit/{id}', 'MenuController@edit')->name('menu.edit');
        Route::post('/' . $lang . '/menu/update/{id}', 'MenuController@update')->name('menu.update');
        Route::get('/' . $lang . '/menu/delete/{id}', 'MenuController@delete')->name('menu.delete');
        Route::post('/' . $lang . '/menu/sort', 'MenuController@sort')->name('menu.sort');
        // Pages //
        Route::get('/' . $lang . '/pages', 'PagesController@index')->name('pages');
        Route::get('/' . $lang . '/pages/add', 'PagesController@add')->name('pages.add');
        Route::post('/' . $lang . '/pages/create', 'PagesController@create')->name('pages.create');
        Route::get('/' . $lang . '/pages/edit/{id}', 'PagesController@edit')->name('pages.edit');
        Route::post('/' . $lang . '/pages/update/{id}', 'PagesController@update')->name('pages.update');
        Route::get('/' . $lang . '/pages/delete/{id}', 'PagesController@delete')->name('pages.delete');
        Route::post('/' . $lang . '/pages/sort', 'PagesController@sort')->name('pages.sort');
        Route::get('/' . $lang . '/pages/content/{id}', 'PagesController@editPage')->name('pages.editPage');
        Route::post('/' . $lang . '/pages/content/{id}', 'PagesController@updatePage')->name('pages.updatePage');
        Route::post('/' . $lang . '/pages/template_group', 'PagesController@templateGroup')->name('pages.templateGroup');
        // Articles //
        Route::get('/' . $lang . '/articles/{id}', 'ArticlesController@index')->name('articles');
        Route::get('/' . $lang . '/articles/add/{id}', 'ArticlesController@add')->name('articles.add');
        Route::post('/' . $lang . '/articles/create/{id}', 'ArticlesController@create')->name('articles.create');
        Route::get('/' . $lang . '/articles/edit/{id}', 'ArticlesController@edit')->name('articles.edit');
        Route::post('/' . $lang . '/articles/update/{id}', 'ArticlesController@update')->name('articles.update');
        Route::get('/' . $lang . '/articles/delete/{id}', 'ArticlesController@delete')->name('articles.delete');
        // Contacts //
        Route::get('/' . $lang . '/contact/{id}', 'ContactController@index')->name('contact');
        Route::get('/' . $lang . '/contact/get_marker_form/{id}/{marker_id?}', 'ContactController@getMarkerForm')->name('contact.getMarkerForm');
        Route::post('/' . $lang . '/contact/update_marker/{id}/{marker_id?}', 'ContactController@updateMarker')->name('contact.updateMarker');
        Route::delete('/' . $lang . '/contact/delete_marker/{marker_id}', 'ContactController@deleteMarker')->name('contact.deleteMarker');
        Route::post('/' . $lang . '/contact/save_data_coordinates/{id}', 'ContactController@saveDataCoordinates')->name('contact.saveDataCoordinates');
        Route::post('/' . $lang . '/contact/sort', 'ContactController@sort')->name('contact.sort');
        // Language //
        Route::get('/' . $lang . '/languages', 'LanguageController@index')->name('languages');
        Route::get('/' . $lang . '/languages/add', 'LanguageController@add')->name('languages.add');
        Route::post('/' . $lang . '/languages/create', 'LanguageController@create')->name('languages.create');
        Route::get('/' . $lang . '/languages/edit/{id}', 'LanguageController@edit')->name('languages.edit');
        Route::post('/' . $lang . '/languages/update/{id}', 'LanguageController@update')->name('languages.update');
        Route::get('/' . $lang . '/languages/delete/{id}', 'LanguageController@delete')->name('languages.delete');
        // Helper Fields //
        Route::get('/' . $lang . '/helper_fields', 'HelperFieldsController@index')->name('helper_fields');
        Route::get('/' . $lang . '/helper_fields/add', 'HelperFieldsController@add')->name('helper_fields.add');
        Route::post('/' . $lang . '/helper_fields/create', 'HelperFieldsController@create')->name('helper_fields.create');
        Route::get('/' . $lang . '/helper_fields/edit/{id}', 'HelperFieldsController@edit')->name('helper_fields.edit');
        Route::post('/' . $lang . '/helper_fields/update/{id}', 'HelperFieldsController@update')->name('helper_fields.update');
        Route::get('/' . $lang . '/helper_fields/delete/{id}', 'HelperFieldsController@delete')->name('helper_fields.delete');
        Route::post('/' . $lang . '/helper_fields/type_template', 'HelperFieldsController@typeTemplate')->name('helper_fields.typeTemplate');
        // File Store //
        Route::get('/' . $lang . '/file_store', 'FileStoreController@index')->name('file_store');
        Route::post('/' . $lang . '/file_store/upload', 'FileStoreController@upload')->name('file_store.upload');
        Route::delete('/' . $lang . '/file_store/delete/{id}', 'FileStoreController@delete')->name('file_store.delete');

        Route::get('/' . $lang . '/small_file_store', 'FileStoreController@smallIndex')->name('small_file_store');
        Route::post('/' . $lang . '/small_file_store/upload', 'FileStoreController@smallUpload')->name('small_file_store.upload');
        Route::delete('/' . $lang . '/small_file_store/delete/{id}', 'FileStoreController@smallDelete')->name('small_file_store.delete');
        Route::post('/' . $lang . '/file_store/choose', 'FileStoreController@choose')->name('file_store.choose');
    });
    /* Other Routes */
    Route::group(['namespace' => 'Admin'], function () use ($lang) {
        // Sliders //
        Route::get('/' . $lang . '/sliders', 'SlidersController@index')->name('sliders');
        Route::get('/' . $lang . '/sliders/add', 'SlidersController@add')->name('sliders.add');
        Route::post('/' . $lang . '/sliders/create', 'SlidersController@create')->name('sliders.create');
        Route::get('/' . $lang . '/sliders/edit/{id}', 'SlidersController@edit')->name('sliders.edit');
        Route::post('/' . $lang . '/sliders/update/{id}', 'SlidersController@update')->name('sliders.update');
        Route::get('/' . $lang . '/sliders/delete/{id}', 'SlidersController@delete')->name('sliders.delete');
        Route::post('/' . $lang . '/sliders/sort', 'SlidersController@sort')->name('sliders.sort');
        // Reviews //
        Route::get('/' . $lang . '/reviews', 'ReviewsController@index')->name('reviews');
        Route::get('/' . $lang . '/reviews/add', 'ReviewsController@add')->name('reviews.add');
        Route::post('/' . $lang . '/reviews/create', 'ReviewsController@create')->name('reviews.create');
        Route::get('/' . $lang . '/reviews/edit/{id}', 'ReviewsController@edit')->name('reviews.edit');
        Route::post('/' . $lang . '/reviews/update/{id}', 'ReviewsController@update')->name('reviews.update');
        Route::get('/' . $lang . '/reviews/delete/{id}', 'ReviewsController@delete')->name('reviews.delete');
        Route::post('/' . $lang . '/reviews/sort', 'ReviewsController@sort')->name('reviews.sort');
    });
});
