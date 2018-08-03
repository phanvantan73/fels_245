<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'lesson',
        'course_id',
        'desciption',
    ];

    public $timestamps = false;

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function results()
    {
        return $this->hasMany('App\Models\Result');
    }
}
