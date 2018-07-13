<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
     public $timestamps=false;
      protected $fillable = [
        'student_id','student_name','guardian_name','address','mobile','email','password','dob','age','class_id','section_id'
    ];
}
