<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListOfWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_of_words', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('word');
            $table->boolean('status'); // true: learned; false: unlearned;
            $table->dateTime('add_to_list_time');
            $table->dateTime('learn_time')->nullable();
            $table->integer('course_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_of_words');
    }
}
