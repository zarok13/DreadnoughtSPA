<?php

namespace App\Http\Controllers\API;

use App\HelperField;
use App\Http\Resources\MenuResource;
use App\Language;
use App\Menu;

class ConfigsController
{
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return response()->json([
            'menu' => MenuResource::collection((new Menu())->getMenuWithChild()),
            'translate' => Language::pluck('value', 'keyword'),
            'params' => HelperField::pluck('value', 'keyword'),
            'storageURL' => 'http://localhost:8000/storage/',
        ]);
    }
}
