<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'content',
        'description',
        'lesson_id',
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }

    public function options()
    {
        return $this->hasMany('App\Models\Option');
    }
}
