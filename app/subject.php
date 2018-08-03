<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
	 
	public $timestamps=false;
      protected $fillable = [
        'id','class_id','section_id','sub_name','teacher_id'
    ];
   /*  public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
    public function Teachers()
    {
    	return $this->belongsTo('App\Teacher');
    } */
}