<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\TestAnswer;
use Illuminate\Http\Request;
use Auth;
use DB;
use Exception;
use App\Traits\CreateActivity;

class TestController extends Controller
{
    use CreateActivity;

    public function store(Request $request)
    {
        try {
            $user = Auth::user();

            DB::transaction(function () use ($request, $user) {
                $test = $user->tests()->create();

                foreach ($request->input('questions', []) as $key => $question) {
                    $test->testAnswers()->create([
                        'question_id' => $question,
                        'option_id' => $request->input('answers.' . $question) != null ? $request->input('answers.' . $question) : null,
                        'correct' => $request->input('answers.' . $question) != null ? Option::find($request->input('answers.' . $question))->is_true : config('setting.default.incorrect_option'),
                    ]);
                }
                $test->result()->create([
                    'score' => TestAnswer::numOfTrueAnswer($test->id) * config('setting.default.score'),
                ]);

                $this->createActivity($user, trans('message.action.take_test'), trans('message.default.test'));

            });
            $test = $user->tests()->latest()->first();

            return view('tests.result', compact('test'));
        } catch (Exception $e) {
            return back()->with('dbError', trans('message.dbError.createError'));
        }
    }
}
