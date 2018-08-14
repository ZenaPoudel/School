<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class teacher extends Authenticatable
{

  use Notifiable;
  protected $guard= ['teacher','teacher_api'];
     public $timestamps=false;
      protected $fillable = [
        'id','name','email','code', 'post'
    ];
      protected $hidden = [
        'password'
    ];
    public function subjects()
    {
    	return $this->hasMany('App\Subject');
    }
}