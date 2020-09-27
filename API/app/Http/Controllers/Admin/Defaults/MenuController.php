<?php

namespace App\Http\Controllers\Admin\Defaults;


use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Menu;
use App\Page;
use App\Traits\DatabaseAction;
use App\Traits\Sort;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    use DatabaseAction;
    use Sort;

    protected $validationArray = [
        'title' => 'required'
    ];

    /**
     * MenuController __construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'menu';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->data['items'] = Menu::lang()->orderBy('sort', 'asc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @param \App\Menu $menu
     *
     * @return \Illuminate\View\View
     */
    public function add(Menu $menu): View
    {
        $this->data['parentList'] = $menu->lang()->pluck('title', 'id')->toArray();
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
        $this->addMainLang($this->moduleName, $filteredRequest);
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param \App\Menu $menu
     * @param \App\Page $page
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Menu $menu, Page $page, int $id): View
    {
        $this->data['item'] = $menu->whereLangId($id)->first()->toArray();
        $this->data['parentList'] = $menu->lang()->pluck('title', 'id')->toArray();
        $this->data['pageList'] = $page->lang()->pluck('title', 'lang_id')->toArray();
        return view($this->viewTemplate . '.edit', $this->data);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Menu $menu
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Menu $menu, int $id): RedirectResponse
    {
        $this->validate($request, $this->validationArray);
        $menu->checkMainPage($request->main);
        $filteredRequest = $request->except('_token');
        $this->updateMainLang($this->moduleName, $id, $filteredRequest);
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $menu = (MODELS_PATH . ucfirst($this->moduleName))::where('lang_id', $id)->first();
        $menu->delete();
        return redirect()->route($this->moduleName);
    }
}
