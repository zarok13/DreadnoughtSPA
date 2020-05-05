<?php

namespace App;


class Marker extends ChildModel
{
    protected $fillable = ['*'];
    public $timestamps = false;

    /**
     * @param $pageID
     * @return mixed
     */
    public function getList($pageID)
    {
        return $this->select('*')
            ->where('page_id', $pageID)
            ->where('lang', $this->lang)
            ->orderBy('sort', 'asc')
            ->get();
    }
}
