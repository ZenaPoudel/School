<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marks extends Model
{
    public $timestamps=false;
      protected $fillable = [
        'id','sub_id','total_marks'
    ];
}
