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
        $menu = (new Menu())->getMenuWithChild();
        return response()->json([
            'menu' => MenuResource::collection($menu),
            'translate' => Language::pluck('value', 'keyword'),
            'params' => HelperField::pluck('value', 'keyword'),
        ]);
    }
}
