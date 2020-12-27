<?php

namespace App\Repositories;

use App\Http\Resources\BlogResource;
use App\Models\Article;

class BlogsRepository
{
    /**
     * @return array
     */
    public function getSeparatedBlog(): array
    {
        $result = [];
        $blogList = Article::where('page_id', hel_field('blog_page_id'))->orderBy('created_at', 'desc')->limit(6)->get();
        for ($i = 0; $i < count($blogList); $i++) {
            $blogList[$i]['text'] = trimText($blogList[$i]['text'], 100);
            $blogList[$i + 1]['text'] = trimText($blogList[$i + 1]['text'], 100);
            $result[$i] = [
                BlogResource::make($blogList[$i]),
                BlogResource::make($blogList[$i + 1])
            ];
            ++$i;
        }

        return $result;
    }
}
