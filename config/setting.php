<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 17/08/2018
 * Time: 08:22
 */
return [
    'paginate' => 6,
    'popular_courses' => 3,
    'activities' => 10,
    'images' => [
        'logo' => 'images/logo.png',
        'slider_background' => 'images/slider_background.jpg',
        'course_img' => 'images/courses/',
        'online_courses' => 'images/earth-globe.svg',
        'our_library' => 'images/books.svg',
        'our_event' => 'images/envelope.svg',
        'event_img' => '',
        'lesson_background' => 'images/lesson_bgd.jpg',
        'profile_img' => 'images/profiles/',
        'word_img' => 'images/words/',
    ],
    'audios' => [
        'word_audio' => 'audios/words/',
    ],
    'limit_questions' => 5,
    'default' => [
        'correct_option' => 1,
        'incorrect_option' => 0,
        'score' => 20,
        'learned' => 1,
        'unlearned' => 0,
        'follower' => 0,
        'following' => 1,
        'limit_activities' => 5,
        'paginate_tests' => 5,
        'date' => 'date',
        'month' => 'month',
        'today' => today(),
        'add_date' => '-01',
        'ad_mail' => 'admin@gmail.com',
        'zero' => 0,
        'start_remind_time' => 7,
        'end_remind_time' => 19,
        'ad_role' => 1,
        'user_role' => 3,
        'profile' => [
            'first_name' => 'first name',
            'last_name' => 'last name',
            'birthday' => '2000-06-20',
            'address' => 'Da Nang',
            'phone_number' => '12345',
            'avatar' => 'profile_1.jpg',
        ]
    ],

];
