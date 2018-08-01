<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('attendances', function (Blueprint $table) {
            //$table->increments('id');
            $table->increments('id');
            $table->integer('class_id');
            $table->integer('section_id');
            $table->integer('student_id');
           // $table->foreign('student_id')->references('id')->on('student');
           // $table->integer('subject_id');
            $table->integer('flag');
            $table->date('date');
            $table->TIME('time');  
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');

    }
}
