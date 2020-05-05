<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Slug extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Slug';
    }
}