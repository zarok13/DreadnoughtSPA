<?php

namespace App\Http\Controllers\API;

use App\Models\Article;
use App\Http\Resources\BlogResource;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use Webwizo\Shortcodes\Facades\Shortcode;

class HomeController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'sliders' => SliderResource::collection(Slider::lang()->orderBy('id', 'desc')->get()),
            'intro' => [
                'i1' => Shortcode::compile(hel_field('intro1')),
                'i2' => Shortcode::compile(hel_field('intro2')),
                'i3' => Shortcode::compile(hel_field('intro3')),
            ],
            'blogs' => $this->getSeparatedBlog()
        ]);
    }

    /**
     * @return array
     */
    public function getSeparatedBlog(): array
    {
        $result = [];
        $blogList = Article::where('page_id', hel_field('blog_page_id'))->orderBy('created_at', 'desc')->limit(6)->get();
        for ($i = 0; $i < count($blogList); $i++) {
            $blogList[$i]['text'] = trimText($blogList[$i]['text'], 100);
            $blogList[$i + 1]['text'] = trimText($blogList[$i + 1]['text'], 100);
            $result[$i] = [
                BlogResource::make($blogList[$i]),
                BlogResource::make($blogList[$i + 1])
            ];
            ++$i;
        }

        return $result;
    }
}
