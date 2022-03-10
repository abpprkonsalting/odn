<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCourseTableToImport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('courses_provinces_id_foreign');
            $table->dropColumn('provinces_id');
            $table->dropColumn('issue_date');
            $table->integer('country_id')->after('course_numbers_id')->unsigned();
            $table->date('start_date')->after('country_id')->nullable();
            $table->date('end_date')->after('start_date')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('import', function (Blueprint $table) {
            //
        });
    }
}
