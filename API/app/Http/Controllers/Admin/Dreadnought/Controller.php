<?php

namespace App\Http\Controllers\Admin\Dreadnought;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $moduleName;
    protected $data;
    protected $lang;
    protected $langList;
    protected $viewTemplate;

    /**
     * Controller __construct
     */
    public function __construct()
    {
        $this->viewTemplate = 'admin.modules';
        $this->lang = urlLang();
        $this->langList = setting('langList');
        $this->data['lang'] = $this->lang;
        $this->data['langList'] = $this->langList;
        $this->data['modules'] = $this->getModules();
        $this->middleware('admin');
    }

    /**
     * @return array
     */
    private function getModules(): array
    {
        return config('modules');
    }

    /**
     * @return void
     */
    protected function jsonHeaders()
    {
        header('Content-type:application/json;charset=utf-8');
        header('Access-Control-Allow-Origin: *');
    }

    /**
     * @param array $data
     * @return array
     */
    protected function saveFlashData($data = [])
    {
        request()->session()->put('flashData', $data);
        return $data;
    }
}
