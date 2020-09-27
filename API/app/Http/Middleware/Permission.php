<?php

namespace App\Http\Middleware;

use App\Facades\ModulePerms;
use App\Http\Controllers\Admin\Dreadnought\Controller;
use Closure;

class Permission extends Controller
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        $moduleName = $request->route()->controller->moduleName;
        $methodName = $this->checkForAliases($request->route()->getActionMethod());

        $rolledMethod = array_search($methodName, config('modules')[$moduleName]['actions']);

        if (empty($rolledMethod))
            return true;

        if (!ModulePerms::check($moduleName, $rolledMethod)) {
            if ($request->ajax() == true) {
                return response()->json('Sorry, you don\'t have permissions for this action!', 403);
            } else {
                return redirect()->route('noPermissions');
            }
        }
        return $next($request);
    }

    /**
     * @param $methodName
     * @return string
     */
    protected function checkForAliases($methodName)
    {
        switch ($methodName) {
            case 'update':
                return 'edit';
                break;
            case 'create':
                return 'add';
                break;
            case 'updatePage':
                return 'editPage';
                break;
            default:
                return $methodName;
        }
    }
}
