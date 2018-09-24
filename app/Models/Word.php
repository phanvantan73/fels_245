<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
        'word',
        'audio',
        'description',
        'image',
        'lesson_id',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'list_of_words', 'word_id', 'user_id')
            ->using(ListOfWord::class)
            ->withPivot('id', 'status', 'add_to_list_time', 'learn_time');
    }
}
