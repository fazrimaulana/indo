<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmations', function(Blueprint $table){
            $table->increments('id');
            $table->bigInteger('order_id')->unsigned();
            $table->string('confirmation_name');
            $table->string('account_bank_no');
            $table->string('account_name');
            $table->text('transfer_img')->nullable();
            $table->datetime('date_transfer');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirmations');
    }
}
