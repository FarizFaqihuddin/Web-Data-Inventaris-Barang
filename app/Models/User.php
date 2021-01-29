<?php

namespace App\Models;

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
        'username', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function event_organizer()
    {
        return $this->hasOne('App\Models\EventOrganizer','user_id','id');
    }

    public function merchant()
    {
        return $this->hasOne('App\Models\Merchant','user_id','id');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }
}
