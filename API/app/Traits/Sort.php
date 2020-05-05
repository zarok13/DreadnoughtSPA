<?php

namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait Sort
{
    /**
     * @param Request $request
     * @param string $field
     */
    public function sort(Request $request, $field = "lang_id")
    {
        try {
            perms($this->data['modules'], $this->moduleName, __FUNCTION__,true);
            if ($request->ajax() && $request->isMethod('post')) {
                DB::transaction(function () use ($request, $field) {
                    if (!isset($request->sortList) && !is_array($request->sortList)) {
                        throw new \Exception('Sorted list not found!');
                    }
                    $sort = 1;
                    foreach ($request->sortList as $langID) {
                        $this->manualSort($langID, $sort, $field);
                        $sort++;
                    }
                    echo json_encode(['status' => 'ok']);
                });
            } else {
                throw new \Exception('error: Http method must be post type.');
            }
        } catch (\Exception $e) {
            echo json_encode([
                'status'    => 'error',
                'message'   => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param $langID
     * @param $sort
     * @param $field
     */
    private function manualSort($langID, $sort, $field)
    {
        DB::table($this->moduleName)
           ->where($field, $langID)
           ->update(['sort' => $sort]);
    }

    /**
     * @param string $sql
     * @param bool $lang
     * @return int|mixed
     */
    private function getMaxSort($sql = '',$lang = true)
    {
        $query = DB::table($this->moduleName)
            ->selectRaw('MAX(sort)+1 AS maxSort');
        if($lang) {
            $query->where('lang',$this->lang);
        }
        if(!empty($sql)) {
            $query->whereRaw($sql);
        }
        $row = $query->first();
        return !empty($row->maxSort) ? $row->maxSort : 1;
    }
}
