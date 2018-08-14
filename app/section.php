<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $fillable = [
        'class_id','section_id','floor','block'
    ];

}
