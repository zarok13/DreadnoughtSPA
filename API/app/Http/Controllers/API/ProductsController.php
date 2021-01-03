<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\ProductsResource;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsController
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $products = Article::where('page_id', hel_field('products_page_id'))->orderBy('created_at', 'desc')->get();
        return response()->json(['products' => ProductsResource::collection($products)]);
    }
}
