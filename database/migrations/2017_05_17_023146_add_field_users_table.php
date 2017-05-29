<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){

            $table->string('username')->after('id');
            $table->date('date_of_birth')->after('name')->nullable();
            $table->enum('gender', ['laki-laki', 'perempuan'])->after('date_of_birth');
            $table->string('no_hp')->after('gender')->nullable();
            $table->string('photo')->after('password')->nullable();
            $table->text('address')->after('photo')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){

            $table->dropColumn('username');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('gender');
            $table->dropColumn('no_hp');
            $table->dropColumn('photo');
            $table->dropColumn('address');

        });
    }
}
