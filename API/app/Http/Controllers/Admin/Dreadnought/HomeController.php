<?php

namespace App\Http\Controllers\Admin\Dreadnought;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Method __construct
     *
     * @return void
     */
    /**
     * HomeController __construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $this->data['homePage'] = true;
        return view('admin.base', $this->data);
    }

    /**
     * @return string
     */
    public function clearCache(): string
    {
        Cache::flush();
        return "<h3>Cache cleared</h3>";
    }

    /**
     * @return \Illuminate\View\View
     */
    public function noPermissions(): View
    {
        $this->data['title'] = trans('default.no_perms');
        return view('admin.applets.info.no_perms', $this->data);
    }
}
