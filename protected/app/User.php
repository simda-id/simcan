<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'group_id','email', 'password','status_user',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email','password', 'remember_token',
    ];

    public function getUserSubUnit() {
        return $this->hasMany('App\Models\UserSubUnit', 'user_id', 'id');
    }

    public function getUserDesa() {
        return $this->hasMany('App\Models\UserDesa', 'user_id', 'id');
    }     
}
