<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyToPersonalInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_informations', function (Blueprint $table) {
            //$table->integer('companies_id');
            $table->foreignId('companies_id')->nullable()->references('id')
            ->on('companies')
            ->onDelete('SET NULL');
;        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_informations', function (Blueprint $table) {
            //
        });
    }
}
