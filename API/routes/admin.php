<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\Defaults\ArticlesController;
use App\Http\Controllers\Admin\Defaults\ContactController;
use App\Http\Controllers\Admin\Defaults\FileStoreController;
use App\Http\Controllers\Admin\Defaults\HelperFieldsController;
use App\Http\Controllers\Admin\Defaults\LanguageController;
use App\Http\Controllers\Admin\Defaults\MenuController;
use App\Http\Controllers\Admin\Defaults\PagesController;
use App\Http\Controllers\Admin\Dreadnought\HomeController;
use App\Http\Controllers\Admin\Dreadnought\IndexController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SlidersController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

$lang = urlLang();

/* Symlinks */
Route::get('/admin/storage', function () {
    App::make('files')->link(storage_path('app/public'), public_path('storage'));
    App::make('files')->link(base_path('scripts'), public_path('scripts'));
    // FileStore::truncate();
});
Route::group(['prefix' => 'admin'], function () use ($lang) {
    /* System Routes */
    Route::group(['namespace' => 'Admin\Auth'], function () use ($lang) {
        Route::get('/' . $lang . '/login/', [LoginController::class, 'showLoginForm']);
        Route::post('/' . $lang . '/login/', [LoginController::class, 'login'])->name('login');
        Route::get('/' . $lang . '/logout/', [LoginController::class, 'logout'])->name('logout');
    });
    Route::group(['namespace' => 'Admin\Dreadnought'], function () use ($lang) {
        Route::get('/', [IndexController::class, 'index'])->name('mainPage');
        Route::get('/' . $lang, [IndexController::class, 'index']);
        Route::get('/' . $lang . '/home', [HomeController::class, 'index'])->name('home');
        // clear_cache
        Route::get('/clear_cache', [HomeController::class, 'clearCache'])->name('clearCache');
        // No Permissions
        Route::get('/no_permissions', [HomeController::class, 'noPermissions'])->name('noPermissions');
        /* Administration */
        // Roles
        Route::get('/administration/roles', 'RolesController@index')->name('administration.roles');
        Route::post('/administration/roles/create', 'RolesController@create')->name('administration.roles.create');
        Route::post('/administration/roles/update', 'RolesController@update')->name('administration.roles.update');
    });
    /* Default Routes */
    Route::group(['namespace' => 'Admin\Defaults', 'middleware' => 'permission'], function () use ($lang) {
        // Menu
        Route::get('/' . $lang . '/menu', [MenuController::class, 'index'])->name('menu');
        Route::get('/' . $lang . '/menu/add', [MenuController::class, 'add'])->name('menu.add');
        Route::post('/' . $lang . '/menu/create', [MenuController::class, 'create'])->name('menu.create');
        Route::get('/' . $lang . '/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::post('/' . $lang . '/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
        Route::get('/' . $lang . '/menu/delete/{id}', [MenuController::class, 'delete'])->name('menu.delete');
        Route::post('/' . $lang . '/menu/sort', [MenuController::class, 'sort'])->name('menu.sort');
        // Pages
        Route::get('/' . $lang . '/pages', [PagesController::class, 'index'])->name('pages');
        Route::get('/' . $lang . '/pages/add', [PagesController::class, 'add'])->name('pages.add');
        Route::post('/' . $lang . '/pages/create', [PagesController::class, 'create'])->name('pages.create');
        Route::get('/' . $lang . '/pages/edit/{id}', [PagesController::class, 'edit'])->name('pages.edit');
        Route::post('/' . $lang . '/pages/update/{id}', [PagesController::class, 'update'])->name('pages.update');
        Route::get('/' . $lang . '/pages/delete/{id}', [PagesController::class, 'delete'])->name('pages.delete');
        Route::post('/' . $lang . '/pages/sort', [PagesController::class, 'sort'])->name('pages.sort');
        Route::get('/' . $lang . '/pages/content/{id}', [PagesController::class, 'editPage'])->name('pages.editPage');
        Route::post('/' . $lang . '/pages/content/{id}', [PagesController::class, 'updatePage'])->name('pages.updatePage');
        Route::post('/' . $lang . '/pages/template_group', [PagesController::class, 'templateGroup'])->name('pages.templateGroup');
        // Articles
        Route::get('/' . $lang . '/articles/{id}', [ArticlesController::class, 'index'])->name('articles');
        Route::get('/' . $lang . '/articles/add/{id}', [ArticlesController::class, 'add'])->name('articles.add');
        Route::post('/' . $lang . '/articles/create/{id}', [ArticlesController::class, 'create'])->name('articles.create');
        Route::get('/' . $lang . '/articles/edit/{id}', [ArticlesController::class, 'edit'])->name('articles.edit');
        Route::post('/' . $lang . '/articles/update/{id}', [ArticlesController::class, 'update'])->name('articles.update');
        Route::get('/' . $lang . '/articles/delete/{id}', [ArticlesController::class, 'delete'])->name('articles.delete');
        // Contacts
        Route::get('/' . $lang . '/contact/{id}', [ContactController::class, 'index'])->name('contact');
        Route::get('/' . $lang . '/contact/get_marker_form/{page_id}/{marker_id?}', [ContactController::class, 'getMarkerForm'])->name('contact.getMarkerForm');
        Route::post('/' . $lang . '/contact/update_marker/{page_id}/{marker_id?}', [ContactController::class, 'updateMarker'])->name('contact.updateMarker');
        Route::delete('/' . $lang . '/contact/delete_marker/{marker_id}', [ContactController::class, 'deleteMarker'])->name('contact.deleteMarker');
        Route::post('/' . $lang . '/contact/save_data_coordinates/{page_id}', [ContactController::class, 'saveDataCoordinates'])->name('contact.saveDataCoordinates');
        Route::post('/' . $lang . '/contact/sort', [ContactController::class/*  */, 'sort'])->name('contact.sort');
        // Language
        Route::get('/' . $lang . '/languages', [LanguageController::class, 'index'])->name('languages');
        Route::get('/' . $lang . '/languages/add', [LanguageController::class, 'add'])->name('languages.add');
        Route::post('/' . $lang . '/languages/create', [LanguageController::class, 'create'])->name('languages.create');
        Route::get('/' . $lang . '/languages/edit/{id}', [LanguageController::class, 'edit'])->name('languages.edit');
        Route::post('/' . $lang . '/languages/update/{id}', [LanguageController::class, 'update'])->name('languages.update');
        Route::get('/' . $lang . '/languages/delete/{id}', [LanguageController::class, 'delete'])->name('languages.delete');
        // Helper Fields
        Route::get('/' . $lang . '/helper_fields', [HelperFieldsController::class, 'index'])->name('helper_fields');
        Route::get('/' . $lang . '/helper_fields/add', [HelperFieldsController::class, 'add'])->name('helper_fields.add');
        Route::post('/' . $lang . '/helper_fields/create', [HelperFieldsController::class, 'create'])->name('helper_fields.create');
        Route::get('/' . $lang . '/helper_fields/edit/{id}', [HelperFieldsController::class, 'edit'])->name('helper_fields.edit');
        Route::post('/' . $lang . '/helper_fields/update/{id}', [HelperFieldsController::class, 'update'])->name('helper_fields.update');
        Route::get('/' . $lang . '/helper_fields/delete/{id}', [HelperFieldsController::class, 'delete'])->name('helper_fields.delete');
        Route::post('/' . $lang . '/helper_fields/type_template', [HelperFieldsController::class, 'typeTemplate'])->name('helper_fields.typeTemplate');
        // File Store
        Route::get('/' . $lang . '/file_store', [FileStoreController::class, 'index'])->name('file_store');
        Route::get('/' . $lang . '/small_file_store', [FileStoreController::class, 'smallIndex'])->name('small_file_store');
        Route::post('/' . $lang . '/file_store/upload', [FileStoreController::class, 'upload'])->name('file_store.upload');
        Route::delete('/' . $lang . '/file_store/delete/{id}', [FileStoreController::class, 'delete'])->name('file_store.delete');
        Route::post('/' . $lang . '/file_store/choose', [FileStoreController::class, 'choose'])->name('file_store.choose');
        Route::post('/' . $lang . '/file_store/apply_references/{reference_type}/{reference_id}', [FileStoreController::class, 'applyReferences'])->name('file_store.applyReferences');
        Route::delete('/' . $lang . '/file_store/unset_references/{reference_type}/{reference_id}', [FileStoreController::class, 'unsetReference'])->name('file_store.unsetReference');
    });
    /* Other Routes */
    Route::group(['namespace' => 'Admin', 'middleware' => 'permission'], function () use ($lang) {
        // Sliders
        Route::get('/' . $lang . '/sliders', [SlidersController::class ,'index'])->name('sliders');
        Route::get('/' . $lang . '/sliders/add', [SlidersController::class ,'add'])->name('sliders.add');
        Route::post('/' . $lang . '/sliders/create', [SlidersController::class ,'create'])->name('sliders.create');
        Route::get('/' . $lang . '/sliders/edit/{id}', [SlidersController::class ,'edit'])->name('sliders.edit');
        Route::post('/' . $lang . '/sliders/update/{id}', [SlidersController::class ,'update'])->name('sliders.update');
        Route::get('/' . $lang . '/sliders/delete/{id}', [SlidersController::class ,'delete'])->name('sliders.delete');
        Route::post('/' . $lang . '/sliders/sort', [SlidersController::class ,'sort'])->name('sliders.sort');
         // Banners
         Route::get('/' . $lang . '/banners', [BannersController::class ,'index'])->name('banners');
         Route::get('/' . $lang . '/banners/add', [BannersController::class ,'add'])->name('banners.add');
         Route::post('/' . $lang . '/banners/create', [BannersController::class ,'create'])->name('banners.create');
         Route::get('/' . $lang . '/banners/edit/{id}', [BannersController::class ,'edit'])->name('banners.edit');
         Route::post('/' . $lang . '/banners/update/{id}', [BannersController::class ,'update'])->name('banners.update');
         Route::get('/' . $lang . '/banners/delete/{id}', [BannersController::class ,'delete'])->name('banners.delete');
         Route::post('/' . $lang . '/banners/sort', [BannersController::class ,'sort'])->name('banners.sort');
        // Gallery
        Route::get('/' . $lang . '/gallery/{id}', [GalleryController::class, 'index'])->name('gallery');
    });
});
