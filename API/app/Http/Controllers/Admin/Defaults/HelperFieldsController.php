<?php

namespace App\Http\Controllers\Admin\Defaults;

use App\Models\HelperField;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Traits\DatabaseAction;
use App\Traits\Deletable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HelperFieldsController extends Controller
{
    use DatabaseAction;
    use Deletable;

    protected $modelName = 'helperField';
    protected $validationArray = [
        'keyword' => 'required',
        'type' => 'required',
    ];

    /**
     * HelperFieldsController __construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'helper_fields';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
        $this->data['typeList'] = setting('helperFieldsType');
        $this->data['dataTable'] = true;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->data['items'] = HelperField::lang()->orderBy('created_at', 'desc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function add(): View
    {
        return view($this->viewTemplate . '.add', $this->data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request): RedirectResponse
    {
        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $this->addForCurrentLanguage($this->modelName, $filteredRequest);
        $this->data['module'] = $this->moduleName;
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param HelperField $helperField
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function edit(HelperField $helperField, int $id)
    {
        $this->data['item'] = $helperField->find($id)->toArray();
        return view($this->viewTemplate . '.edit', $this->data);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->validate($request, $this->validationArray);
        $this->updateMainLang($this->modelName, $id, $request->except('_token'));
        $this->data['module'] = $this->moduleName;
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @param Request $request
     * @param HelperField $helperField
     * @return JsonResponse
     * @throws \Throwable
     */
    public function typeTemplate(Request $request, HelperField $helperField): JsonResponse
    {
        try {
            $this->data['typeTemplate'] = $request->type;
            $this->data['ajaxRequest'] = true;
            if (isset($request->id)) {
                $this->data['array'] = $helperField->find($request->id)->toArray();
            } else {
                $this->data['array'] = null;
            };
            return response()->json([
                'status' => 'ok',
                'response' => view($this->viewTemplate . '._type_template', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
