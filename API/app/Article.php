<?php

namespace App;


class Article extends ChildModel
{
    protected $fillable = ['*'];

    public function page()
    {
        return $this->belongsTo('App\Page', 'page_id','lang_id');
    }

    /**
     * @param $pageID
     * @return mixed
     */
    public function Items($pageID)
    {
        $query = $this->where('page_id', $pageID);
        return $query->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param $langID
     * @param $secondSlug
     * @return mixed
     */
    public function otherItems($langID, $secondSlug)
    {
        return $this->lang()
            ->where('page_id', $langID)
            ->where('slug', '!=', $secondSlug)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
    }
}
