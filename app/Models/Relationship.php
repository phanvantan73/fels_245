<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'follow_user_id',
        'follow_time',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
