<?php

namespace App\Http\Controllers\API;

use App\HelperField;
use App\Http\Controllers\API\Controller;
use App\Http\Resources\MenuResource;
use App\Language;
use Illuminate\Http\Request;

class ConfigsController extends Controller
{
    public function index()
    {
        return response()->json([
            'menu' => MenuResource::collection(),
            'translate' => Language::pluck('value', 'keyword'),
            'params' => HelperField::pluck('value', 'keyword'),
        ]);
    }
}
