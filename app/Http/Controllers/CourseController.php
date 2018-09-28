<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Word;
use DB;
use App\Traits\CreateActivity;
use Exception;

class CourseController extends Controller
{
    use CreateActivity;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(config('setting.paginate'));

        return view('courses.index', compact('courses'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $course = Course::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return back()->with('notFoundError', trans('message.notFoundError'));
        }

        return view('courses.show', compact('course'));
    }

    public function addWordToList($wordId, $courseId)
    {
        try {
            $word = Word::find($wordId);
            DB::transaction(function () use ($wordId, $word) {
                $this->user->words()->attach($wordId, [
                    'status' => 0,
                    'add_to_list_time' => now(),
                    'learn_time' => null,
                ]);

                $this->createActivity($this->user, trans('message.action.add'), trans('message.default.word'), $word->word);
            });

            return redirect()->route('courses.show', $courseId);
        } catch (Exception $e) {
            return back()->with('notFoundError', trans('message.notFoundError'));
        }
    }
}
