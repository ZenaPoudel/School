<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class studentController extends Controller
{

    public function view()
    {
    	$student=student::all();
        return array('student_list'=>$student);
    }
    public function add(Request $request)
    {
    	$response=array();
    	$response['insert']=false;
    	$student = new student; 
        // this model represent your database table, so you can name it according to your requirement.
    	//sdd(Input::all());
        //$student->student_id = $request->post('student_id');
        $student->student_name = $request->post('student_name');
        $student->guardian_name = $request->post('guardian_name');
        $student->address = $request->post('address');
        $student->mobile = $request->post('mobile');
        $student->email = $request->post('email');
        $student->password = $request->post('password');
        $student->dob = $request->post('dob');
        $student->age = $request->post('age');
        $student->class_id = $request->post('class_id');
        $student->section_id = $request->post('section_id');
        //$attendance->flag = $request->get('flag');
        //$date=date_create($request->get('date'));
        //$format = date_format($date,"Y-m-d");
        //$attendance->date = strtotime($format);
   		//$attendance->password =$request->password;
       // }
        if($student->save()){
          $response['insert']=true;

        }
        echo json_encode($response);

    }
     /*public function edit(Request $request)
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
    public function test(Request $request)
    {
        $student = Student::find(1);
        return ($student->attendances);
    }
}