<?php


namespace App\Models;


class Article extends ChildModel
{
    protected $guarded = [];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id','lang_id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getProductsList()
    {
        return self::lang()->where('page_id', hel_field('products_page_id'))->pluck('title', 'id')->toArray();
    }
}
