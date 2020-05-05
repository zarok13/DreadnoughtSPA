<?php

namespace App\Http\Controllers\Admin\Defaults;


use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Menu;
use App\Page;
use App\Traits\DatabaseAction;
use App\Traits\Sort;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;;
use Illuminate\Validation\ValidationException;

class MenuController extends Controller
{
    use DatabaseAction;
    use Sort;

    protected $moduleName = 'menu';
    protected $validationArray = [
        'title' => 'required'
    ];

    /**
     * MenuController constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['items'] = Menu::lang()->orderBy('sort', 'asc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Menu $menu)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['title'] .= getActionIcon(__FUNCTION__);
        $this->data['parentList'] = $menu->lang()->pluck('title', 'id')->toArray();
        return view($this->viewTemplate . '.add', $this->data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function create(Request $request)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $this->addMainLang($this->moduleName, $filteredRequest);
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param Menu $menu
     * @param Page $page
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Menu $menu, Page $page, $id)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['title'] .= getActionIcon(__FUNCTION__);
        $this->data['item'] = $menu->whereLangId($id)->first()->toArray();
        $this->data['parentList'] = $menu->lang()->pluck('title', 'id')->toArray();
        $this->data['pageList'] = $page->lang()->pluck('title', 'lang_id')->toArray();
        return view($this->viewTemplate . '.edit', $this->data);
    }

    /**
     * @param Request $request
     * @param Menu $menu
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Menu $menu, $id)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->validate($request, $this->validationArray);
        $menu->checkMainPage($request->main);
        $filteredRequest = $request->except('_token');
        $this->updateMainLang($this->moduleName, $id, $filteredRequest);
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $menu = (MODELS_PATH . ucfirst($this->moduleName))::where('lang_id', $id)->first();
        $menu->delete();
        return redirect()->route($this->moduleName);
    }
}
