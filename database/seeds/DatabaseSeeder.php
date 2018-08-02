<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(ListOfWordsTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(RelationshipsTableSeeder::class);
        $this->call(ResultsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SocialsTableSeeder::class);
    }
}
