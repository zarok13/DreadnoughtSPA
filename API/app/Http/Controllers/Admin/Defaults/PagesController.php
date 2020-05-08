<?php

namespace App\Http\Controllers\Admin\Defaults;

use App\Facades\Slug;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Page;
use App\Traits\DatabaseAction;
use App\Traits\Sort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    use DatabaseAction;
    use Sort;

    protected $moduleName = 'pages';
    protected $modelName = 'Page';
    protected $validationArray = [
        'title' => 'required',
    ];

    /**
     * PagesController constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['typeList'] = setting('pageTypes');
        $this->data['title'] = trans('default.' . $this->moduleName);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['items'] = Page::lang()->orderBy('sort', 'asc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function add()
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['title'] .= getActionIcon(__FUNCTION__);
        $this->data['templateList'] = $this->getTemplates();
        return view($this->viewTemplate . '.add', $this->data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $filteredRequest['slug'] = Slug::create('pages', 'title');
        $filteredRequest['user_id'] = Auth::id();
        $filteredRequest['sort'] = $this->getMaxSort();
        $this->addMainLang('page', $filteredRequest);
        $this->data['module'] = $this->moduleName;
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param Page $page
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function edit(Page $page, $id)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['title'] .= getActionIcon(__FUNCTION__);
        $this->data['item'] = $page->find($id);
        $this->data['templateList'] = $this->getTemplates($this->data['item']->page_type_id);
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
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $filteredRequest['slug'] = Slug::create('pages', 'title');
        $this->updateMainLang('page', $id, $filteredRequest);
        $this->data['module'] = $this->moduleName;
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $menu = (MODELS_PATH . ucfirst($this->modelName))::find($id);
        $menu->delete();
        return back();
    }

    /**
     * @param $id
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPage($id, Page $page)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['title'] .= getActionIcon(__FUNCTION__);
        $this->data['item'] = $page->whereLangId($id)->first();
        return view($this->viewTemplate . '.edit_page', $this->data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePage(Request $request, $id)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->validate($request, $this->validationArray);
        $convertedRequest = $request->except('_token', 'file');
        $this->updateMainLang('page', $id, $convertedRequest);
        $this->data['module'] = $this->moduleName;
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @throws \Throwable
     */
    public function templateGroup()
    {
        $this->jsonHeaders();
        try {
            $pageType = Input::post('page_type');
            $this->data['templateGroup'] = $this->getTemplates($pageType);
            echo json_encode([
                'status' => 'ok',
                'response' => view($this->viewTemplate . '.template_group', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param int $groupID
     * @return mixed
     * @throws \Exception
     */
    public static function getTemplates($groupID = 0)
    {
        return setting('pageTemplates')[$groupID];
    }
}
