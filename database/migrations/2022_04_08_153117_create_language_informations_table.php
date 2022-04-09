<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_informations_id')->unsigned();
            $table->integer('languages_id')->unsigned();
            $table->integer('language_skills_id')->unsigned();
            $table->integer('levels_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_informations_id')->references('id')->on('personal_informations');
            $table->foreign('languages_id')->references('id')->on('languages');
            $table->foreign('language_skills_id')->references('id')->on('language_skills');
            $table->foreign('levels_id')->references('id')->on('levels');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_informations');
    }
}
