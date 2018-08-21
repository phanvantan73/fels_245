<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $courses = Course::query()->latest()->take(config('setting.popular_courses'))->get();

        return view('home', compact('courses'));
    }
}
