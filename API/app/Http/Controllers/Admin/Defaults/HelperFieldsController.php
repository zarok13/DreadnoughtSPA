<?php

namespace App\Http\Controllers\Admin\Defaults;

use App\HelperField;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Traits\DatabaseAction;
use Illuminate\Http\Request;

class HelperFieldsController extends Controller
{
    use DatabaseAction;

    protected $modelName = 'helperField';
    protected $validationArray = [
        'keyword' => 'required',
        'type' => 'required',
    ];

    /**
     * LanguageController constructor.
     * @throws \Exception
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
        $this->middleware('permission', ['except' => ['typeTemplate']]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->data['items'] = HelperField::lang()->orderBy('created_at', 'desc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $this->data['title'] .= getActionIcon(__FUNCTION__);
        return view($this->viewTemplate . '.add', $this->data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $filteredRequest['created_at'] = now();
        $this->addMainLang($this->modelName, $filteredRequest);
        $this->data['module'] = $this->moduleName;
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param HelperField $helperField
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(HelperField $helperField, $id)
    {
        $this->data['title'] .= getActionIcon(__FUNCTION__);
        $this->data['item'] = $helperField->find($id)->toArray();
        return view($this->viewTemplate . '.edit', $this->data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validationArray);
        $this->updateMainLang($this->modelName, $id, $request->except('_token'));
        $this->data['module'] = $this->moduleName;
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $menu = (MODELS_PATH . ucfirst($this->modelName))::findOrFail($id);
        $menu->delete();
        return back();
    }

    /**
     * @param Request $request
     * @param HelperField $helperField
     * @throws \Throwable
     */
    public function typeTemplate(Request $request, HelperField $helperField)
    {
        try {
            $this->data['typeTemplate'] = $request->type;
            $this->data['ajaxRequest'] = true;
            if (isset($request->id)) {
                $this->data['array'] = $helperField->find($request->id)->toArray();
            } else {
                $this->data['array'] = null;
            };
            echo json_encode([
                'status' => 'ok',
                'response' => view($this->viewTemplate . '._type_template', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}