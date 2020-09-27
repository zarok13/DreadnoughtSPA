<?php

namespace App\Http\Controllers\Admin\Defaults;

use App\Facades\Slug;
use App\FileStoreRef;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\Page;
use App\Traits\DatabaseAction;
use App\Traits\Sort;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PagesController extends Controller
{
    use DatabaseAction;
    use Sort;

    protected $modelName = 'Page';
    protected $validationArray = [
        'title' => 'required',
    ];

    /**
     * PagesController __construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'pages';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['typeList'] = setting('pageTypes');
        $this->data['title'] = trans('default.' . $this->moduleName);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->data['items'] = Page::lang()->orderBy('sort', 'asc')->get();
        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function add(): View
    {
        $this->data['templateList'] = $this->getTemplates();
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
        $filteredRequest['slug'] = Slug::create('pages', 'title');
        $filteredRequest['user_id'] = Auth::id();
        $filteredRequest['sort'] = $this->getMaxSort();
        $this->addMainLang('page', $filteredRequest);
        $this->data['module'] = $this->moduleName;

        return redirect(route($this->moduleName))->with('successCreate', DATABASE_ACTION_CREATE);
    }

    /**
     * @param \App\Page $page
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Page $page, int $id): View
    {
        $this->data['item'] = $page->whereLangId($id)->first();
        $this->data['templateList'] = $this->getTemplates($this->data['item']->page_template_id);
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
        $filteredRequest['slug'] = Slug::create('pages', 'title');
        $this->updateMainLang('page', $id, $filteredRequest);
        $this->data['module'] = $this->moduleName;
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $menu = (MODELS_PATH . ucfirst($this->modelName))::findOrFail($id);
        $menu->delete();
        return redirect()->back();
    }

    /**
     * @param \App\Page $page
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function editPage(Page $page, int $id): View
    {
        $this->data['item'] = $page->whereLangId($id)->first();
        $this->data['referenceType'] = setting('fileStoreReferenceType')['pages'];
        $this->data['referenceID'] = $id;
        $this->data['flashData'] = $this->saveFlashData([
            'action' => __FUNCTION__,
            'reference_id' => $this->data['referenceID'],
            'reference_type' => $this->data['referenceType'],
        ]);

        $this->data['items'] = FileStoreRef::where('lang', $this->lang)
            ->where('reference_type', $this->data['referenceType'])
            ->where('reference_id', $this->data['referenceID'])->get();

        return view($this->viewTemplate . '.edit_page', $this->data);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePage(Request $request, int $id): RedirectResponse
    {
        $this->validate($request, $this->validationArray);
        $convertedRequest = $request->except('_token', 'file');
        $this->updateMainLang('page', $id, $convertedRequest);
        $this->data['module'] = $this->moduleName;
        return redirect()->back()->with('successUpdate', DATABASE_ACTION_UPDATE);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function templateGroup(Request $request): JsonResponse
    {
        $this->jsonHeaders();
        try {
            $this->data['templateGroup'] = $this->getTemplates($request->page_type);
            return response()->json([
                'status' => 'ok',
                'response' => view($this->viewTemplate . '.template_group', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param int $groupID
     *
     * @return array
     */
    public static function getTemplates(int $groupID = 0): array
    {
        return setting('pageTemplates')[$groupID];
    }
}
