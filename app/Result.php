<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $timestamps=false;
<<<<<<< HEAD
    //   protected $fillable = [
    //     'id','student_id','sub_id','marks','terminal'
    // ];
=======
      protected $fillable = [
        'class_id','section_id','student_id','sub_id','status','marks','terminal'
    ];
>>>>>>> fec4e04dd61d37d2550c6f4599b4f4e8ed57e968
}
