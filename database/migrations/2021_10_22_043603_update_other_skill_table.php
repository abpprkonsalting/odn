<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOtherSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('other_skills', function (Blueprint $table) {
            $table->dropColumn('skill_or_knowledge');
            $table->bigInteger('skill_or_knowledge_id')->after('personal_informations_id');
            $table->foreign('skill_or_knowledge_id')->references('id')->on('skill_or_knowledges');
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
