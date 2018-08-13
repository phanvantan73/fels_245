<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    protected $table = 'test_answers';

    protected $fillable = [
        'test_id',
        'question_id',
        'option_id',
        'correct',
    ];

    public $timestamps = false;

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function question()
    {
        return$this->belongsTo(Question::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public static function numOfTrueAnswer($testId)
    {
        return TestAnswer::where('test_id', $testId)->where('correct', config('setting.default.correct_option'))->count();
    }
}
