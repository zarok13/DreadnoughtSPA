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
use Illuminate\View\View;

class ReviewsController extends Controller
{
    use DatabaseAction;
    use Sort;

    protected $modelName = 'Review';
    protected $validationArray = [
        'name' => 'required',
        'image' => 'required',
        'review' => 'required',
    ];

    /**
     * MenuController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'reviews';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->data['items'] = Review::lang()->orderBy('sort', 'asc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view($this->viewTemplate . '.add', $this->data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function create(Request $request)
    {
        $this->validate($request, $this->validationArray);

        $filteredRequest = $request->except('_token');
        $this->addMainLang($this->modelName, $filteredRequest);
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param \App\Review $review
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Review $review, int $id): View
    {
        $this->data['item'] = $review->whereLangId($id)->first()->toArray();
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
        $filteredRequest = $request->except('_token');
        $this->updateMainLang($this->modelName, $id, $filteredRequest);
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $menu = (MODELS_PATH . ucfirst($this->modelName))::where('lang_id', $id)->first();
        $menu->delete();
        return redirect()->route($this->moduleName);
    }
}
