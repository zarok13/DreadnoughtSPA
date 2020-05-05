<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class ModulePerms extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ModulePerms';
    }
}