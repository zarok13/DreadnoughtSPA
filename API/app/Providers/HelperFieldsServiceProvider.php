<?php


namespace App\Providers;


use App\Models\HelperField;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class HelperFieldsServiceProvider extends ServiceProvider
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
     * @param HelperField $helperField
     * @return void
     */
    public function boot(HelperField $helperField)
    {
        try {
            DB::connection()->getPdo();
//            $_helperField = Cache::rememberForever('_helperField.all.'.urlLang(), function () use($helperField) {
//                return $helperField->lang()->pluck('value', 'keyword')->all();
            $_helperField = $helperField->lang()->pluck('value', 'keyword')->all();
//            });
            config()->set('helper_fields', $_helperField);
        }  catch (\Exception $e) {

        }
    }
}