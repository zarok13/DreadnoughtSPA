<?php

namespace App;

class Menu extends ChildModel
{
    protected $guarded = [];
    protected $table = 'menu';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id')->select([
            'menu.*', 
            'pages.slug',
            'pages.page_type_id',
            'pages.page_template_id',
        ])
            ->join('pages', 'pages.lang_id', '=', 'menu.page_id', 'left')
            ->where('menu.hidden', false)
            ->orderBy('menu.sort', 'asc');
    }

    /**
     * @param int $parentID
     * @return mixed
     */
    public function getMenuWithChild($parentID = null)
    {
        $menu = self::select([
            'menu.*',
            'pages.slug',
            'pages.page_type_id',
            'pages.page_template_id',
        ])
            ->join('pages', 'pages.lang_id', '=', 'menu.page_id', 'left')
            ->where('menu.lang', $this->lang)
            ->where('menu.parent_id', $parentID)
            ->where('menu.hidden', false)
            ->where('menu.title', '!=', 'Home')
            ->orderBy('menu.sort', 'asc')
            ->get();

        return $menu;
    }

      /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo('App\Page', 'page_id');
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
}
