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
            'name' => 'xexda',
            'email' => 'xexda@gmail.com',
            'password' => bcrypt('xexda123'),
            'image'   =>'balram.jpg',
        ]);
    }
}
