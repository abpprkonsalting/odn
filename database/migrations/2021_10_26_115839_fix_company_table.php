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
            $table->dropForeign('companies_personal_informations_id_foreign');
            $table->dropForeign('companies_engine_types_id_foreign');
            $table->dropForeign('companies_ranks_id_foreign');

            $table->dropColumn('personal_informations_id');
            $table->dropColumn('engine_types_id');
            $table->dropColumn('ranks_id');
            $table->dropColumn('current');
            $table->dropColumn('vessel');
            $table->dropColumn('sign_on_date');
            $table->dropColumn('sign_off_date');
            $table->dropColumn('dtw');
            $table->dropColumn('gross_tonnage');
            $table->dropColumn('bph');
            $table->dropColumn('power_kw');
            $table->dropColumn('total_salary');
            $table->dropColumn('leave_pay');
            $table->dropColumn('basic_salary');
            $table->dropColumn('fix_over_time');
            $table->dropColumn('contract_period');

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
