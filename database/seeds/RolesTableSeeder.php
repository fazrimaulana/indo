<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([

        		"name" => "root",
        		"display_name" => "Root",
        		"description" => "Developer"

        	]);

        DB::table('roles')->insert([

                "name" => "admin",
                "display_name" => "Administrator",
                "description" => "Administrator"

            ]);

        DB::table('roles')->insert([

                "name" => "customer",
                "display_name" => "Customer",
                "description" => "Customer"

            ]);

    }
}
