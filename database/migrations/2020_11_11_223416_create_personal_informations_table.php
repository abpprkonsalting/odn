<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('internal_file_number', 250);
            $table->string('external_file_number', 250);
            $table->string('full_name', 250)->nullable();
            $table->string('id_number', 250)->nullable();
            $table->string('serial_number', 250)->nullable();
            $table->date('birthday')->nullable();
            $table->string('birthplace', 250)->nullable();
            $table->string('address', 500)->nullable();
            $table->string('principal_phone', 250)->nullable();
            $table->string('secondary_phone', 250)->nullable();
            $table->string('cell_phone', 250)->nullable();
            $table->text('relevant_action')->nullable();
            $table->string('skin_color', 25)->nullable();
            $table->string('sex', 25)->nullable();
            $table->integer('height');
            $table->integer('weight');
            $table->string('particular_sings', 250)->nullable();
            $table->string('email', 250)->nullable();
            $table->integer('province_id')->unsigned();
            $table->integer('municipality_id')->unsigned();
            $table->integer('political_integration_id')->unsigned();
            $table->integer('eyes_color_id')->unsigned();
            $table->integer('hair_color_id')->unsigned();
            $table->integer('marital_status_id')->unsigned();
            $table->integer('school_grade_id')->unsigned();
            $table->string('avatar', 250)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('municipality_id')->references('id')->on('municipalities');
            $table->foreign('political_integration_id')->references('id')->on('political_integrations');
            $table->foreign('eyes_color_id')->references('id')->on('eyes_colors');
            $table->foreign('hair_color_id')->references('id')->on('hair_colors');
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses');
            $table->foreign('school_grade_id')->references('id')->on('school_grades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personal_informations');
    }
}
