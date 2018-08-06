<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->string('id');
            $table->String('sub_name');
            //$table->integer('teacher_id');
            //$table->time('time');
            //$table->timestamps();
            $table->integer('class_id');//jasai subjectid unique hunxa
            //$table->integer('section_id');//Harek section ma eutai ta padxa

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}

