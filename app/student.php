<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{

  use Notifiable;
  //protected $guard=['student', 'student_api'];
     public $timestamps=false;
      protected $fillable = [
        'id','student_name','roll_num','guardian_name','address','mobile','email','dob','age','class_id','section_id'
    ];
        protected $hidden = [
        'password', 'remember_token',
    ];

    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }
}
