<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id');
            $table->string('student_name');
            $table->string('guardian_name');
            $table->string('address');
            $table->integer('mobile');  
            $table->string('email')->unique();
            $table->string('password');
            $table->Date('dob');
            $table->integer('age');
            //$table->integer('created_at'); 
            $table->integer('class_id');
            $table->integer('section_id');
           // $table->foreign('class_id')
           // ->references('class_id')->on('class');
            //$table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}
