<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LessonController extends Controller
{
    public function show($id)
    {
        try {
            $lesson = Lesson::findOrFail($id);
            $questions = $lesson->questions()->inRandomOrder()->limit(config('setting.limit_questions'))->get();

            return view('lessons.show', compact('lesson', 'questions'));
        } catch (ModelNotFoundException $e) {
            return back()->with('notFoundError', trans('message.notFoundError'));
        }
    }
}
