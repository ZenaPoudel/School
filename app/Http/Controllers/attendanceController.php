<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\attendance;
use App\student;
//@param array $data;


class attendanceController extends Controller
{
    public function view()
    {
    	$attendance=attendance::all();
        return array('attendance_list'=>$attendance);
    }

    public function remarks()
    {

    }
    public function studentList(Request $request)
    {
       $response=array();
        //$response['insert']=false;
        //$attendance = new attendance;
        //$attendance->date = $request->post('date');
        //$attendance->time = $request->post('time');
        //$attendance->class_id = $request->post('class_id');
        //$attendance->section_id = $request->post('section_id');
        //$attendance->sub_id = $request->post('sub_id');
        //foreach ($std as $s) {
         $student = DB::table('students')->where(['class_id'=>$request->post('class_id')])->pluck('student_id','student_name','class_id');
        // $categories = Category::all()->pluck('name', 'id');
         //BranchModel::whereIn("user_id", function ($query) use ($name) {
    //$query->select("id")

         /*return response()->json([
         'student_id' => $student->id;
         'student_name' => $student->student_name;
            ]);  */      
            return array('students'=>$student);
        echo json_encode($response);

    }
    public function add(Request $request)
    {
    	$response=array();
        //$response['insert']=false;
        $attendance = new attendance; 
        // this model represent your database table, so you can name it according to your requirement.
        //sdd(Input::all());
        /*
        $attendance->date = $request->post('date');
        $attendance->time = $request->post('time');
        $attendance->class_id = $request->post('class_id');
        $attendance->section_id = $request->post('section_id');
        $attendance->sub_id = $request->post('sub_id');*/
        //foreach ($std as $s) {
        // $student = DB::table('students')->select('student_id','student_name')->where(['class_id'=>$request->post('class_id')]);
         $student = DB::table('students')->where(['class_id'=>$request->post('class_id')])-> where(['section_id'=>$request->post('section_id')])->pluck('student_id','student_name','class_id','section_id');
         return array('students'=>$student);
        echo json_encode($response);

         /*return response()->json([
         'student_id' => $student->id;
         'student_name' => $student->student_name;
            ]);  */      
            //return array('students'=>$student);
            //@foreach ($student as $std) 
                
         //return \Response::json('array', $student);
          //endforeach
        //return view('view-student')->with('student', $student);
        //$attendance->student_id = $request->post('student_id');
       // $attendance->student_name = $request->post('student_name');
       // $attendance->flag = $request->post('flag');
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