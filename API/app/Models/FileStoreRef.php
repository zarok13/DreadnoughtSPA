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
     * insertReferences function
     *
     * @param string $lang
     * @param integer $file
     * @param integer $referenceID
     * @param integer $referenceType
     * @return boolean
     */
    public function insertReferences(string $lang, int $file, int $referenceID, int $referenceType)
    {
        $reference = new self;
        $reference->lang = $lang;
        $reference->file_id = $file;
        $reference->reference_id = $referenceID;
        $reference->reference_type = $referenceType;
        $reference->save();
    }
}
