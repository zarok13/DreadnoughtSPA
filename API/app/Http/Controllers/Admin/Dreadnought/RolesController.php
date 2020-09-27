<?php

namespace App\Http\Controllers\Admin\Dreadnought;

use App\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RolesController extends Controller
{
    protected $modelName = 'role';

    /**
     * RolesController __construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'roles';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
        $this->data['modulesList'] = config('modules');
    }

    /**
     * @param \App\Role $role
     *
     * @return \Illuminate\View\View
     */
    public function index(Role $role): View
    {
        $this->data['title'] = trans('default.roles');
        $this->data['roleList'] = $role->pluck('title', 'id');
        $this->data['permissions'] = $role->convertedJsonData();
        $this->data['allChecked'] = $role->allChecked();
        foreach ($this->data['modulesList'] as $index => $module) {
            if (!array_key_exists($index, $this->data['permissions']))
                $this->data['permissions'][$index] = $module['actions'];
        }

        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function create(Request $request): array
    {
        return $request->all();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Role $role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        $role->where('id', $request->role)->update(['permissions' => json_encode($request->actions)]);
        return redirect()->back();
    }
}
