<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVesselsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vessels', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 255);
            $table->string('code', 50);
            $table->integer('company_id')->unsigned();
            $table->integer('gross_tank')->nullable();
            $table->integer('omi_number')->nullable();
            $table->integer('active', false, true);
            $table->string('dwt', 255)->nullable();
            $table->string('engine', 255)->nullable();
            $table->integer('vessel_type_id')->unsigned();
            $table->integer('flags_id')->unsigned()->nullable();
            $table->string('machine_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('flags_id')->references('id')->on('flags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vessels');
    }
}
