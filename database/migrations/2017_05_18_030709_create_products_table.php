<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table){

            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->string('name');
            $table->enum('condition', ['Baru', 'Bekas']);
            $table->string('weight');
            $table->integer('min_order')->default(1);
            $table->integer('max_order')->default(1);
            $table->string('price');
            $table->text('description');
            $table->integer('stok');
            $table->integer('view');
            $table->string('discount');
            $table->datetime('start_time_discount')->nullable();
            $table->datetime('end_time_discount')->nullable();
            $table->text('custom');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
