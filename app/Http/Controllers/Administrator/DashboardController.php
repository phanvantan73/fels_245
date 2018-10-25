<?php

namespace App\Http\Controllers\Administrator;

use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Lesson\LessonRepositotyInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Word\WordRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $userRepository;

    protected $courseRepository;

    protected $lessonRepository;

    protected $wordRepository;

    public function __construct(UserRepositoryInterface $userRepository,
                                CourseRepositoryInterface $courseRepository,
                                LessonRepositotyInterface $lessonRepositoty,
                                WordRepositoryInterface $wordRepository)
    {
        $this->userRepository = $userRepository;
        $this->courseRepository = $courseRepository;
        $this->lessonRepository = $lessonRepositoty;
        $this->wordRepository = $wordRepository;
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
