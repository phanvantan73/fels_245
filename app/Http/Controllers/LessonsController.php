<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function show($id)
    {
        try {
            $lesson = Lesson::findOrFail($id);
            $questions = $lesson->questions()->inRandomOrder()->limit(config('setting.limit_questions'))->get();
        } catch (ModelNotFoundException $e) {
            return back()->with('notFoundError', trans('message.notFoundError'));
        }

        return view('lessons.show', compact('lesson', 'questions'));
    }
}
