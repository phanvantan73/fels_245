<?php

use App\Models as Models;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
*/

$factory->define(Models\User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => '12345',
        'remember_token' => str_random(10),
    ];
});

$factory->define(Models\Activity::class, function (Faker $faker) {
    return [
        'user_id' => Models\User::all()->random()->id,
        'action' => $faker->randomElement([
            'like',
            'follow',
            'learn',
        ]),
        'content' => $faker->paragraph,
        'time' => $faker->dateTime,
    ];
});

$factory->define(Models\Course::class, function (Faker $faker) {
    return [
        'course' => $faker->word,
        'image' => $faker->image('/course'),
        'description' => $faker->paragraph,
    ];
});

$factory->define(Models\Lesson::class, function (Faker $faker) {
    return [
        'lesson' => $faker->sentence,
        'course_id' => Models\Course::all()->random()->id,
        'description' => $faker->paragraph,
    ];
});

$factory->define(Models\ListOfWord::class, function (Faker $faker) {
    return [
        'user_id' => Models\User::all()->random()->id,
        'word' => $faker->word,
        'status' => $faker->boolean,
        'add_to_list_time' => $faker->dateTime,
        'learn_time' => $faker->dateTime,
        'course_id' => Models\Course::all()->random()->id,
    ];
});

$factory->define(Models\Option::class, function (Faker $faker) {
    return [
        'question_id' => Models\Question::all()->random()->id,
        'option' => $faker->word,
        'is_true' => $faker->boolean,
    ];
});

$factory->define(Models\Profile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'birthday' => $faker->date(),
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
        'avatar' => $faker->image('/avatar'),
        'user_id' => Models\User::all()->random()->id,
    ];
});

$factory->define(Models\Question::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence,
        'description' => $faker->paragraph,
        'lesson_id' => Models\Lesson::all()->random()->id,
    ];
});

$factory->define(Models\Relationship::class, function (Faker $faker) {
    return [
        'user_id' => Models\User::all()->random()->id,
        'status' => $faker->boolean,
        'follow_user_id' => Models\User::all()->random()->id,
        'follow_time' => $faker->dateTime,
    ];
});

$factory->define(Models\Result::class, function (Faker $faker) {
    return [
        'lesson_id' => Models\Lesson::all()->random()->id,
        'finish_time' => $faker->dateTime,
        'score' => $faker->numberBetween(0, 100),
        'user_id' => Models\User::all()->random()->id,
    ];
});

$factory->define(Models\Role::class, function (Faker $faker) {
    return [
        'role' => $faker->randomElement([
            'admin',
            'normal user',
            'vip user',
        ]),
    ];
});

$factory->define(Models\SocialAccount::class, function (Faker $faker) {
    return [
        'user_id' => Models\User::all()->random()->id,
        'social_id' => $faker->numberBetween(1, 3),
        'social_name' => $faker->randomElement([
            'facebook',
            'google',
            'twitter',
        ]),
    ];
});
