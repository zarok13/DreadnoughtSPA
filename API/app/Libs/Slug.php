<?php


namespace App\Libs;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Slug
{
    protected $tableName;

    /**
     * Slug constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $tableName
     * @param $fieldName
     * @param string $separator
     * @return array|string|null
     */
    public function create($tableName, $fieldName, $separator = '-')
    {
        $slug = request()->post('slug');
        $this->tableName = $tableName;
        if (!empty($slug)) {
            return $slug;
        }
        $slug = Str::slug(request()->post($fieldName), $separator);
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
        return DB::table($this->tableName)->where('slug', $slug)->where('page_id', request()->page_id)->count();
    }
}
