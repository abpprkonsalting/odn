<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNreFieldToVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visas', function (Blueprint $table) {
            $table->integer('passports_id')->unsigned();
            $table->foreign('passports_id')->references('id')->on('passports');
            $table->integer('countries_id')->unsigned();
            $table->foreign('countries_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visas', function (Blueprint $table) {
            //
        });
    }
}
