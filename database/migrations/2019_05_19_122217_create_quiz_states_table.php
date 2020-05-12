<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_states', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('studentCode')->unsigned();
            $table->integer('testId')->unsigned();
            $table->integer('masterCode')->unsigned();
            $table->enum('state', ['0', '1']);
            $table->integer('point');
            $table->integer('falseAnswer');
            $table->integer('trueAnswer');
            $table->time('expire');
            $table->foreign('masterCode')->references('id')->on('masters')->onDelete('cascade');
            $table->foreign('testId')->references('id')->on('tests')->onDelete('cascade');
            $table->foreign('studentCode')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['studentCode', 'testId','masterCode']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_states');
    }
}
