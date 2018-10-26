<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Word extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'word',
        'audio',
        'description',
        'image',
        'lesson_id',
    ];

    protected $dates = ['deleted_at'];

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
        return Auth::user()->words()->wherePivot('word_id', $wordId)->exists();
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
