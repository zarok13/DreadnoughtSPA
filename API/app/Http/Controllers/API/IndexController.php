<?php

namespace App\Http\Controllers\API;


use App\Article;
use App\Slider;
use Webwizo\Shortcodes\Facades\Shortcode;

class IndexController extends Controller
{

    protected $validationArray = [
    ];

    /**
     * @param Slider $slider
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSlider(Slider $slider)
    {
        try {
            $slider = $slider->lang()->get();
            return response()->json([
                'status' => true,
                'data' => $slider,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIntro1()
    {
        try {
            $intro = Shortcode::compile(hel_field('intro1'));
            return response()->json([
                'status' => true,
                'data' => $intro,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIntro2()
    {
        try {
            $intro = Shortcode::compile(hel_field('intro2'));
            return response()->json([
                'status' => true,
                'data' => $intro,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIntro3()
    {
        try {
            $intro = Shortcode::compile(hel_field('intro3'));
            return response()->json([
                'status' => true,
                'data' => $intro,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function blogList()
    {
        try {
            $part1 = [];
            $part2 = [];
            $blogList = Article::where('page_id', hel_field('blog_page_id'))->orderBy('created_at', 'desc')->limit(6)->get()->toArray();
            foreach ($blogList as $index => $blog) {
                if($index % 2 == 0){
                    $part1[$index] = $blog;
                    $part1[$index]['text'] = trimText($part1[$index]['text'],100);
                } else {
                    $part2[$index] = $blog;
                    $part2[$index]['text'] = trimText($part2[$index]['text'],100);
                }
            }
            return response()->json([
                'status' => true,
                'data_1' => $part1,
                'data_2' => $part2,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}