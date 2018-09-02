<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditListOfWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('list_of_words')) {
            Schema::table('list_of_words', function (Blueprint $table) {
                $table->dropColumn('word');
                $table->dropColumn('course_id');
                $table->integer('word_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (hasTable('list_of_words')) {
            Schema::table('list_of_words', function (Blueprint $table) {
                $table->dropColumn('word_id');
                $table->string('word')->nullable();
                $table->integer('course_id')->nullable();
            });
        }
    }
}
