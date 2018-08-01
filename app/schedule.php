<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps=false;
      protected $fillable = [
        'id','class_id','section_id','start_time','end_time','day','subject_id'
            ];

    public function subjects()
    {
    	return $this->belongsTo('App\Subject');
    }
    public function teachers()
    {

    }
}
