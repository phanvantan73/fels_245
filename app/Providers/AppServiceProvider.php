<?php

namespace App\Providers;

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
            \App\Repositories\Course\CourseRepository::class,
            \App\Repositories\Course\CourseEloquent::class
        );
        $this->app->singleton(
            \App\Repositories\Lesson\LessonRepository::class,
            \App\Repositories\Lesson\LessonEloquent::class
        );
        $this->app->singleton(
            \App\Repositories\Question\QuestionRepository::class,
            \App\Repositories\Question\QuestionEloquent::class
        );
        $this->app->singleton(
            \App\Repositories\User\UserRepository::class,
            \App\Repositories\User\UserEloquent::class
        );
        $this->app->singleton(
            \App\Repositories\Word\WordRepository::class,
            \App\Repositories\Word\WordEloquent::class
        );
        $this->app->singleton(
            \App\Repositories\Role\RoleRepository::class,
            \App\Repositories\Role\RoleEloquent::class
        );
    }
}
