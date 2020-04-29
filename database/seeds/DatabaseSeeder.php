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
        \Illuminate\Support\Facades\DB::table('users')->insert([
                'name' => 'admin',
                'email' =>'admin@admin.com',
                'role' => 0,
                'password'=> bcrypt('123123'),
            ]
        );
    }
}
