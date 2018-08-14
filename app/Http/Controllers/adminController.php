<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use Carbon\Carbon;
use App\Admin;
use Redirect;

//@param array $data;


class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	return view('Home');
    }

    public function addTeacher(Request $request)
    {
    	$teacher = new Teacher; 
        $name = $teacher->name = $request->post('teacher_name');
        $teacher->email = $request->post('email');
        $teacher->post = $request->post('post');
        $teacher->password = $name.'123';
        $teacher->code='T';

        if($teacher->save())
        {
          return Redirect::to('/teacher')->with('message', 'added successfully');
        }
    }
    public function viewTeacher()
    {
    	return view('ViewTeacher');
    }
    public function editTeacher($id)
    {

    	 $teacher = Teacher::find($id);
        return View('EditTeacher')
            ->with('teacher', $teacher);
        /*if () {
            
        }
        else{
            <input type="text" name="teacher_id" value="{{ $id }}" style="">
            <input type="text" name="teacher_name" value="{{ $name }}">
            <input type="text" name="email" value="{{ $email }}">
            <input type="text" name="post" value="{{ $t['post'] }}">

        }*/
    }
 public function updateTeacher(Request $request, $id)
    {
    	$teacher = Teacher::find($id);
    	$input= $request->all();
    	$update = $teacher->fill($input)->save();
    	if ($update) {
    		echo"success";
    		return view('ViewTeacher');
    	}
    }


    public function deleteTeacher($id)
    {
    	$teacher = Teacher::find($id);
    	$del= $teacher->delete();
    	if ($del) {
    		echo"success";
    		return view('ViewTeacher');
    	}
    }
    public function addStudent(Request $request)
    {
    	if($request->add == "add")
        {
    	$response=array();
    	$response['insert']=false;
    	$student = new student; 
        // this model represent your database table, so you can name it according to your requirement.
    	//sdd(Input::all());
        //$student->student_id = $request->post('student_id');
        $name= $student->student_name = $request->post('student_name');
        $student->guardian_name = $request->post('guardian_name');
        $student->roll_num = $request->post('roll');
        $student->address = $request->post('address');
        $student->mobile = $request->post('mobile');
        $student->email = $request->post('Email');
        $student->password = $request->post('password');
        $student->dob = $request->post('dob');
        $student->age = $request->post('age');
        $student->class_id = $request->post('class_id');
        $student->section_id = $request->post('section_id');
        $student->code = 's';
        $student->password = $name. '123';
        //$attendance->flag = $request->get('flag');
        //$date=date_create($request->get('date'));
        //$format = date_format($date,"Y-m-d");
        //$attendance->date = strtotime($format);
   		//$attendance->password =$request->password;
       // }
        if($student->save()){
        return Redirect::to('/student')->with('message', 'added successfully');

          
        }

    }
    else
    {
        return view('student');
  
    }
    }
    public function viewStudent()
    {
    	return view('ViewStudent');
    }
    public function editStudent($id)
    {
    	 $student = Student::find($id);
        return View('EditStudent')
            ->with('student', $student);
    	
    }
        public function updateStudent(Request $request, $id)
    {
    	$student = Student::find($id);
    	$input= $request->all();
    	$update = $student->fill($input)->save();
    	if ($update) {
    		echo"success";
    		return view('ViewStudent');
    	}
    }

    public function deleteStudent($id)
    {
    	$student = Student::find($id);
    	$del= $student->delete();
    	if ($del) {
    		echo"success";
    		return view('ViewStudent');
    	}
    }

    public function searchTeacher(Request $request)
    {
        $teacher = $request->post('searchTeacher');
        if ($teacher != "") {
            $teachers= Teacher::where('name','like','%'.$teacher.'%')->orWhere('id',$teacher)->orWhere('email','like','%'.$teacher.'%')->get();
            if (($teachers->count())> 0) {
                return View('searchedTeacher')->withDetails($teachers)->withQuery($teacher);
            }
            return View('searchedTeacher')->withMessage("No result Found");
        }
        
    }

    public function searchStudent(Request $request)
    {
        $student = $request->post('searchStudent');
        if ($student != "") {
            $students= Student::where('student_name','like','%'.$student.'%')->orWhere('id',$student)->orWhere('roll_num',$student)->orWhere('email','like','%'.$student.'%')->orWhere('email','like','%'.$student.'%')->get();
            if (($students->count())> 0) {
                return View('searchedStudent')->withDetails($students)->withQuery($student);
            }
            return View('searchedStudent')->withMessage("No result Found");
        }
    }
 
public function addClass()
    {
    	if($request->add == "add")
        {
    	$response=array();
    	$response['insert']=false;
    	$student = new student; 
        // this model represent your database table, so you can name it according to your requirement.
    	//sdd(Input::all());
        //$student->student_id = $request->post('student_id');
        $name= $student->student_name = $request->post('student_name');
        $student->guardian_name = $request->post('guardian_name');
        $student->roll_num = $request->post('roll');
        $student->address = $request->post('address');
        $student->mobile = $request->post('mobile');
        $student->email = $request->post('Email');
        $student->password = $request->post('password');
        $student->dob = $request->post('dob');
        $student->age = $request->post('age');
        $student->class_id = $request->post('class_id');
        $student->section_id = $request->post('section_id');
        $student->code = 's';
        $student->password = $name. '123';
        //$attendance->flag = $request->get('flag');
        //$date=date_create($request->get('date'));
        //$format = date_format($date,"Y-m-d");
        //$attendance->date = strtotime($format);
   		//$attendance->password =$request->password;
       // }
        if($student->save()){
          echo "added successfully";
          return view('student');
        }

    }
    else
    {
        return view('student');
  
    }
    }
    public function viewClasses()
    {
    	return view('ViewClassSection');
    }
 
}