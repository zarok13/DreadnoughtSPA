<?php

namespace App\Models;

class FileStoreRef extends ChildModel
{
    protected $guarded = [];
    public $timestamps = false;

    /**
     * @return mixed
     */
    public function image()
    {
        return $this->belongsTo(FileStore::class, 'file_id', 'id');
    }

    /**
     * @param string $lang
     * @param int $file
     * @param int $referenceID
     * @param int $referenceType
     */
    public function insertReferences(string $lang, int $file, int $referenceID, int $referenceType)
    {
        $this::create([
            'lang' => $lang,
            'file_id' => $file,
            'reference_id' => $referenceID,
            'reference_type' => $referenceType
        ]);
    }
}
