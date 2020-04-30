<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post() {
        return $this->hasOne('App\Post');
        // By default it returns user_id. If you want to name the column something else do the following...
        // return $this->hasOne('App\Post', 'unique_user_id);
    }

    public function posts() {

        return $this->hasMany('App\Post');

    }

    public function roles() {
        //following convention we only need to use this
        //convention is, in aplhabetical order, and singular case, create the pivot table to link the two tables together/
        //link users and roles tables by creating a table role_user
        return $this->belongsToMany('App\Role')->withPivot('created_at');

        //If we have a differently named pivot table you define the table as a second parameter
        //third and fourth parameters are the primary keys e.g.
        //return $this->belongsToMany('App\Role', 'users_roles', 'user_id', 'role_id' );
    }
}
