<?php


namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
           // Administrator info
           View::composer('admin.base.sidebar', function ($view) {
               $admin = User::find(Auth::id());
               $view->with('admin', $admin);
           });
        }
        else {
            /* frontend */
            View::composer('site.base.*', \App\Http\ViewComposers\MenuComposer::class);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\App\Http\ViewComposers\MenuComposer::class);
    }
}
