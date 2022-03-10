<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherSkillsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_informations_id')->unsigned();
            //$table->string('skill_or_knowledge', 50);
            $table->string('place_or_school', 50);
            $table->date('knowledge_date');
            $table->integer('empirical', false, true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_informations_id')->references('id')->on('personal_informations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('other_skills');
    }
}
