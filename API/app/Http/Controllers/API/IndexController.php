<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Mail\Contact;
use App\Menu;
use App\Slider;
use App\MapCoordinate;
use App\Marker;
use App\Page;
use Webwizo\Shortcodes\Facades\Shortcode;
use Illuminate\Http\Request;
use App\Mail\Message;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{

    /**
     * @param null $parentID
     * @return array
     * @throws \Exception
     */
    public function menu($parentID = null)
    {
        // try {
        $query = Menu::select([
            'menu.id',
            'menu.lang_id',
            'menu.title',
            'menu.parent_id',
            'pages.slug',
            'pages.page_type_id',
            'pages.page_template_id',
        ])
            //        (SELECT count(*) from menu as m1 inner join menu as m2 on m1.parent_id = m2.lang_id) as hasChild")
            ->join('pages', 'pages.lang_id', '=', 'menu.page_id', 'left')
            ->where('menu.lang', $this->lang)
            ->where('menu.parent_id', $parentID)
            ->where('menu.hidden', false)
            ->where('menu.title', '!=', 'Home')
            ->orderBy('menu.sort', 'asc')
            ->get()->toArray();
        //        });
        return $this->formatWebMenu($query);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => $e->getMessage(),
        //     ]);
        // }

    }

    /**
     * @param $items
     * @return array
     * @throws \Exception
     */
    private function formatWebMenu($items)
    {
        $menu = [];
        $i = 0;
        foreach ($items as $item) {

            $menu[$i] = $item;
            $count = Menu::where('parent_id', $item['lang_id'])->count();
            $item['has_child'] = $count;
            if ($item['has_child'] > 0) {
                $menu[$i]['sub_menu'] = $this->menu($item['lang_id']);
                //                dd($this->testMenu($item['lang_id']));
            }
            $i++;
        }

        foreach ($menu as $index => $item) {
            if (is_numeric($item['page_type_id'])) {
                $menu[$index]['page_type'] = setting('pageTypes')[$item['page_type_id']];
                $menu[$index]['page_template'] = setting('pageTemplates')[$item['page_type_id']][$item['page_template_id']];
                unset($menu[$index]['page_type_id']);
                unset($menu[$index]['page_template_id']);
            }
        }
        //        return response()->json([
        //                'status' => true,
        //                'data' => $menu,
        //            ]);
        // dump('fsdf');
        return $menu;
    }

    /**
     * @param Page $pages
     * @return \Illuminate\Http\JsonResponse
     */
    public function staticContent(Request $request, Page $pages)
    {
        try {
            $pages = $pages->lang()->where('slug', $request->slug)->first();
            return response()->json([
                'status' => true,
                'data' => $pages,
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
                if ($index % 2 == 0) {
                    $part1[$index] = $blog;
                    $part1[$index]['text'] = trimText($part1[$index]['text'], 100);
                } else {
                    $part2[$index] = $blog;
                    $part2[$index]['text'] = trimText($part2[$index]['text'], 100);
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
            $data['title1'] = lang('footer_our_philosophy');
            $data['quote'] = hel_field('footer_quote');
            $data['title2'] = lang('about_our_company');
            $data['image'] = file_store_url(hel_field('footer_image'));
            $data['desc'] = hel_field('footer_desc');
            $data['contactUs'] = lang('contact_us');
            $data['address'] = lang('address');
            $data['email'] = lang('email');
            $data['phone'] = lang('phone');
            $data['twitterUrl'] = hel_field('twitter_url');
            $data['facebookUrl'] = hel_field('facebook_url');
            $data['addressValue'] = hel_field('address');
            $data['emailValue'] = hel_field('email');
            $data['phoneValue'] = hel_field('phone');

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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function mapbox()
    {
        try {
            $contactID = hel_field('contact_id');
            $mapCoordinates = MapCoordinate::select('lat', 'lng', 'zoom')->where('page_id', $contactID)->first();
            $markers = Marker::select('lat', 'lng')->lang()->where('page_id', $contactID)->get();
            $mapboxData['mapCoordinates'] = $mapCoordinates;
            $mapboxData['markers'] = $markers;
            return response()->json([
                'status' => true,
                'data' => $mapboxData,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        try {
            if ($this->sendMessageMail($request->all())) {
                return response()->json([
                    'status' => true,
                    'message' => 'Message successfully sent',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Message not sent',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendContact(Request $request)
    {
        try {
            if ($this->sendContactMail($request->all())) {
                return response()->json([
                    'status' => true,
                    'message' => 'Contact message successfully sent',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Contact message not sent',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param $request
     * @return bool
     */
    protected function sendMessageMail($request)
    {
        Mail::to(hel_field('email'))
            ->send(new Message($request));
        if (count(Mail::failures()) > 0) {
            return false;
        }
        return true;
    }

    /**
     * @param $request
     * @return bool
     */
    protected function sendContactMail($request)
    {
        Mail::to(hel_field('email'))
            ->send(new Contact($request));
        if (count(Mail::failures()) > 0) {
            return false;
        }
        return true;
    }
}
