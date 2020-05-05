<?php

namespace App\Http\Controllers\Admin\Defaults;

use App\Article;
use App\Facades\Slug;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Traits\DatabaseAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    use DatabaseAction;

    protected $moduleName = 'articles';
    protected $modelName = 'Article';
    protected $validationArray = [

    ];

    /**
     * ArticlesController constructor.
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
     * @param Article $article
     * @param $pageID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Article $article, $pageID)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['pageID'] = $pageID;
        $this->data['items'] = $article->lang()->where('page_id', $pageID)->orderBy('created_at', 'desc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @param $pageID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add($pageID)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['title'] .= getActionIcon(__FUNCTION__);
        $this->data['pageID'] = $pageID;
        return view($this->viewTemplate . '.add', $this->data);
    }

    /**
     * @param Request $request
     * @param $pageID
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request, $pageID)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $filteredRequest['created_at'] = now();
        $filteredRequest['user_id'] = Auth::id();
        $filteredRequest['page_id'] = $pageID;
        $filteredRequest['slug'] = Slug::create('articles', 'title');
        $this->addMainLang($this->modelName, $filteredRequest);
        $this->data['module'] = $this->moduleName;
        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param Article $article
     * @param $ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article, $ID)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['title'] .= getActionIcon(__FUNCTION__);
        $this->data['ID'] = $ID;
        $this->data['item'] = $article->whereLangId($ID)->first();
        $this->data['template'] = $this->data['item']->page->template_type;
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
        $filteredRequest['slug'] = Slug::create('articles', 'title');
        $this->updateMainLang($this->modelName, $id, $filteredRequest);
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

        $menu = (MODELS_PATH . ucfirst($this->modelName))::findOrFail($id);
        $menu->delete();
        return back();
    }
}