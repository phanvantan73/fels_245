<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', 'WelcomeController', ['only' => 'index']);

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::resource('/home', 'HomeController', ['only' => 'index', 'names' => [
        'index' => 'home',
    ]]);

    Route::resource('courses', 'CourseController', ['only' => [
        'index',
        'show',
    ]]);

    Route::get('/process', 'ProcessController@index')->name('process');

    Route::get('/process/learn-word/{id}', 'ProcessController@learnWord')->name('process.learn.word');

    Route::get('/process/delete-word/{id}', 'ProcessController@deleteWord')->name('process.delete.word');

    Route::resource('profile', 'ProfileController');

    Route::resource('lessons', 'LessonController', ['only' => 'show']);

    Route::resource('tests', 'TestController', ['only' => 'store']);

});
