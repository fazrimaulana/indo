<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table){

            $table->bigIncrements('id');
            $table->string('buyer_name');
            $table->string('buyer_email');
            $table->string('buyer_phone_number');
            $table->text('buyer_address');
            $table->enum('order_status', ['Menunggu Pembayaran', 'Konfirmasi Pembayaran', 'Selesai']);
            $table->bigInteger('total');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
