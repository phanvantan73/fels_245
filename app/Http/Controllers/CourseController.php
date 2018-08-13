<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CourseController extends Controller
{
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
}
