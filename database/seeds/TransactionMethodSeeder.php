<?php

use Illuminate\Database\Seeder;

class TransactionMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_methods')->insert([
        		"name" => "Transfer",
        		"description" => "Metode Pembayaran dengan cara Transfer ke salah satu Bank milik Indowebster"
        	]);

        DB::table('transaction_methods')->insert([
        		"name" => "Indomaret",
        		"description" => "Metode Pembayaran dengan cara melakukan pembayaran di Indomaret"
        	]);

        DB::table('transaction_methods')->insert([
        		"name" => "Alfamart",
        		"description" => "Metode Pembayaran dengan cara melakukan pembayaran di Alfamart"
        	]);

    }
}
