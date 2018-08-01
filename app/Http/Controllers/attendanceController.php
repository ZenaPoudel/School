<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Attendance;
use App\Student;
use Carbon\Carbon;
//@param array $data;


class attendanceController extends Controller
{
    public function view()
    {
    	$attendance=attendance::all();
        return array('attendance_list'=>$attendance);
    }
    
    public function selectStudent(Request $request)
    {
       $response=array();      
       $student=array();
       $student=Student::select('id','student_name','class_id','section_id')->where('class_id',$request->post('class_id'))->where('section_id', $request->post('section_id'))->get();
        $response=$student;
        foreach ($student as $s) {
        $id=$s['id'];
        //dd($s->id);
        $attendance=Attendance::select('student_id','flag','date')->where('class_id',$request->post('class_id'))->where('section_id', $request->post('section_id'))->distinct('date')->get();
    $present=Attendance::select('student_id','flag','date')->where(['flag'=>1])->where(['student_id'=>$id])->distinct('date')->get();
        $total=$attendance->count();
        $s['total']=$total;
        $present=$present->count();
        $s['present']=$present;
        if (($present/$total)*100>=80) {
            $s['performance']="good";
        }
        elseif (($present/$total)*100>=50) {
            $s['performance']="average";
        }
        else{
            $s['performance']="Bad";
        }
  //$student = DB::table('students')->where(['class_id'=>$request->post('class_id')])-> where(['section_id'=>$request->post('section_id')])->select('id','student_name','class_id','section_id')->get();
        //return($student->attendances);
        //echo $total;
       // $student_id = DB::table('attendances')->where(['student_id'=>$id);
       // $present=DB::table('attendances')->select('student_id','student_name','flag','date')->where(['flag'=>"1"])->where(['student_id'=>$student_id])->distinct('date')->get();
        //$response['List']=array();
        //$present = Student::find();
 //$present->student;
       // return ($student->attendances);
       // $attendance->students($s->student_id->get());
        /*$present=DB::table('attendances')
        ->join('students',function($join){
            $join->on('attendances.student_id', '=', 'students.id')
                 ->select('student_id','student_name','flag','date')->where(['flag'=>1]);
           })->distinct('date')->count();
       /* $present=DB::table('attendances')->
        join('students','attendances.student_id','=','student.student_id')->select('student_id','student_name','flag','date')->where(['flag'=>"1"])->distinct('date')->get();*/
    }
        return array('response'=>$response);
    }
    public function add(Request $request)
    {       
    	$response=array();
        $response['insert']=false;
        $attendance = new attendance;
        $date = Carbon::parse(now())->format('Y.m.d');
        $time = Carbon::parse(now())->format('H:i:s');
        // this model represent your database table, so you can name it according to your requirement.
        //sdd(Input::all());
        $attendance->date = $date;
        $attendance->time = $time;
        $attendance->class_id = $request->post('class_id');
        $attendance->section_id = $request->post('section_id');
        $attendance->sub_id = $request->post('sub_id');
        //$attendance->student_id = $request->post('student_id');
        //$attendance->student_name = $request->post('student_name');
        $attendance->flag = $request->post('flag');
        //foreach ($std as $s) {
        // $student = DB::table('students')->select('student_id','student_name')->where(['class_id'=>$request->post('class_id')]);
        /* $student = DB::table('students')->where(['class_id'=>$request->post('class_id')])-> where(['section_id'=>$request->post('section_id')])->pluck('student_id','student_name','class_id','section_id');
         return array('students'=>$student);
        echo json_encode($response);*/

         /*return response()->json([
         'student_id' => $student->id;
         'student_name' => $student->student_name;
            ]);  */      
            //return array('students'=>$student);
            //@foreach ($student as $std) 
                
         //return \Response::json('array', $student);
          //endforeach
        //return view('view-student')->with('student', $student);
        //
        //$attendance->flag = $request->get('flag');
        //$date=date_create($request->get('date'));
        //$format = date_format($date,"Y-m-d");
        //$attendance->date = strtotime($format);
   		//$attendance->password =$request->password;
       // }
            /*
        if($attendance->save()){
          $response['insert']=true;
        }
        echo json_encode($response);
        auth()->student()->notify(new replyattendance)
        */
    }
    /* public function edit(Request $request)
    {
    	
    	$attendance = new attendance; // this model represent your database table, so you can name it according to your requirement.
    	//sdd(Input::all());
        $attendance->class_id = $request->post('class_id');
        $attendance->section_id = $request->post('section_id');
        $attendance->student_id = $request->post('student_id');
        $attendance->sub_id = $request->post('sub_id');
        $attendance->flag = $request->post('flag');
        //$attendance->flag = $request->get('flag');
        $attendance->date = $request->post('date');
        //$date=date_create($request->get('date'));
        //$format = date_format($date,"Y-m-d");
        //$attendance->date = strtotime($format);
        $attendance->time = $request->post('time');
   		//$attendance->password =$request->password;
        if($attendance->save()){
          echo "PDF_add_nameddest(pdfdoc, name, optlist)";
        }
        else{
          echo 'Unsuccess';
        } 

    }
*/
}