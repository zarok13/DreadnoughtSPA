<?php


namespace App\Http\Controllers\API;


use App\Models\Page;
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
        $content = '';
        $slug = $request->slug;
        if( strpos($slug, '/')) {
            $params = explode('/', $slug);
            $content = $pages->getPage($params[0]);
            $content = $content->articles($params[1])->first();
        } else {
            $content = $pages->getPage($slug);
        }
        
        return response()->json($content);
    }
}