<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course',
        'image',
        'description',
    ];

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'course_user', 'user_id', 'course_id');
    }

    public function getImageAttribute()
    {
        return config('setting.images.course_img') . $this->attributes['image'];
    }
}
