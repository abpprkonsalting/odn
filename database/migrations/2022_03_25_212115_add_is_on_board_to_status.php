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
                'code' => 'R'
            ),
            array(
                'name' => 'Ready',
                'code' => 'OB'
            ),
            array(
                'name' => 'On Board',
                'code' => 'NR'
            ),
            array(
                'name' => 'On Vacation',
                'code' => 'D'
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
