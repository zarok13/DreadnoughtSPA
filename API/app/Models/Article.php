<?php


namespace App\Models;


class Article extends ChildModel
{
    protected $fillable = ['*'];

    public function page()
    {
        return $this->belongsTo('App\Page', 'page_id','lang_id');
    }

    /**
     * @param int $pageID
     * @return mixed
     */
    public function Items(int $pageID)
    {
        return self::where('page_id', $pageID)->orderBy('created_at', 'desc')->get();
    }

    /**
     * @param int $langID
     * @param string $secondSlug
     *
     * @return mixed
     */
    public function otherItems(int $langID, string $secondSlug)
    {
        return self::lang()
            ->where('page_id', $langID)
            ->where('slug', '!=', $secondSlug)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
    }
}
