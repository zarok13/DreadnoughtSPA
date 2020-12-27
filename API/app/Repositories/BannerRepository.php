<?php

namespace App\Repositories;

use App\Models\Banner;

class BannerRepository
{
    public function getUrl(Banner $banner)
    {
        if ($banner->product_id && $banner->product) {
            return 'products/' . $banner->product->slug;
        } elseif ($banner->url) {
            return $banner->url;
        }

        return '#';
    }
}
