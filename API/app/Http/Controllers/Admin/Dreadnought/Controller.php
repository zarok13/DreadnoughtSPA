<?php

namespace App\Http\Controllers\Admin\Dreadnought;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $moduleName;
    protected $data;
    protected $lang;
    protected $langList;
    protected $viewTemplate;

    /**
     * Controller constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->viewTemplate = 'admin.modules';
        $this->lang = urlLang();
        $this->langList = setting('langList');
        $this->data['lang'] = $this->lang;
        $this->data['langList'] = $this->langList;
        $this->data['modules'] = $this->getModules();
        $this->middleware('adminAuth');
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    private function getModules()
    {
        return config('modules');
    }

    /**
     *  return json format headers
     */
    protected function jsonHeaders()
    {
        header('Content-type:application/json;charset=utf-8');
        header('Access-Control-Allow-Origin: *');
    }

    public function noPermissions()
    {
        return view('admin.applets.info.no_perms');
    }
}
