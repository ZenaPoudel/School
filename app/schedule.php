<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps=false;
      protected $fillable = [
        'id','class_id','section_id','start_time','end_time','day','sub_id','teacher_id','period'
            ];
   /* public function subjects()
    {
    	return $this->belongsTo('App\Subject');
    }
    public function teachers()
    {

    }*/
}