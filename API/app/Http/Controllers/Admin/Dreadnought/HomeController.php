<?php

namespace App\Http\Controllers\Admin\Dreadnought;

use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->data['homePage'] = true;
        return view('admin.base', $this->data);
    }

    /**
     * @return string
     */
    public function clearCache()
    {
        Cache::flush();
        return "<h3>Cache cleared</h3>";
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function noPermissions()
    {
        $this->data['title'] = trans('default.no_perms');
        return view('admin.applets.info.no_perms',$this->data);
    }
}
