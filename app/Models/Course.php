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
        return $this->hasMany(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }

    public function words()
    {
        return $this->hasManyThrough(Word::class, Lesson::class);
    }

    public function getImageAttribute()
    {
        return config('setting.images.course_img') . $this->attributes['image'];
    }
}
