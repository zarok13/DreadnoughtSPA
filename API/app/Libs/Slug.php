<?php


namespace App\Libs;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Slug
{
    protected $tableName;

    /**
     * @param $tableName
     * @param $fieldName
     * @param string $separator
     * @return array|string|null
     */
    public function create($tableName, $fieldName, $separator = '-')
    {
        $slug = request()->slug;
        $this->tableName = $tableName;
        if ($slug) {
            return Str::slug($slug, $separator);
        }
        $slug = Str::slug(request()->{$fieldName}, $separator);
        $count = $this->countBySlug($slug);

        if ($count) {
            return $this->createNewSlug($fieldName, $slug);
        }

        return $slug;
    }

    /**
     * @param $fieldName
     * @param $slug
     * @param int $level
     * @return string
     */
    protected function createNewSlug($fieldName, $slug, $level = 1)
    {
        $newSlug = $slug . '-' . $level;
        $count = $this->countBySlug($newSlug);
        if ($count > 0) {
            return $this->createNewSlug($fieldName, $slug, $level++);
        }
        return $newSlug;
    }

    /**
     * @param $slug
     * @return int
     */
    public function countBySlug($slug)
    {
        return DB::table($this->tableName)
            ->where('slug', $slug)
            ->count();
    }
}
