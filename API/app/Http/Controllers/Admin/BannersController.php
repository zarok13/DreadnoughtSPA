<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Models\Article;
use App\Models\Slider;
use App\Traits\DatabaseAction;
use App\Traits\Sort;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BannersController extends Controller
{
    use DatabaseAction;
    use Sort;

    protected $modelName = 'Banner';
    protected $validationArray = [
        'title' => 'required'
    ];

    /**
     * SlidersController constructor.
     */
    public function __construct(Article $article)
    {
        parent::__construct();
        $this->moduleName = 'banners';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
        $this->data['productsList'] = $article->getProductsList();
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->data['items'] = Banner::lang()->orderBy('sort', 'asc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @return View
     */
    public function add(): View
    {
        return view($this->viewTemplate . '.add', $this->data);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $this->addMainLang($this->modelName, $filteredRequest);
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param Slider $slider
     * @param int $id
     * @return View
     */
    public function edit(Banner $banner, int $id): View
    {
        $this->data['item'] = $banner->whereLangId($id)->first();
        return view($this->viewTemplate . '.edit', $this->data);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param integer $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id):RedirectResponse
    {
        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $this->updateMainLang($this->modelName, $id, $filteredRequest);
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id):RedirectResponse
    {
        $menu = (MODELS_PATH . ucfirst($this->modelName))::where('lang_id', $id)->first();
        $menu->delete();
        return redirect()->route($this->moduleName);
    }
}
