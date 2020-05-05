<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Menu extends ChildModel
{
    protected $fillable = ['*'];
    protected $table = 'menu';

    /**
     * @param null $parentID
     * @return array
     */
    public function webMenu($parentID = null)
    {
//        $items = Cache::rememberForever('menu.' . $parentID . '.' . $this->lang, function () use ($parentID) {
        $query = $this->select('menu.*', 'pages.slug')
//        (SELECT count(*) from menu as m1 inner join menu as m2 on m1.parent_id = m2.lang_id) as hasChild")
            ->join('pages', 'pages.lang_id', '=', 'menu.page_id', 'left')
            ->where('menu.lang', $this->lang)
            ->where('menu.parent_id', $parentID)
            ->where('menu.hidden', false)
            ->orderBy('menu.sort', 'asc')
            ->get()->toArray();
//        });
        return $this->formatWebMenu($query);
    }

    /**
     * @param array $items
     * @return array
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
                $menu[$i]['sub_menu'] = $this->webMenu($item['lang_id']);
            }
            $i++;
        }
        return $menu;
    }

    /**
     * @param $main
     * @param null $id
     */
    public function checkMainPage($main, $id = null)
    {
        if (!empty($main)) {
            $this->where('id', '!=', $id)->update(['main' => 0]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page() {
        return $this->belongsTo('App\Page', 'page_id');
    }
}
