<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\TestAnswer;
use App\Models\Test;
use App\Models\Result;
use Illuminate\Http\Request;
use Auth;
use DB;
use Exception;

class TestsController extends Controller
{
    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $test = Test::create([
                    'user_id' => Auth::user()->id,
                ]);

                foreach ($request->input('questions', []) as $key => $question) {
                    $test->testAnswers()->create([
                        'test_id' => $test->id,
                        'question_id' => $question,
                        'option_id' => $request->input('answers.' . $question) != null ? $request->input('answers.' . $question) : null,
                        'correct' => $request->input('answers.' . $question) != null ? Option::find($request->input('answers.' . $question))->is_true : config('setting.default.incorrect_option'),
                    ]);
                }
                $test->result()->create([
                    'test_id' => $test->id,
                    'score' => TestAnswer::numOfTrueAnswer($test->id) * config('setting.default.score'),
                ]);
            });
            $test = Test::where('user_id', Auth::user()->id)->latest()->first();

            return view('tests.result', compact('test'));
        } catch (Exception $e) {
            return back()->with('dbError', trans('message.dbError.createError'));
        }
    }
}
