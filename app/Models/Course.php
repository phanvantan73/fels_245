<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'course',
        'image',
        'description',
    ];

    protected $dates = ['deleted_at'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
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
