<?php

namespace App\Models;


class Banner extends ChildModel
{
    protected $guarded = [];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getBanenrs()
    {
        return self::lang()->orderBy('sort')->get();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function product()
    {
        return $this->hasOne(Article::class, 'id', 'product_id');
    }
}
