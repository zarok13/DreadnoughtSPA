<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Review;
use App\Traits\DatabaseAction;
use App\Traits\Sort;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class ReviewsController extends Controller
{
    use DatabaseAction;
    use Sort;

    protected $moduleName = 'reviews';
    protected $modelName = 'Review';
    protected $validationArray = [
        'name' => 'required',
        'image' => 'required',
        'review' => 'required',
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

        $this->data['items'] = Review::lang()->orderBy('sort', 'asc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['title'] .= getActionIcon(__FUNCTION__);
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
        $this->addMainLang($this->modelName, $filteredRequest);
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param Review $review
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Review $review, $id)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['title'] .= getActionIcon(__FUNCTION__);
        $this->data['item'] = $review->whereLangId($id)->first()->toArray();
        return view($this->viewTemplate . '.edit', $this->data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $this->updateMainLang($this->modelName, $id, $filteredRequest);
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $menu = (MODELS_PATH . ucfirst($this->modelName))::where('lang_id', $id)->first();
        $menu->delete();
        return redirect()->route($this->moduleName);
    }
}