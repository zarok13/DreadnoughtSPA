<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildModel extends Model
{
    protected $lang;

    /**
     * ChildModel constructor.
     * @param array $attributes
     */
    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
        $this->lang = urlLang();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeLang($query)
    {
        return $query->where('lang', $this->lang);
    }
}
