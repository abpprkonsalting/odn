<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleToOtherSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('other_skills', function (Blueprint $table) {
            $table->string('certificate', 255)->after('personal_informations_id')->nullable();
            $table->string('place_or_school', 255)->after('personal_informations_id')->nullable()->change();
            $table->date('knowledge_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('other_skill', function (Blueprint $table) {
            //
        });
    }
}
