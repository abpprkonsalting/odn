<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_informations_id')->unsigned();
            $table->string('company_name', 50);
            $table->integer('current', false, true);
            $table->string('vessel', 50);
            $table->date('sign_on_date');
            $table->date('sign_off_date');
            $table->integer('dtw');
            $table->integer('gross_tonnage');
            $table->integer('engine_types_id')->unsigned();
            $table->integer('bph');
            $table->integer('power_kw');
            $table->integer('ranks_id')->unsigned();
            $table->integer('flags_id')->unsigned();
            $table->decimal('total_salary');
            $table->decimal('leave_pay');
            $table->decimal('basic_salary');
            $table->decimal('fix_over_time');
            $table->integer('contract_period');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personal_informations_id')->references('id')->on('personal_informations');
            $table->foreign('engine_types_id')->references('id')->on('engine_types');
            $table->foreign('ranks_id')->references('id')->on('ranks');
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
        Schema::drop('companies');
    }
}
