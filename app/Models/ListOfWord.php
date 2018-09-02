<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ListOfWord extends Pivot
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

    public function getStatusAttribute()
    {
        $status = $this->attributes['status'] == config('setting.default.learned') ? trans('message.processes.word.learned') : trans('message.processes.word.unlearned');

        return $status;
    }

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
