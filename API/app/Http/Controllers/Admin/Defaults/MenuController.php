<?php

namespace App\Http\Controllers\Admin\Defaults;


use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Models\Menu;
use App\Models\Page;
use App\Traits\DatabaseAction;
use App\Traits\Deletable;
use App\Traits\Sort;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    use DatabaseAction;
    use Sort;
    use Deletable;

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
     * @param Menu $menu
     * @return View
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
        $this->addForCurrentLanguage($this->moduleName, $filteredRequest);
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param Menu $menu
     * @param Page $page
     * @param int $id
     * @return View
     */
    public function edit(Menu $menu, Page $page, int $id): View
    {
        $this->data['item'] = $menu->whereLangId($id)->first()->toArray();
        $this->data['parentList'] = $menu->lang()->pluck('title', 'id')->toArray();
        $this->data['pageList'] = $page->lang()->pluck('title', 'lang_id')->toArray();
        return view($this->viewTemplate . '.edit', $this->data);
    }

    /**
     * @param Request $request
     * @param Menu $menu
     * @param int $id
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Menu $menu, int $id): RedirectResponse
    {
        $this->validate($request, $this->validationArray);
        $menu->checkMainPage($request->main);
        $filteredRequest = $request->except('_token');
        $this->updateMainLang($this->moduleName, $id, $filteredRequest);
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }
}
