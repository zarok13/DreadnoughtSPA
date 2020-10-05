<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Http\Resources\BlogResource;
use App\Http\Resources\SliderResource;
use App\Slider;
use Webwizo\Shortcodes\Facades\Shortcode;

class HomeController
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $blog = $this->getSeparatedBlog();
        return response()->json([
            'sliders' => SliderResource::collection(Slider::lang()->orderBy('id', 'desc')->get()),
            'intro' => [
                'i1' => Shortcode::compile(hel_field('intro1')),
                'i2' => Shortcode::compile(hel_field('intro2')),
                'i3' => Shortcode::compile(hel_field('intro3')),
            ],
            'blog1' => BlogResource::collection($blog['part1']),
            'blog2' => BlogResource::collection($blog['part2']),
        ]);
    }

    /**
     * getSeparatedBlog function
     *
     * @return array
     */
    public function getSeparatedBlog(): array
    {
        $result = [];
        $blogList = Article::where('page_id', hel_field('blog_page_id'))->orderBy('created_at', 'desc')->limit(6)->get();
        foreach ($blogList as $index => $blog) {
            $blog['text'] = trimText($blog['text'], 100);
            if ($index % 2 == 0) {
                $result['part1'][] = $blog;
            } else {
                $result['part2'][] = $blog;
            }
        }
        return $result;
    }
}
