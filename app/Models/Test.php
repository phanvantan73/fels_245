<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    protected $fillable = [
        'user_id',
    ];

    public function testAnswers()
    {
        return $this->hasMany(TestAnswer::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
