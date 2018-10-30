<?php

namespace App\Http\Controllers\Administrator\Management;

use App\Repositories\Lesson\LessonRepository;
use App\Repositories\Question\QuestionRepository;
use App\Http\Requests\QuestionRequest;
use App\Http\Controllers\Controller;
use Exception;
use DB;

class QuestionController extends Controller
{
    protected $questionRepository;

    protected $lessonRepository;

    public function __construct(QuestionRepository $questionRepository, LessonRepository $lessonRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->lessonRepository = $lessonRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = $this->questionRepository->with('lesson')->get();
        $lessons = $this->lessonRepository->pluck('lesson', 'id');

        return view('admincp.management.questions.index', compact('questions', 'lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        try {
            $options = explode(',', $request->options);
            DB::transaction(function () use ($request, $options) {
                $question = $this->questionRepository->create($request->only([
                    'content',
                    'description',
                    'lesson_id',
                ]));

                foreach ($options as $option) {
                    $question->options()->create([
                        'option' => $option,
                        'is_true' => config('setting.default.incorrect_option'),
                    ]);
                }
                $question->options()->create([
                    'option' => $request->true_option,
                    'is_true' => config('setting.default.correct_option'),
                ]);
            });

            return redirect()->route('questions.index');
        } catch (Exception $e) {
            return back()->with('error', trans('message.dbError.createError'));
        }
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
            $question = $this->questionRepository->find($id);

            return view('admincp.mangement.questions.show', compact('question'));
        } catch (Exception $e) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $question = $this->questionRepository->find($id);
            $lessons = $this->lessonRepository->pluck('lesson', 'id');

            return view('admincp.management.questions.edit', compact('question', 'lessons'));
        } catch (Exception $e) {
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
    public function update(QuestionRequest $request, $id)
    {
        try {
            $question = $this->questionRepository->find($id);
            $question->update($request->only([
                'content',
                'description',
                'lesson_id',
            ]));

            return redirect()->route('questions.index');
        } catch (Exception $e) {
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
            $question = $this->questionRepository->find($id);
            DB::transaction(function () use ($question) {
                $question->options()->delete();
                $question->delete();
            });

            return redirect()->route('questions.index');
        } catch (Exception $e) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }
}
