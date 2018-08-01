<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'lesson_id',
        'finish_time',
        'score',
        'user_id',
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }
}
