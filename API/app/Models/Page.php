<?php

namespace App\Models;


class Page extends ChildModel
{
    protected $fillable = ['*'];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'page_id', 'lang_id');
    }

    /**
     * Undocumented function
     *
     * @param string $slug
     * @return void
     */
    public function article($slug)
    {
        return $this->hasOne(Article::class, 'page_id', 'lang_id')->where('slug', $slug)->first();
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getTemplateTypeAttribute()
    {
        $pageType = $this->attributes['page_type_id'];
        $template = $this->attributes['page_template_id'];
        $templateList = setting('pageTemplates');

        if (!isset($templateList[$pageType])) {
            throw new \Exception(__METHOD__ . ' - Wrong pageType index: ' . $pageType);
        }
        if (!isset($templateList[$pageType][$template])) {
            throw new \Exception(__METHOD__ . ' - Wrong template index: ' . $template);
        }
        return $templateList[$pageType][$template];
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getPageTypeAttribute()
    {
        $pageType = $this->attributes['page_type_id'];
        $pageTypeList = setting('pageTypes');
        if (!isset($pageTypeList[$pageType])) {
            throw new \Exception(__METHOD__ . ' - Wrong pageType index: ' . $pageType);
        }
        return $pageTypeList[$pageType];
    }

    /**
     * @param $slug
     * @return mixed
     */
    public static function getPage($slug)
    {
        return self::lang()
            ->where('slug', $slug)->first();
    }
}
