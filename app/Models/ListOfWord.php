<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListOfWord extends Model
{
    protected $fillable = [
        'user_id',
        'word',
        'status',
        'add_to_list_time',
        'learn_time',
        'course_id',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
