<?php


namespace App\Library;


use App\Role;

class ModulePerms
{
    /**
     * @param $moduleName
     * @param $method
     * @return bool
     */
    public function check($moduleName, $method)
    {
        $permissions = (new Role)->convertedJsonData();
        if (array_key_exists($moduleName, $permissions) && array_key_exists($method, $permissions[$moduleName]) && $permissions[$moduleName][$method] == 1) {
            return true;
        } else {
            return false;
        }
    }
}