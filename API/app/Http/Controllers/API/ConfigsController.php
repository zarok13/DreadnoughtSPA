<?php

namespace App\Http\Controllers\API;

use App\HelperField;
use App\Http\Resources\MenuResource;
use App\Language;
use App\Menu;

class ConfigsController
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'menu' => MenuResource::collection((new Menu())->getMenuWithChild()),
            'translate' => Language::pluck('value', 'keyword'),
            'params' => HelperField::pluck('value', 'keyword'),
        ]);
    }
}
