<?php

namespace App\Http\Controllers\Admin\Defaults;


use App\FileStore;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Traits\DatabaseAction;
use App\Traits\Sort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class FileStoreController extends Controller
{
    use DatabaseAction;
    use Sort;

    protected $moduleName = 'file_store';
    protected $modelName = 'FileStore';
    protected $imageTypeList = [1 => 'jpg', 2 => 'jpeg', 3 => 'gif', 4 => 'png'];

    /**
     * FileStoreController constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.'.$this->moduleName);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->data['items'] = FileStore::lang()->orderBy('created_at', 'desc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @param Request $request
     * @param FileStore $fileStore
     * @throws \Throwable
     */
    public function upload(Request $request, FileStore $fileStore)
    {
        try {
            if (!$request->ajax() && !$request->isMethod('post')) {
                throw new \Exception('Error: Http request must be post type.');
            }
            $convertedRequest = $request->all();
            foreach ($convertedRequest['files'] as $file) {
                $this->imageUpload($file);
            }
            $this->data['new_items'] = $fileStore->lang()->orderBy('created_at', 'desc')->get();
            echo json_encode([
                'status' => 'ok',
                'response' => view($this->viewTemplate . '.uploaded_files_template', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param FileStore $fileStore
     * @param $id
     * @throws \Throwable
     */
    public function delete(FileStore $fileStore, $id)
    {
        try {
            $item = (MODELS_PATH . ucfirst($this->modelName))::findOrFail($id);
            $file_path = public_path('storage/' . $item->src);
            unlink($file_path);
            $item->delete();
            $this->data['new_items'] = $fileStore->lang()->orderBy('created_at', 'desc')->get();
            echo json_encode([
                'status' => 'ok',
                'response' => view($this->viewTemplate . '.uploaded_files_template', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function smallIndex()
    {
        $this->data['items'] = FileStore::lang()->orderBy('created_at', 'desc')->get();
        $this->data['smallWindow'] = true;
        return view($this->viewTemplate . '.small_show', $this->data);
    }

    /**
     * @param Request $request
     * @param FileStore $fileStore
     * @throws \Throwable
     */
    public function smallUpload(Request $request, FileStore $fileStore)
    {
        try {
            if (!$request->ajax() && !$request->isMethod('post')) {
                throw new \Exception('Error: Http request must be post type.');
            }
            $convertedRequest = $request->all();
            foreach ($convertedRequest['files'] as $file) {
                $this->imageUpload($file);
            }
            $this->data['new_items'] = $fileStore->lang()->orderBy('created_at', 'desc')->get();
            echo json_encode([
                'status' => 'ok',
                'response' => view($this->viewTemplate . '.small_uploaded_files_template', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param FileStore $fileStore
     * @param $id
     * @throws \Throwable
     */
    public function smallDelete(FileStore $fileStore, $id)
    {
        try {
            $item = (MODELS_PATH . ucfirst($this->modelName))::findOrFail($id);
            $file_path = public_path('storage/' . $item->src);
            unlink($file_path);
            $item->delete();
            $this->data['new_items'] = $fileStore->lang()->orderBy('created_at', 'desc')->get();
            echo json_encode([
                'status' => 'ok',
                'response' => view($this->viewTemplate . '.small_uploaded_files_template', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @throws \Throwable
     */
    public function choose(Request $request)
    {
        $this->data['path'] = $request->path;
        $this->data['inputName'] = $request->inputName;
        $this->data['params']['class'] = 'form-control attached_file_name text_upload';
        $this->data['params'][] = 'readonly';
        try {
            echo json_encode([
                'status' => 'ok',
                'response' => view($this->viewTemplate . '.attached_file_template', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }


    /**
     * @param $filePath
     */
    protected function imageUpload($filePath)
    {
        $fileExtension = $filePath->getClientOriginalExtension();
        $fileType = $this->getFileTypes($fileExtension);
        $typeDirectory = 'images/';
        if ($fileType != 'image') {
            $typeDirectory = 'documents/';
        }
        $fileName = $typeDirectory . $filePath->getClientOriginalName();
        $fileName = $this->checkSimilarFileName($fileExtension, $fileName);
        $filePath->move(public_path('storage/' . rtrim($typeDirectory, '/')), $fileName);
        $this->dbWrite($fileName, $fileType);
    }

    /**
     * @param $fileExtension
     * @param $fileName
     * @return string
     */
    protected function checkSimilarFileName($fileExtension, $fileName)
    {
        $fileNameOnly = str_replace('.' . $fileExtension, '', $fileName);
        $renameFile = 0;
        $similarFileName = true;
        while ($similarFileName) {
            $similarFileName = DB::table($this->moduleName)
                ->select('src')
                ->where('src', $fileName)
                ->first();
            if (!$similarFileName) {
                break;
            }
            $renameFile++;
            $fileName = $fileNameOnly . '(' . $renameFile . ')' . '.' . $fileExtension;
        }
        return $fileName;
    }

    /**
     * @param $fileName
     * @param $fileType
     */
    protected function dbWrite($fileName, $fileType)
    {
        DB::transaction(function () use ($fileName, $fileType) {
            foreach ($this->langList as $key => $value) {
                if ($this->lang == $key) {
                    $fileStore = new FileStore();
                    $fileStore->lang = $key;
                    $fileStore->src = $fileName;
                    $fileStore->type = $fileType;
                    $fileStore->user_id = Auth::id();
                    $fileStore->sort = 1;
                    $fileStore->save();
                }
            }
        });
    }

    /**
     * @param $fileExtension
     * @return string
     */
    public function getFileTypes($fileExtension)
    {
        $imageType = array_search($fileExtension, $this->imageTypeList);
        if ($imageType) {
            return 'image';
        }
        return $fileExtension;
    }
}