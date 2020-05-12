<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classId')->unsigned();
            $table->integer('studentId')->unsigned();
            $table->foreign('classId')->references('id')->on('tclasses')->onDelete('cascade');
            $table->foreign('studentId')->references('id')->on('students')->onDelete('cascade');
            $table->unique(['classId', 'studentId']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
