<?php

namespace App\Http\Controllers;

use App\Models\CourseUser;
use App\Models\ListOfWord;
use Illuminate\Http\Request;
use Auth;

class ProcessController extends Controller
{
    public function index()
    {
        $courses = CourseUser::all()->where('user_id', Auth::user()->id);
        $words = ListOfWord::where('user_id', Auth::user()->id)->oldest('add_to_list_time')->get();

        return view('process.index', compact('courses', 'words'));
    }
}
