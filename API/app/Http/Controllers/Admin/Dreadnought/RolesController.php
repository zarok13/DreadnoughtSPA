<?php

namespace App\Http\Controllers\Admin\Dreadnought;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected $modelName = 'role';

    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'roles';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.'.$this->moduleName);
        $this->data['modulesList'] = config('modules');
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Role $role)
    {
        $this->data['title'] = trans('default.roles');
        $this->data['roleList'] = $role->pluck('title', 'id');
        $this->data['permissions'] = $role->convertedJsonData();

        return view($this->viewTemplate.'.show', $this->data);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
        return $request->all();
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $permissions = [];
        $actions = $request->actions;
        foreach ($actions as $name => $action) {
            $permissions[$name] = $action;
        }
        $role->where('id', $request->role)->update(['permissions' => json_encode($permissions)]);
        return redirect()->back();
    }
}