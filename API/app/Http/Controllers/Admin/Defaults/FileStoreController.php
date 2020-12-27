<?php

namespace App\Http\Controllers\Admin\Defaults;

use App\Contracts\AuthCustomValidationContract;
use App\Models\FileStore;
use App\Models\FileStoreRef;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Traits\AuthCustomValidation;
use App\Traits\DatabaseAction;
use App\Traits\Sort;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FileStoreController extends Controller implements AuthCustomValidationContract
{
    use DatabaseAction;
    use Sort;
    use AuthCustomValidation;

    protected $modelName = 'FileStore';
    protected $imageTypeList = [
        1 => 'jpg',
        2 => 'jpeg',
        3 => 'gif',
        4 => 'png'
    ];

    /**
     * FileStoreController __construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'file_store';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->data['items'] = (new FileStore())->getFileStore();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function smallIndex(Request $request): View
    {
        $this->data['items'] = (new FileStore())->getFileStore();
        $this->data['fileReferences'] = isset($request->mode) && $request->mode == 'multiple' ? true : false;
        $this->data['referenceType'] = isset($request->session()->get('flashData')['reference_type']) ? $request->session()->get('flashData')['reference_type'] : '';
        $this->data['referenceID'] = isset($request->session()->get('flashData')['reference_id']) ? $request->session()->get('flashData')['reference_id'] : '';

        return view($this->viewTemplate . '.file_manager', $this->data);
    }

    /**
     * @param Request $request
     * @param FileStore $fileStore
     * @return JsonResponse
     * @throws \Throwable
     */
    public function upload(Request $request, FileStore $fileStore): JsonResponse
    {
        try {
            if (!$request->ajax() && !$request->isMethod('post')) {
                throw new \Exception('Error: Http request must be post type.');
            }
            $convertedRequest = $request->all();
            foreach ($convertedRequest['files'] as $file) {
                $this->imageUpload($file);
            }
            $this->data['new_items'] = $fileStore->getFileStore();
            $this->data['smallWindow'] = $request->smallWindow;
            $this->data['fileReferences'] = $request->multipleAttach;

            return response()->json([
                'status' => 'ok',
                'response' => view($this->viewTemplate . '.' . 'uploaded_files_template', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @param FileStore $fileStore
     * @param int $id
     * @return JsonResponse
     * @throws \Throwable
     */
    public function delete(Request $request, FileStore $fileStore, int $id): JsonResponse
    {
        try {
            $item = (MODELS_PATH . ucfirst($this->modelName))::findOrFail($id);
            $file_path = public_path('storage/' . $item->src);
            unlink($file_path);
            $item->delete();
            $this->data['new_items'] = $fileStore->getFileStore();
            $this->data['smallWindow'] = $request->smallWindow;
            $this->data['fileReferences'] = $request->multipleAttach;
            return response()->json([
                'status' => 'ok',
                'response' => view($this->viewTemplate . '.' . 'uploaded_files_template', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function choose(Request $request): JsonResponse
    {
        try {
            return response()->json([
                'status' => 'ok',
                'response' => '<input class="form-control attached_file_name text_upload" readonly name="' . $request->inputName . '" type="text" value="' . $request->path . '">',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @param FileStoreRef $fileStoreRef
     * @return JsonResponse
     * @throws \Throwable
     */
    public function applyReferences(Request $request, FileStoreRef $fileStoreRef)
    {
        try {
            $status = STATUS_ERROR;
            if (!$request->ajax() && !$request->isMethod('post')) {
                throw new \Exception('Error: Http request must be post type.');
            }
            $fileReferences = $request->fileReferences;
            $this->data['referenceID'] = $request->reference_id;
            $this->data['referenceType'] = $request->reference_type;
            if (empty($request->fileReferences)) {
                $status = STATUS_WARNING;
                throw new \Exception('Please select files.');
            }
            foreach ($fileReferences as $file) {
                $this->validateFileReferences($request,  $this->data['referenceID'], $file, $status);
                $fileStoreRef->insertReferences($this->lang, $file,  $this->data['referenceID'], $this->data['referenceType']);
            }

            $this->data['items'] = FileStoreRef::where('lang', $this->lang)
                ->where('reference_type', $this->data['referenceType'])
                ->where('reference_id',  $this->data['referenceID'])->get();
            $status = STATUS_OK;
            return response()->json([
                'status' => $status,
                'response' => view('admin.applets.forms.file_store._template', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => $status,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @param FileStoreRef $fileStoreRef
     * @return JsonResponse
     * @throws \Throwable
     */
    public function unsetReference(Request $request, FileStoreRef $fileStoreRef)
    {

        try {
            $status = STATUS_ERROR;
            if (!$request->ajax() && !$request->isMethod('post')) {
                throw new \Exception('Error: Http request must be post type.');
            }
            $fileID = $request->file_id;
            $this->data['referenceID'] = $request->reference_id;
            $this->data['referenceType'] = $request->reference_type;

            $fileStoreRef->where('file_id', $fileID)
                ->where('reference_id', $this->data['referenceID'])
                ->where('reference_type', $this->data['referenceType'])
                ->delete();


            $this->data['items'] = FileStoreRef::where('lang', $this->lang)
                ->where('reference_type', $this->data['referenceType'])
                ->where('reference_id', $this->data['referenceID'])->get();

            $status = STATUS_OK;
            return response()->json([
                'status' => $status,
                'response' => view('admin.applets.forms.file_store._template', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => $status,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @param int $referenceID
     * @param int $file
     * @param $status
     * @throws \Exception
     */
    protected function validateFileReferences(Request $request, int $referenceID, int $file, &$status)
    {
        $errors = $this->customErrorsValidation($request, [
            'reference_type' => [
                Rule::unique('file_store_refs')->where('lang', $this->lang)
                    ->where('reference_id', $referenceID)
                    ->where('file_id', $file)
            ]
        ], $this);
        if (count($errors) > 0) {
            $file = FileStore::find($file);
            $file = ltrim(strstr($file->src, '/'), '/');
            $status = STATUS_WARNING;
            throw new \Exception($file . ' file already attached.');
        }
    }

    /**
     * @param $filePath
     */
    protected function imageUpload($filePath): void
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
     * @param string $fileExtension
     * @param string $fileName
     * @return string
     */
    protected function checkSimilarFileName(string $fileExtension, string $fileName): string
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
     * @param string $fileName
     * @param string $fileType
     */
    protected function dbWrite(string $fileName, string $fileType): void
    {
        DB::transaction(function () use ($fileName, $fileType) {
            $fileStore = new FileStore();
            $fileStore->src = $fileName;
            $fileStore->type = $fileType;
            $fileStore->user_id = Auth::id();
            $fileStore->sort = 1;
            $fileStore->save();
        });
    }

    /**
     * @param string $fileExtension
     * @return string
     */
    public function getFileTypes(string $fileExtension): string
    {
        $imageType = array_search($fileExtension, $this->imageTypeList);
        if ($imageType) {
            return 'image';
        }
        return $fileExtension;
    }
}
