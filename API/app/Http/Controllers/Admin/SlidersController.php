<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Models\Slider;
use App\Traits\DatabaseAction;
use App\Traits\Deletable;
use App\Traits\Sort;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SlidersController extends Controller
{
    use DatabaseAction;
    use Sort;
    use Deletable;

    protected $modelName = 'Slider';
    protected $validationArray = [
        'title' => 'required'
    ];

    /**
     * SlidersController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'sliders';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->data['items'] = Slider::lang()->orderBy('sort', 'asc')->get();
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $this->addForAllLanguages($this->modelName, $filteredRequest, []);
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param Slider $slider
     * @param int $id
     * @return View
     */
    public function edit(Slider $slider, int $id): View
    {
        $this->data['item'] = $slider->whereLangId($id)->first()->toArray();
        return view($this->viewTemplate . '.edit', $this->data);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $id):RedirectResponse
    {
        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $this->updateMainLang($this->modelName, $id, $filteredRequest);
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }
}
