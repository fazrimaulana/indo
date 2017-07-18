<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldBankAtConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('confirmations', function(Blueprint $table){

            $table->integer('bank_to')->unsigned()->after('confirmation_name');
            $table->integer('bank_from')->unsigned()->after('bank_to');

            $table->foreign('bank_to')->references('id')->on('banks')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('bank_from')->references('id')->on('banks')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('confirmations', function(Blueprint $table){

            $table->dropForeign('confirmations_bank_to_foreign');
            $table->dropForeign('confirmations_bank_from_foreign');

            $table->dropColumn('bank_to');
            $table->dropColumn('bank_from');

        });
    }
}
