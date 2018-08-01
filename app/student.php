<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	//use Notifiable;
     public $timestamps=false;
      protected $fillable = [
        'id','student_name','guardian_name','address','mobile','email','dob','age','class_id','section_id'
    ];
        protected $hidden = [
        'password', 'remember_token',
    ];

    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }
}
