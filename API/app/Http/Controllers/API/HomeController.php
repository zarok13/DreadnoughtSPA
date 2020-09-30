<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Http\Resources\SliderResource;
use App\Slider;
use Webwizo\Shortcodes\Facades\Shortcode;

class HomeController
{
    public function index()
    {
        $part1 = [];
        $part2 = [];
        $blogList = Article::where('page_id', hel_field('blog_page_id'))->orderBy('id', 'desc')->limit(6)->get()->toArray();
        foreach ($blogList as $index => $blog) {
            if ($index % 2 == 0) {
                $part1 = [$blog];
                // $part1[$index]['text'] = trimText($part1[$index]['text'], 100);
            } 
            // else {
            //     $part2[$index] = $blog;
            //     $part2[$index]['text'] = trimText($part2[$index]['text'], 100);
            // }
        }
        return response()->json([
            'sliders' => SliderResource::collection(Slider::lang()->orderBy('id', 'desc')->get()),
            'intro1' => Shortcode::compile(hel_field('intro1')),
            'intro2' => Shortcode::compile(hel_field('intro2')),
            'intro3' => Shortcode::compile(hel_field('intro3')),
            'blogPart1' => $part1,
            'blogPart2' => $part2,
        ]);
    }
}
