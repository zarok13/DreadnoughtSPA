<?php


namespace App\Library;


use App\Role;
use Illuminate\Support\Facades\Auth;

class ModulePerms
{
    /**
     * @param $moduleName
     * @param $method
     * @return bool
     */
    public function check($moduleName, $rolledMethod)
    {
        $permissions = Auth::user()->role->convertedJsonData();
        if (isset($permissions[$moduleName]) && $permissions[$moduleName][$rolledMethod] == true) {
            return true;
        } else {
            return false;
        }
    }
}
