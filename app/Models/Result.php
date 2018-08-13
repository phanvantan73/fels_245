<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'test_id',
        'score',
    ];

    public $timestamps = false;

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
