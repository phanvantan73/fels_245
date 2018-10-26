<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Word;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCourses = Course::count();
        $totalLessons = Lesson::count();
        $totalWords = Word::count();

        return view('admincp.dashboard', compact('totalCourses', 'totalUsers', 'totalWords', 'totalLessons'));
    }
}
