<?php


namespace App\Http\Controllers\API;

use App\Models\FileStoreRef;
use App\Http\Resources\GalleryResource;

class GalleryController
{

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index()
    {
        $referenceType = setting('fileStoreReferenceType')['photo_gallery'];
        $photos = FileStoreRef::leftJoin('file_store', 'file_store.id', '=', 'file_store_refs.file_id')
            ->where('reference_type', $referenceType)
            ->where('reference_id', 9)->get();
        return response()->json(['photos' => GalleryResource::collection($photos)]);
    }
}