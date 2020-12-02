<?php

namespace App\Models;


class Role extends ChildModel
{
    protected $fillable = ['*'];
    protected $role;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', 'role_id');
    }

    /**
     * @return mixed
     */
    public function convertedJsonData()
    {
        $this->role = self::first();
        $actions = json_decode($this->role->permissions, true);

        return $actions;
    }

    /**
     * Undocumented function
     *
     * @return bool
     */
    public function allChecked(): bool
    {
        if (!strpos($this->role->permissions, '0'))
            return true;
        return false;
    }
}
