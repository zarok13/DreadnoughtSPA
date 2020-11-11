<?php

namespace App\Http\Controllers\Admin;

use App\FileStoreRef;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * MenuController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'gallery';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {

        $this->data['referenceType'] = setting('fileStoreReferenceType')['gallery'];
        $this->data['referenceID'] = 0;
        $this->data['flashData'] = $this->saveFlashData([
            'action' => __FUNCTION__,
            'reference_id' => $this->data['referenceID'],
            'reference_type' => $this->data['referenceType'],
        ]);

        $this->data['items'] = FileStoreRef::where('lang', $this->lang)
            ->where('reference_type', $this->data['referenceType'])
            ->where('reference_id', $this->data['referenceID'])->get();

        return view($this->viewTemplate . '.show', $this->data);
    }
}