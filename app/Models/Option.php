<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'question_id',
        'option',
        'is_true',
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
