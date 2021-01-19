<?php


namespace App\Providers;


use App\Models\Language;
use App\Models\Translate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class TranslateServiceProvider extends ServiceProvider
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
    public function boot(Translate $translate)
    {
        try {
            DB::connection()->getPdo();
//            $_language = Cache::rememberForever('language.all.'.urlLang(), function () use($language) {
//                return $language->lang()->pluck('value', 'keyword')->all();
            $_language = $translate->lang()->pluck('value', 'keyword')->all();
//            });
            config()->set('translates', $_language);
        }  catch (\Exception $e) {

        }
    }
}