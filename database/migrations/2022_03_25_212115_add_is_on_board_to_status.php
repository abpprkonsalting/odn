<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsOnBoardToStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Insert some stuff
        DB::table('statuses')->insert([
            array(
                'name' => 'Non Ready',
                'code' => 'TA'
            ),
            array(
                'name' => 'Ready',
                'code' => 'LPN'
            ),
            array(
                'name' => 'On Board',
                'code' => 'EN'
            ),
            array(
                'name' => 'On Vacation',
                'code' => 'VC'
            ),
            array(
                'name' => 'Dismissed',
                'code' => 'OV'
            )
        ]
    );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status', function (Blueprint $table) {
            //
        });
    }
}
