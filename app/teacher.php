<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
     public $timestamps=false;
      protected $fillable = [
        'id','name','email','sub_id'
    ];
      protected $hidden = [
        'password'
    ];
    public function subjects()
    {
    	return $this->hasMany('App\Subject');
    }
}