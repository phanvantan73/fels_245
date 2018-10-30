<?php

namespace App\Http\Controllers\Administrator\Management;

use App\Http\Requests\WordRequest;
use App\Repositories\Lesson\LessonRepository;
use App\Repositories\Word\WordRepository;
use App\Http\Controllers\Controller;
use Exception;
use DB;

class WordController extends Controller
{
    protected $wordRepository;

    protected $lessonRepository;

    public function __construct(WordRepository $wordRepository, LessonRepository $lessonRepository)
    {
        $this->wordRepository = $wordRepository;
        $this->lessonRepository = $lessonRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = $this->wordRepository->with('lesson')->paginate();
        $lessons = $this->lessonRepository->pluck('lesson', 'id');

        return view('admincp.management.words.index', compact('words', 'lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WordRequest $request)
    {
        try {
            $this->wordRepository->create($request->only([
                'word',
                'description',
                'lesson_id',
            ]));

            return redirect()->route('words.index');
        } catch (Exception $e) {
            return back()->with('error', trans('message.notFoundError'));
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
            $word = $this->wordRepository->find($id);

            return view('admincp.management.words.show', compact('word'));
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
            $word = $this->wordRepository->find($id);
            $lessons = $this->lessonRepository->pluck('lesson', 'id');

            return view('admincp.management.words.edit', compact('word', 'lessons'));
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
    public function update(WordRequest $request, $id)
    {
        try {
            $word = $this->wordRepository->find($id);
            $word->update($request->only([
                'word',
                'description',
                'lesson_id',
            ]));

            return redirect()->route('words.index');
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
            $word = $this->wordRepository->find($id);
            $word->delete();

            return redirect()->route('words.index');
        } catch (Exception $e) {
            return back()->with('error', trans('message.notFoundError'));
        }
    }
}
