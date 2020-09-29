<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class   MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $menu = $this->formatMenu($this);
        // dd($menu);
        return [
            'id' => $this->id,
            'lang_id' => $this->lang_id,
            'parent_id' => $this->parent_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'page_type' => $this->page_type,
            'page_template' => $this->page_template,
            'children' => self::collection($this->children),
        ];
    }

    public function formatMenu($model)
    {
        
        $menu = $model->select([
            'menu.*',
            'pages.slug',
            'pages.page_type_id',
            'pages.page_template_id'
        ])->join('pages', 'pages.lang_id', '=', 'menu.page_id', 'left')
            ->where('menu.lang', $this->lang)
            // ->where('menu.parent_id', $parentID)
            ->where('menu.hidden', false)
            // ->where('menu.title', '!=', 'Home')
            ->orderBy('menu.sort', 'asc')
            ->get();
        // dd($menu);
        foreach ($menu as $index => $item) {
            if (is_numeric($item['page_type_id'])) {
                $menu[$index]['page_type'] = setting('pageTypes')[$item['page_type_id']];
                $menu[$index]['page_template'] = setting('pageTemplates')[$item['page_type_id']][$item['page_template_id']];
            }
        }
        return $menu;
    }
}
