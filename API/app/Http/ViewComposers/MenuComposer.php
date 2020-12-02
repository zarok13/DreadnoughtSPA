<?php

namespace App\Http\ViewComposers;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    private $menu;
    
    /**
     * @param View $view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function compose(View $view)
    {
        $menu = new Menu();
        if (!$this->menu) {
            $this->menu['top'] = $menu->webMenu();
        }

        return $view->with('menu', $this->menu);
    }
}
