<?php

namespace App\Http\Controllers\Admin\Defaults;

use App\Models\Article;
use App\Facades\Slug;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Traits\DatabaseAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\View\View;

class ArticlesController extends Controller
{
    use DatabaseAction;

    protected $modelName = 'Article';
    protected $validationArray = [];
    protected $fileStoreReferences;

    /**
     * ArticlesController constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'articles';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
        $this->fileStoreReferences = setting('fileStoreReferenceType');
    }

    /**
     * @param Article $article
     * @param int $pageID
     * @return View
     */
    public function index(Article $article, int $pageID): View
    {
        $this->data['pageID'] = $pageID;
        $this->data['items'] = $article->lang()->where('page_id', $pageID)->orderBy('created_at', 'desc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @param int $pageID
     * @return View
     */
    public function add(int $pageID): View
    {
        $this->data['pageID'] = $pageID;
        return view($this->viewTemplate . '.add', $this->data);
    }

    /**
     * @param Request $request
     * @param int $pageID
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request, int $pageID): RedirectResponse
    {
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
     * @param int $ID
     * @return View
     */
    public function edit(Article $article, int $ID): View
    {
        $this->data['ID'] = $ID;
        $this->data['item'] = $article->whereLangId($ID)->first();
        $this->data['template'] = $this->data['item']->page->template_type;
        return view($this->viewTemplate . '.edit', $this->data);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->validate($request, $this->validationArray);
        $filteredRequest = $request->except('_token');
        $filteredRequest['slug'] = Slug::create('articles', 'title');
        $this->updateMainLang($this->modelName, $id, $filteredRequest);
        $this->data['module'] = $this->moduleName;
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $menu = (MODELS_PATH . ucfirst($this->modelName))::findOrFail($id);
        $menu->delete();
        return redirect()->back();
    }
}
