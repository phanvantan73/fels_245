<?php

namespace App\Http\Controllers\Administrator\Management;

use App\Http\Requests\LessonRequest;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Lesson\LessonRepository;
use App\Http\Controllers\Controller;
use Exception;
use DB;

class LessonController extends Controller
{
    protected $lessonRepository;

    protected $courseRepository;

    public function __construct(LessonRepository $lessonRepository, CourseRepository $courseRepository)
    {
        $this->lessonRepository = $lessonRepository;
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        $lessons = $this->lessonRepository->with('course')->get();
        $courses = $this->courseRepository->pluck('course', 'id');

        return view('admincp.management.lessons.index', compact('lessons', 'courses'));
    }

    public function store(LessonRequest $request)
    {
        try {
            $this->lessonRepository->create($request->only([
                'lesson',
                'description',
                'course_id',
            ]));

            return redirect()->route('lessons.index');
        } catch (Exception $e) {
            return back()->with('error', trans('message.dbError.createError'));
        }
    }

    public function show($id)
    {
        $lesson = $this->lessonRepository->find($id);

        return view('admincp.management.lessons.show', compact('lesson'));
    }

    public function edit($id)
    {
        try {
            $lesson = $this->lessonRepository->find($id);
            $courses = $this->courseRepository->pluck('course', 'id');

            return view('admincp.management.lessons.edit', compact('lesson', 'courses'));
        } catch (Exception $exception) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }

    public function update(LessonRequest $request, $id)
    {
        try {
            $lesson = $this->lessonRepository->find($id);
            $lesson->update($request->only([
                'lesson',
                'description',
                'course_id',
            ]));

            return redirect()->route('lessons.index');
        } catch (Exception $e) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }

    public function destroy($id)
    {
        try {
            $lesson = $this->lessonRepository->find($id);
            DB::transaction(function () use ($lesson) {

                foreach ($lesson->questions as $question) {
                    $question->options()->delete();
                }

                $lesson->questions()->delete();
                $lesson->delete();
            });

            return redirect()->route('lessons.index');
        } catch (Exception $e) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }
}
