<?php

namespace App\Http\Controllers\API;


use App\Article;
use App\Menu;
use App\Slider;
use Webwizo\Shortcodes\Facades\Shortcode;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    protected $validationArray = [
    ];

    /**
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     */
    public function menu(Menu $menu)
    {
        try {
            $menu = $menu->select('menu.title', 'pages.slug', 'pages.page_type_id', 'pages.page_template_id', 'pages.lang_id')
                ->join('pages', 'pages.lang_id', '=', 'menu.page_id', 'left')
                ->where('menu.lang', $this->lang)
                ->where('pages.slug', '!=', null)
                ->orderBy('menu.sort', 'asc')
                ->get()->toArray();
            foreach ($menu as $index => $item){
                if( is_numeric($item['page_type_id']) ){
                    $menu[$index]['page_type'] = setting('pageTypes')[$item['page_type_id']];
                    $menu[$index]['page_template'] = setting('pageTemplates')[$item['page_type_id']][$item['page_template_id']];
                    unset($menu[$index]['page_type_id']);
                    unset($menu[$index]['page_template_id']);
                }
            }
            return response()->json([
                'status' => true,
                'data' => $menu,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

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
                'blogPart1' => $part1,
                'blogPart2' => $part2,
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
    public function getFooter()
    {
        try {
            $data = [];
            $title1 = lang('footer_our_philosophy');
            $quote = hel_field('footer_quote');
            $title2 = lang('about_our_company');
            $image = file_store_url(hel_field('footer_image'));
            $desc = hel_field('footer_desc');
            $contactUs = lang('contact_us');
            $address = lang('address');
            $email = lang('email');
            $phone = lang('phone');
            $twitterUrl = hel_field('twitter_url');
            $facebookUrl = hel_field('facebook_url');
            $addressValue = hel_field('address');
            $emailValue = hel_field('email');
            $phoneValue = hel_field('phone');
            $data['title1'] = $title1;
            $data['quote'] = $quote;
            $data['title2'] = $title2;
            $data['image'] = $image;
            $data['desc'] = $desc;
            $data['contactUs'] = $contactUs;
            $data['address'] = $address;
            $data['email'] = $email;
            $data['phone'] = $phone;
            $data['twitterUrl'] = $twitterUrl;
            $data['facebookUrl'] = $facebookUrl;
            $data['addressValue'] = $addressValue;
            $data['emailValue'] = $emailValue;
            $data['phoneValue'] = $phoneValue;
            return response()->json([
                'status' => true,
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function sendMail(Request $request)
    {
        try {
            dd($request->all());
            return response()->json([
                'status' => true,
                'data' => '',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}