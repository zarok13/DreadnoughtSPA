<?php


namespace App\Http\Controllers\API;


use App\Models\Page;
use Illuminate\Http\Request;
use Webwizo\Shortcodes\Facades\Shortcode;

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
            dd($content);
        } else {
            $content = $pages->getPage($slug);
        }
        // $content->text = Shortcode::compile($content->text);
        
        return response()->json($content);
    }
}