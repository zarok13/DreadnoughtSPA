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
        return [
            'id' => $this->id,
            'lang_id' => $this->lang_id,
            'parent_id' => $this->parent_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'page_type' => $this->page_type_id,
            'page_template' => $this->page_template_id,
            'children' => self::collection($this->children),
        ];
    }
}
