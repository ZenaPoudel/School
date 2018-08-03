<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
	 
	public $timestamps=false;
      protected $fillable = [
        'id','sub_name'
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