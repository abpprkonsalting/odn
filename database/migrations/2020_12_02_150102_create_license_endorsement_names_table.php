<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseEndorsementNamesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license_endorsement_names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 250);
            $table->integer('license_endorsement_types_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('license_endorsement_types_id')->references('id')->on('license_endorsement_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('license_endorsement_names');
    }
}
