<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Webwizo\Shortcodes\Facades\Shortcode;

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

//    /**
//     * @return mixed
//     */
//    public function getCompiledTextAttribute()
//    {
//        return Shortcode::compile(hel_field('intro'));
//    }
}
