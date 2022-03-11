<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeaGoingExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
              
      
        
        Schema::create('sea_going_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_information_id')->unsigned();
            $table->integer('rank_id')->unsigned();
            $table->integer('vessel_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('contract_time');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_information_id')->references('id')->on('personal_informations');
            $table->foreign('rank_id')->references('id')->on('ranks');
            $table->foreign('vessel_id')->references('id')->on('vessels');
            $table->foreign('status_id')->references('id')->on('statuses');


        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sea_going_experiences');
    }
}
