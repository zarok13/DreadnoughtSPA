<?php


namespace App\Library;


use App\Role;

class ModulePerms
{
    /**
     * @param array $moduleList
     * @param $moduleName
     * @param $method
     * @param bool $ajax
     * @return bool
     * @throws \Exception
     */
    public function check(array $moduleList, $moduleName, $method, $ajax = false)
    {
        $permissions = (new Role)->convertedJsonData();
        if (array_key_exists($moduleName, $moduleList) && array_key_exists($moduleName, $permissions)) {
            $checkMethod = array_search($method, $moduleList[$moduleName]['actions']);
        } else {
            $checkMethod = null;
        }
        if (!empty($checkMethod) && (array_key_exists($checkMethod, $permissions[$moduleName])) && ($permissions[$moduleName][$checkMethod] == 1)) {
            return true;
        } else {
            if ($ajax == true) {
                throw new \Exception('Sorry, you don\'t have permissions for this action!');
            } else {
                redirect()->route('noPermissions')->send();
            }
            exit();
        }
    }
}