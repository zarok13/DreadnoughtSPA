<?php


namespace App\Traits;

use Illuminate\Http\RedirectResponse;

trait Deletable
{
    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $menu = (MODELS_PATH . ucfirst($this->modelName))::where('lang_id', $id)->first();
        $menu->delete();
        return redirect()->route($this->moduleName);
    }
}
