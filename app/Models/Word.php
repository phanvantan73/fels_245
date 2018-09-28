<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function isAddToList($wordId)
    {
        foreach (Auth::user()->words as $word) {
            if ($word->pivot->word_id == $wordId) {
                return true;
            }
        }

        return false;
    }

    public function getImageAttribute()
    {
        return config('setting.images.word_img') . $this->attributes['image'];
    }

    public function getAudioAttribute()
    {
        return config('setting.audios.word_audio') . $this->attributes['audio'];
    }
}
