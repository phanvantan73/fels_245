<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->dropColumn('lesson_id');
            $table->dropColumn('finish_time');
            $table->dropColumn('user_id');
            $table->integer('test_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('lesson_id');
            $table->dateTime('finish_time')->nullable();
            $table->dropColumn('test_answer_id');
        });
    }
}
