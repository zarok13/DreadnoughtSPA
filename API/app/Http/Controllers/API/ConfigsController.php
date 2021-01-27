<?php

namespace App\Http\Controllers\API;

use App\Models\HelperField;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use App\Models\Translate;

class ConfigsController
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        return response()->json([
            'menu' => MenuResource::collection((new Menu())->getMenuWithChild()),
            'translate' => Translate::pluck('value', 'keyword'),
            'params' => HelperField::pluck('value', 'keyword'),
        ]);
    }
}
