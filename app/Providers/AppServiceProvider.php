<?php

namespace App\Providers;

use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Lesson\LessonRepositotyInterface;
use App\Repositories\Word\WordRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Course\CourseRepositoryInterface::class,
            \App\Repositories\Course\CourseEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Lesson\LessonRepositotyInterface::class,
            \App\Repositories\Lesson\LessonEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Word\WordRepositoryInterface::class,
            \App\Repositories\Word\WordEloquentRepository::class
        );
    }
}
