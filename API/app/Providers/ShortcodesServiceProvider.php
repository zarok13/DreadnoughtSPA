<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Webwizo\Shortcodes\Facades\Shortcode;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Shortcode::register('intro1', 'App\Shortcodes\HomeShortcode@intro1');
        Shortcode::register('intro2', 'App\Shortcodes\HomeShortcode@intro2');
        Shortcode::register('intro3', 'App\Shortcodes\HomeShortcode@intro3');
        Shortcode::register('content', 'App\Shortcodes\StaticShortcode@content');
    }
}
