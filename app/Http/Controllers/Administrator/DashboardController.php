<?php

namespace App\Http\Controllers\Administrator;

use App\Repositories\Course\CourseRepository;
use App\Repositories\Lesson\LessonRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Word\WordRepository;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $userRepository;

    protected $courseRepository;

    protected $lessonRepository;

    protected $wordRepository;

    public function __construct(CourseRepository $courseRepository,
                                LessonRepository $lessonRepository,
                                WordRepository $wordRepository,
                                UserRepository $userRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->lessonRepository = $lessonRepository;
        $this->wordRepository = $wordRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $totalUsers = $this->userRepository->count();
        $totalCourses = $this->courseRepository->count();
        $totalLessons = $this->lessonRepository->count();
        $totalWords = $this->wordRepository->count();

        return view('admincp.dashboard', compact('totalCourses', 'totalUsers', 'totalWords', 'totalLessons'));
    }
}
