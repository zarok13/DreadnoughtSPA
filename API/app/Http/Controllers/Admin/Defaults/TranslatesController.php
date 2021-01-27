<?php

namespace App\Http\Controllers\Admin\Defaults;

use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Models\Language;
use App\Models\Translate;
use App\Traits\DatabaseAction;
use App\Traits\Deletable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TranslatesController extends Controller
{
    use DatabaseAction;
    use Deletable;

    protected $modelName = 'translate';
    protected $validationArray = [];

    /**
     * LanguageController __construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'translates';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
        $this->data['dataTable'] = true;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->data['items'] = Translate::lang()->orderBy('created_at', 'desc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function add(): View
    {
        $this->data['title'] .= getActionIcon(__FUNCTION__);
        return view($this->viewTemplate . '.add', $this->data);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $filteredRequest['created_at'] = now();
        $this->addForCurrentLanguage($this->modelName, $filteredRequest);
        $this->data['module'] = $this->moduleName;
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param \App\Models\Language $language
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Translate $translate, int $id): View
    {
        $this->data['item'] = $translate->lang()->whereLangId($id)->first();
        page404($this->data['item']);
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
        $this->updateMainLang($this->modelName,  $id, $request->except('_token'));
        $this->data['module'] = $this->moduleName;
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }
}
