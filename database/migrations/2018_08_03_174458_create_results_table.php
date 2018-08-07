<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
                 $table->integer('student_id');
            $table->string('sub_id');
                $table->integer('marks');
            $table->integer('status');
            $table->integer('terminal');
        });
            //$table->integer('class_id');
            //$table->integer('section_id');
       
            // $table->integer('Total_marks');
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
