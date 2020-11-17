<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_informations_id')->unsigned();
            $table->integer('course_numbers_id')->unsigned();
            $table->integer('provinces_id')->unsigned();
            $table->date('issue_date');
            $table->string('certificate_number', 50);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_informations_id')->references('id')->on('personal_informations');
            $table->foreign('course_numbers_id')->references('id')->on('course_numbers');
            $table->foreign('provinces_id')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
