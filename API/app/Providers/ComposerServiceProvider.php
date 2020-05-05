<?php


namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\User;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /* backend */
        if(request()->segment(1) == ADMIN_PANEL_SEGMENT_NAME) {
//            //sending permissions to menu
//            View::composer('backend.widgets.menu.tree', \App\Http\ViewComposers\PermissionComposer::class);
           // Administrator info
           View::composer('admin.base.sidebar', function ($view) {
               $admin = User::find(Auth::id());
               $view->with('admin', $admin);
           });
        }
        else {
            /* frontend */
            View::composer('site.base.*', \App\Http\ViewComposers\MenuComposer::class);
//            View::composer('frontend.*', \App\Http\ViewComposers\PagesComposer::class);
//            View::composer('frontend.widgets.*', \App\Http\ViewComposers\BannersComposer::class);
//            View::composer('frontend.*', \App\Http\ViewComposers\ArticlesComposer::class);
//            View::composer('frontend.widgets.*', \App\Http\ViewComposers\PhotoGalleryComposer::class);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->singleton(\App\Http\ViewComposers\PermissionComposer::class);
        $this->app->singleton(\App\Http\ViewComposers\MenuComposer::class);
//        $this->app->singleton(\App\Http\ViewComposers\PagesComposer::class);
//        $this->app->singleton(\App\Http\ViewComposers\BannersComposer::class);
//        $this->app->singleton(\App\Http\ViewComposers\ArticlesComposer::class);
//        $this->app->singleton(\App\Http\ViewComposers\PhotoGalleryComposer::class);
    }
}
