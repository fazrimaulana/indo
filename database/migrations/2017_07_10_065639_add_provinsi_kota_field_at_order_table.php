<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProvinsiKotaFieldAtOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table){

            $table->string('buyer_province')->after('buyer_address')->nullable();
            $table->string('buyer_city')->after('buyer_province')->nullable();
            $table->string('courier')->after('buyer_city')->nullable();
            $table->string('service')->after('courier')->nullable();
            $table->string('shipping_cost')->after('service')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function(Blueprint $table){

            $table->dropColumn('buyer_province');
            $table->dropColumn('buyer_city');
            $table->dropColumn('courier');
            $table->dropColumn('service');
            $table->dropColumn('shipping_cost');

        });
    }
}
