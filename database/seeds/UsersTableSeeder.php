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
        DB::table('users')->insert([
            'name' => 'Alexey',
            'email' => 'alex310197@live.com',
            'password' => bcrypt('1234'),
            'type' => 1,
        ]);
    }
}
