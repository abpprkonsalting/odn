<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseEndorsementsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license_endorsements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->integer('personal_informations_id')->unsigned();
            $table->integer('countries_id')->unsigned();
            $table->integer('license_endorsement_types_id')->unsigned();
            $table->integer('license_endorsement_names_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_informations_id')->references('id')->on('personal_informations');
            $table->foreign('countries_id')->references('id')->on('countries');
            $table->foreign('license_endorsement_types_id')->references('id')->on('license_endorsement_types');
            $table->foreign('license_endorsement_names_id')->references('id')->on('license_endorsement_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('license_endorsements');
    }
}
