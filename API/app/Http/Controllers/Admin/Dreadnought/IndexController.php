<?php

namespace App\Http\Controllers\Admin\Dreadnought;


class IndexController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect()->route('home');
    }
}
