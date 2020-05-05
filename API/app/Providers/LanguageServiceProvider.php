<?php


namespace App\Providers;


use App\Language;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @param Language $language
     * @return void
     */
    public function boot(Language $language)
    {
        try {
            DB::connection()->getPdo();
//            $_language = Cache::rememberForever('language.all.'.urlLang(), function () use($language) {
//                return $language->lang()->pluck('value', 'keyword')->all();
            $_language = $language->lang()->pluck('value', 'keyword')->all();
//            });
            config()->set('languages', $_language);
        }  catch (\Exception $e) {

        }
    }
}