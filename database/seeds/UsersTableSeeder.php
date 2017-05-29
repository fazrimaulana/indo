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

        		"username" => "fazrimaulana",
        		"name" => "Fazri Maulana",
        		"gender" => "laki-laki",
        		"email" => "fm.fazri.m@gmail.com",
        		"password" => bcrypt("123456")

        	]);
    }
}
