<?php

namespace App\Http\Controllers\Admin\Dreadnought;

use Illuminate\Http\RedirectResponse;

class IndexController extends Controller
{
    /**
      * @return \Illuminate\Http\RedirectResponse
      */
    public function index(): RedirectResponse
    {
        return redirect()->route('home');
    }
}
