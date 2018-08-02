<?php

use Illuminate\Database\Seeder;

class ListOfWordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ListOfWord::class, 10)->create();
    }
}
