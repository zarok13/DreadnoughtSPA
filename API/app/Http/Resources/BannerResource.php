<?php

namespace App\Http\Resources;

use App\Repositories\BannerRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'url' => (new BannerRepository)->getUrl($this->resource),
            'image' => $this->image,
            'title' => $this->title,
            'desc' => $this->desc,
        ];
    }
}
