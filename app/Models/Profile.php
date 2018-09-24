<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'address',
        'phone_number',
        'avatar',
        'user_id',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAvatarAttribute()
    {
        return config('setting.images.profile_img') . $this->attributes['avatar'];
    }
}
