<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoreExperienciesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shore_experiencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 250);
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->integer('personal_informations_id')->unsigned();
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
        Schema::drop('shore_experiencies');
    }
}
