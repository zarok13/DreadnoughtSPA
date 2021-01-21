<?php

namespace App\Http\Controllers\Admin\Defaults;

use App\Models\Article;
use App\Facades\Slug;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Models\Page;
use App\Traits\DatabaseAction;
use App\Traits\Deletable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\View\View;

class ArticlesController extends Controller
{
    use DatabaseAction;
    use Deletable;

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
        $this->data['dataTable'] = true;
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
        $page = Page::whereLangId($pageID)->first();
        $this->data['template'] = $page->template_type;
        if ($this->data['template'] == 'products') {
            $this->data['icons'] = config('fontAwesomeIcons');
        }
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
        return redirect()->back()->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param Article $article
     * @param int $ID
     * @return View
     */
    public function edit(Article $article, int $id): View
    {
        $this->data['ID'] = $id;
        $this->data['item'] = $article->lang()->whereLangId($id)->first();
        $this->data['pageID'] = optional($this->data['item'])->page_id;
        page404($this->data['pageID']);

        $this->data['template'] = $this->data['item']->page->template_type;
        if ($this->data['template'] == 'products') {
            $this->data['icons'] = config('fontAwesomeIcons');
        }

        $this->data['clonableLangs'] = $this->getCloneLangList($id);
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
     * Undocumented function
     *
     * @param int $itemID
     * @param char $cloneLang
     * @param ArticleRefPage $articleRefPage
     * @return void
     */
    public function clone($id, $cloneLang)
    {
        $filteredRequest = Article::lang()->whereLangId($id)->first()->toArray();
        $filteredRequest['lang_id'] = $id;
        unset($filteredRequest['id']);
        unset($filteredRequest['updated_at']);
        $filteredRequest['created_at'] = now();
        $filteredRequest['user_id'] = Auth::id();
        $filteredRequest['slug'] = Slug::create('articles', 'title');
        $filteredRequest['title'] = $cloneLang . '_' . $filteredRequest['title'];
        $this->addMainLang($this->modelName, $filteredRequest, $cloneLang);
        // $this->addInCurrentLanguage($this->modelName, $filteredRequest, $cloneLang);
        // $pageIDs = $articleRefPage->getReferenceList($id);
        // $articleRefPage->addReference($id,$pageIDs,$cloneLang);
        return redirect(route('articles.edit', ['id' => $id]));
    }

    /**
     * @param $itemID
     * @return array
     * @throws \Exception
     */
    protected function getCloneLangList($id)
    {
        $langList = setting('langList');
        $cloneLangList = [];
        foreach ($langList as $index => $value) {
            if ($index != $this->lang) {
                if (!Article::whereLangId($id)->whereLang($index)->exists()) {
                    $cloneLangList[] = $index;
                }
            }
        }

        return $cloneLangList;
    }
}
