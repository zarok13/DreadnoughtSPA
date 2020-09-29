<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Menu extends ChildModel
{
    protected $guarded = [];
    protected $table = 'menu';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {

        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }

    /**
     * @param int $parentID
     * @return mixed
     */
    public function getMenuWithChild($parentID = null, $allNodes = 1)
    {
        $menu = self::select([
            'menu.*',
            'pages.slug',
            'pages.page_type_id',
            'pages.page_template_id',
            DB::raw($allNodes . " as 'nodes'")
        ])
            ->join('pages', 'pages.lang_id', '=', 'menu.page_id', 'left')
            ->where('menu.lang', $this->lang)
            ->where('menu.parent_id', $parentID)
            ->where('menu.hidden', false)
            ->where('menu.title', '!=', 'Home')
            ->orderBy('menu.sort', 'asc')
            ->get();

        foreach ($menu as $index => $item) {
            if (is_numeric($item['page_type_id'])) {
                $menu[$index]['page_type'] = setting('pageTypes')[$item['page_type_id']];
                $menu[$index]['page_template'] = setting('pageTemplates')[$item['page_type_id']][$item['page_template_id']];
            }
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
    public function page()
    {
        return $this->belongsTo('App\Page', 'page_id');
    }


    public function getParent($parentID)
    {
        return $this->select('lang_id', 'title')->where('id', $parentID)->first();
    }
}
