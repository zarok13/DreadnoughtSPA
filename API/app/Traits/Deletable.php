<?php


namespace App\Traits;

use Illuminate\Http\RedirectResponse;

trait Deletable
{

    protected $deleteForLanguage = false;

    /**
     * Undocumented function
     *
     * @param integer $id
     * @param string $columnName
     * @return RedirectResponse
     */
    public function delete(int $id, string $columnName = 'lang_id'): RedirectResponse
    {
        $model = (MODELS_PATH . ucfirst($this->modelName))::where($columnName, $id);
        if(!$this->deleteForLanguage){
            $model->where('lang', $this->lang);
        }
        $model->delete();
        
        return redirect()->back();
    }
}
