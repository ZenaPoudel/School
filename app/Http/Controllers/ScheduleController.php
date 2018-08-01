<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function view()
    {
    	$schedule=Schedule::all();
        return array('schedule_list'=>$schedule);
    }
 public function add(Request $request)
    {
    	$response=array();
        $response['insert']=false;
        $schedule = new schedule;
        $schedule->class_id = $request->post('class_id');
        $schedule->section_id = $request->post('section_id');
        $schedule->start_time=$request->post('start_time');
        $schedule->end_time = $request->post('end_time');
        $schedule->day = $request->post('day');
        $schedule->sub_id = $request->post('sub_id');
         if($schedule->save()){
          $response['insert']=true;

        }
        echo json_encode($response);
    }
    public function ViewByClass(Request $request)
    {
    	$schedule= Schedule::where('class_id',$request->post('class_id'))->where('section_id', $request->post('section_id'));
    	return($schedule->subjects);
    }
}
