<?php


namespace App\Providers;


use App\Library\ModulePerms;
use Illuminate\Support\ServiceProvider;

class ModulePermsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ModulePerms',function () {
            return new ModulePerms();
        });
    }
}