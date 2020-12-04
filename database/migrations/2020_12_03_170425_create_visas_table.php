<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('visa_types_id')->unsigned();
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('visa_types_id')->references('id')->on('visa_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visas');
    }
}
