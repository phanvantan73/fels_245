<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('created_at', 'DESC')->take(3)->get();

        return view('home', compact('courses'));
    }
}
