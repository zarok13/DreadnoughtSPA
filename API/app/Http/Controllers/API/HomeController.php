<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\BannerResource;
use App\Models\Article;
use App\Http\Resources\BlogResource;
use App\Http\Resources\SliderResource;
use App\Models\Banner;
use App\Models\Slider;
use App\Repositories\BlogsRepository;
use Webwizo\Shortcodes\Facades\Shortcode;

class HomeController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(BlogsRepository $blogsRepository)
    {
        return response()->json([
            'sliders' => SliderResource::collection(Slider::lang()->orderBy('id', 'desc')->get()),
            'banners' => BannerResource::collection((new Banner)->getBanenrs()),
            'intro' => [
                'i2' => Shortcode::compile(hel_field('intro2')),
                'i3' => Shortcode::compile(hel_field('intro3')),
            ],
            'blogs' => $blogsRepository->getSeparatedBlog()
        ]);
    }
}
