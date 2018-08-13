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

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userFollow()
    {
        return $this->belongsTo(User::class, 'follow_user_id', 'id');
    }
}
