<?php

namespace App\Http\Controllers\Administrator\Management;

use App\Http\Requests\CourseRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Course\CourseRepository;
use Exception;
use DB;

class CourseController extends Controller
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->courseRepository->all();

        return view('admincp.management.courses.index', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        try {
            $this->courseRepository->create($request->only([
                'course',
                'description',
            ]));

            return redirect()->route('admin.courses.index');
        } catch (Exception $e) {
            return back()->with('error', trans('message.dbError.createError'));
        }
    }

    public function show($id)
    {
        try {
            $course = $this->courseRepository->find($id);

            return view('admincp.management.courses.show', compact('course'));
        } catch (Exception $exception) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $course = $this->courseRepository->find($id);

            return view('admincp.management.courses.edit', compact('course'));
        } catch (Exception $exception) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        try {
            $course = $this->courseRepository->find($id);
            $course->update($request->only([
                'course',
                'description',
            ]));

            return redirect()->route('admin.courses.index');
        } catch (Exception $exception) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $course = $this->courseRepository->find($id);

            DB::transaction(function () use ($course) {
                $course->words()->delete();
                $course->lessons()->delete();
                $course->delete();
            });

            return redirect()->route('admin.courses.index');
        } catch (Exception $exception) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }
}
