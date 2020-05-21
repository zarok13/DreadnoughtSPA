<?php

namespace App\Http\Middleware;

use App\Facades\ModulePerms;
use Closure;

class Permission
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
        if (empty($request->route()->controller->moduleName)) {
            throw new \Exception('Empty module name');
        }
        $methodName = array_search($request->route()->getActionMethod(), config('modules')[$moduleName]['actions']);
        if (!ModulePerms::check($moduleName, $methodName)) {
            if ($request->ajax() == true) {
                return response()->json('Sorry, you don\'t have permissions for this action!', 403);
            } else {
                return redirect()->route('noPermissions');
            }
        }
        return $next($request);
    }
}
