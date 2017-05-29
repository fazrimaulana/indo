<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldTransactionMethodIdAtOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table){

            $table->integer('transaction_method_id')->after('id')->unsigned();

            $table->foreign('transaction_method_id')->references('id')->on('transaction_methods');

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

            $table->dropForeign('orders_transaction_method_id_foreign');

            $table->dropColumn('transaction_method_id');

        });
    }
}
