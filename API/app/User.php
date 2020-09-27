<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return relation
     */
    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        if ($this->role->title == ADMINISTRATOR)
            return true;
        return false;
    }
}
