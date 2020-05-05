<?php

namespace App;


class Role extends ChildModel
{
    protected $fillable = ['*'];

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
        $targetRole = $this->first();
        $actions = json_decode($targetRole->permissions,true);

        return $actions;
    }
}
