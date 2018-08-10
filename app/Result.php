<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $timestamps=false;

   
      protected $fillable = [
        'class_id','section_id','student_id','sub_id','status','marks','terminal'
    ];

}
