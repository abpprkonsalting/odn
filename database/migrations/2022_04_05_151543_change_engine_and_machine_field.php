<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ChangeEngineAndMachineField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vessels', function (Blueprint $table) {
            $table->dropColumn('engine');
            $table->dropColumn('machine_type');
            $table->integer('engine_type_id')->unsigned();
            $table->foreign('engine_type_id')->references('id')->on('engine_types');
            $table->integer('engine_power')->nulable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
