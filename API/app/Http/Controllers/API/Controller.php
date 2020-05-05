<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
        $this->lang = urlLang();
        $this->langList = setting('langList');
        $this->data['lang'] = $this->lang;
        $this->data['langList'] = $this->langList;
    }
}
