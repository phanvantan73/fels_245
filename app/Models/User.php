<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

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

    protected $dates = ['deleted_at'];

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
        return $this->hasMany(Activity::class);
    }

    public function relationships()
    {
        return $this->hasMany(Relationship::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class, 'user_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user', 'user_id', 'course_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function words()
    {
        return $this->belongsToMany(Word::class, 'list_of_words', 'user_id', 'word_id')
            ->using(ListOfWord::class)
            ->withPivot('id', 'status', 'add_to_list_time', 'learn_time');
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function isAdmin()
    {
        return $this->roles()->wherePivot('role_id', config('setting.default.ad_role'))->exists();
    }
}
