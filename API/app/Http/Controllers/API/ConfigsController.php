<?php

namespace App\Http\Controllers\API;

use App\HelperField;
use App\Http\Controllers\API\Controller;
use App\Http\Resources\MenuResource;
use App\Language;
use App\Menu;
use Illuminate\Http\Request;

class ConfigsController extends Controller
{
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
