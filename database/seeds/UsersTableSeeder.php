<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'username' => 'admin01',
            'password' => '12345',
            'email' => 'jake1@gmail.com'
        ]);
        factory(App\Models\User::class, 5)->create();
    }
}
