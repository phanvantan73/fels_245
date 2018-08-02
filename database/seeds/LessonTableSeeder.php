<?php

use Illuminate\Database\Seeder;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Lesson::class, 10)->create();
    }
}
