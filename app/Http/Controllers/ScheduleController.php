<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Subject;
use App\Teacher;

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
    	//$schedule= Schedule::select('class_id','section_id','start_time','end_time','day','subject_id')->where('class_id',$request->post('class_id'))->where('section_id', $request->post('section_id'));
    	//return($schedule->subjects);
    	 $response=array();
    	  $days=array();
    	 $schedules=array();
    	 $days=Schedule::select('day')->where('class_id',$request->post('class_id'))->where('section_id', $request->post('section_id'))->distinct('day')->get();
    	 $response['response']=$days;

    	 //dd($response);
    	 foreach ($days as $d) {
    	 	$day=$d['day'];
    	 	$schedules=Schedule::where('class_id',$request->post('class_id'))->where('section_id', $request->post('section_id'))->where(['day'=>$day])->get();
         $d['schedule']=$schedules;
    	 foreach ($schedules as $schedule) {
    	 	$subject_id = $schedule['sub_id'];
    	 	$teacher_id = $schedule['teacher_id'];
    	 	$sub= Subject::where(['id'=>$subject_id])->get();
    	 	foreach ($sub as $s) {
    	 		$subject_name=$s['sub_name'];
    	 		$schedule['subject']=$subject_name;
    	 		//dd($schedules);
    	 		//$teacher_id=$s['teacher_id'];
    	 		//dd($teacher_id);
    	 		$teacher= Teacher::select('id','name')->where(['id'=>$teacher_id])->get();
    	 foreach ($teacher as $t) {
    	 	$teacher_name=$t['name'];
    	 	$schedule['teacher']=$teacher_name;
    	 	}
    	    }
    	 }
    	}
    	 return $response;
    }
}