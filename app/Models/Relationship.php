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

    public function scopeFollowers($query)
    {
        return $query->where('status', config('setting.default.follower'));
    }

    public function scopeFollowings($query)
    {
        return $query->where('status', config('setting.default.following'));
    }

    public function scopeFollowed($query, $relationship)
    {
        return $query->where('user_id', $relationship->follow_user_id)->where('follow_user_id', $relationship->user_id);
    }
}
