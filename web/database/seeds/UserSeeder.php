<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('123123')
        ]);
    }
}
