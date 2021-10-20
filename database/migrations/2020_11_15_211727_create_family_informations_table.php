<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyInformationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_informations_id')->unsigned();
            $table->string('full_name', 255);
            $table->integer('next_of_kins_id')->unsigned();
            $table->date('birth_date')->nullable();
            $table->string('family_status');
            $table->integer('same_address_as_marine', false, true);
            $table->integer('provinces_id')->nullable()->unsigned();
            $table->integer('municipalities_id')->nullable()->unsigned();
            $table->string('phone_number', 50)->nullable();
            $table->string('address', 500)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_informations_id')->references('id')->on('personal_informations');
            $table->foreign('next_of_kins_id')->references('id')->on('next_of_kins');
            $table->foreign('provinces_id')->references('id')->on('provinces');
            $table->foreign('municipalities_id')->references('id')->on('municipalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('family_informations');
    }
}
