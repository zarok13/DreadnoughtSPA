<?php


namespace App\Http\Controllers\API;


use App\Page;
use Illuminate\Http\Request;

class StaticController
{
    /**
     * @param Request $request
     * @param Page $pages
     * @return \Illuminate\Http\JsonResponse
     */
    public function staticContent(Request $request, Page $pages)
    {
        try {
            $pages = $pages->lang()->where('slug', $request->slug)->first();
            return response()->json($pages);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}