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

    Route::get('/process/show-word/{id}', 'ProcessController@showWord')->name('process.show.word');

    Route::resource('profile', 'ProfileController');

    Route::resource('lessons', 'LessonController', ['only' => 'show']);

    Route::resource('tests', 'TestController', ['only' => 'store']);

    Route::group(['prefix' => '/profile'], function () {
        Route::get('/', 'ProfileController@index')->name('profile');

        Route::post('/update', 'ProfileController@update')->name('profile.update');

        Route::get('/unfollow/{id}', 'ProfileController@unfollow')->name('profile.unfollow');

        Route::post('/change-avatar', 'ProfileController@changeAvatar')->name('profile.change.avatar');

        Route::get('/show-test/{id}', 'ProfileController@showTest')->name('profile.show.test');
    });

    Route::get('/add-word/{id}/{courseId}', 'CourseController@addWordToList')->name('add.word');

    Route::get('/chart', 'ChartController@index')->name('chart');

    Route::post('/get-chart-by-date', 'ChartController@getChartByDate')->name('chart.by.date');

    Route::get('/get-chart-by-month', 'ChartController@getChartByMonth')->name('chart.by.month');

    Route::post('/get-chart-by-month', 'ChartController@postChartByMonth')->name('post.chart.by.month');

});
