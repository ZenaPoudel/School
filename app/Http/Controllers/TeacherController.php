<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Teacher;
class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function view()
    {
    	
        return view('ViewTeacher');
    }
    public function add(Request $request)
    {
    	$teacher = new Teacher; 
        $name = $teacher->name = $request->post('teacher_name');
        $teacher->email = $request->post('email');
        $teacher->post = $request->post('post');
        $teacher->password = $name.'123';
        $teacher->code='T';

        if($teacher->save())
        {
          echo "success";
        }
    }
    public function edit(Request $request)
    {
        $id = $request->post('id');
        dd($id);
        $name;
        $email;
        $post;
        /*if () {
            
        }
        else{
            <input type="text" name="teacher_id" value="{{ $id }}" style="">
            <input type="text" name="teacher_name" value="{{ $name }}">
            <input type="text" name="email" value="{{ $email }}">
            <input type="text" name="post" value="{{ $t['post'] }}">

        }*/
    }
  
}