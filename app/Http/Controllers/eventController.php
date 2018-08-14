<?php

namespace App\Http\Controllers;
use App\event;

use Illuminate\Http\Request;

class eventController extends Controller
{
    //

    public function event(){

    	$event=event::all();
    	return array('event_list'=>$event);
    }
}
