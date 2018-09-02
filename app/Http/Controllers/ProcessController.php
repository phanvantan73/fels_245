<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Exception;
use App\Traits\CreateActivity;

class ProcessController extends Controller
{
    use CreateActivity;

    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function index()
    {
        $courses = $this->user->courses;
        $words = $this->user->words;

        return view('process.index', compact('courses', 'words'));
    }

    public function learnWord($id)
    {
        try {
            $now = Carbon::now();

            foreach ($this->user->words as $word) {
                if ($word->pivot->id == $id) {
                    DB::transaction(function () use ($word, $now) {
                        $word->pivot->status = config('setting.default.learned');
                        $word->pivot->learn_time = $now;
                        $word->pivot->save();

                        $this->createActivity($this->user, trans('message.action.learn'), trans('message.default.word'), $word->word);
                    });
                }
            }

            return redirect()->route('process');
        } catch (Exception $e) {
            return back()->with('notFoundError', trans('message.notFoundError'));
        }
    }

    public function deleteWord($id)
    {
        try {

            foreach ($this->user->words as $word) {
                if ($word->pivot->id == $id) {
                    DB::transaction(function () use ($word) {
                        $word->pivot->delete();

                        $this->createActivity($this->user, trans('message.action.delete'), trans('message.default.word'), $word->word);
                    });
                }
            }

            return redirect()->route('process');
        } catch (Exception $e) {
            return back()->with('notFoundError', trans('message.notFoundError'));
        }
    }
}
