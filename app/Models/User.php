<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function activities()
    {
        return $this->hasMany('App\Models\Activity');
    }

    public function relationships()
    {
        return $this->hasMany('App\Models\Relationship');
    }

    public function listOfWords()
    {
        return $this->hasMany('App\Models\ListOfWord', 'user_id', 'id');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function socialAccounts()
    {
        return $this->hasMany('App\Models\SocialAccount', 'user_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course', 'course_user', 'course_id', 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_user', 'role_id', 'user_id');
    }
}
