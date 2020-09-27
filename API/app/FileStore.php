<?php

namespace App;


class FileStore extends ChildModel
{
    protected $fillable = ['*'];
    protected $table = 'file_store';

    /**
     * All data
     *
     * @return mixed
     */
    public function getFileStore()
    {
        return self::orderBy('created_at', 'desc')->get();
    }
}
