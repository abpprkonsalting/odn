<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FixCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('company_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('code', 255);
            $table->timestamps();
            $table->softDeletes();
        });

        // Insert some stuff
        DB::table('company_type')->insert([
                array(
                    'title' => 'NACIONAL',
                    'code' => 'N'
                ),
                array(
                    'title' => 'EXTRANJERA',
                    'code' => 'E'
                ),
                array(
                    'title' => 'MIXTA',
                    'code' => 'M'
                )
            ]
        );

        Schema::create('company_mission', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->timestamps();
            $table->softDeletes();
        });

        // Insert some stuff
        DB::table('company_mission')->insert(
            [
                array(
                    'title' => 'MERCANTE'
                ),
                array(
                    'title' => 'CRUCERO'
                ),
                array(
                    'title' => 'YATE'
                ),
                array(
                    'title' => 'PESCA'
                )
            ]
        );



        Schema::table('companies', function (Blueprint $table) {
            $table->string('company_name', 500)->nullable()->change();
            $table->string('code', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->text('contact', 255)->nullable();
            $table->integer('company_type_id')->unsigned();
            $table->integer('company_mission_id')->unsigned();

            $table->foreign('company_type_id')->references('id')->on('company_type');
            $table->foreign('company_mission_id')->references('id')->on('company_mission');

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
