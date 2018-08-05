<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use App\teacher;
use App\admin;
use DB;

class LoginController extends Controller
{
    //

   public function login(Request $request){

		$response=array();

		$response['flag']=false;
		$username=$request->post('user');
		$password=$request->post('pass');

		$code=$request->post('code');
		$key=$request->post('key');

		if($code=='s'){
			//if code is of student
			
			$data=student::where('student_name',$username)->where('password',$password)->first(['id','remember_token','class_id','section_id']);
			//selecting the specific id of the student

			if($data!=null){

				$count=$data->count();

				if($count>0){
		
					/* if the token is null then only it is updated else it is a simply login process */
					if($data->remember_token ==null){

						$update=DB::table('students')->where('id',$data->id)->update(['remember_token'=>$key]);	
					}
						/* enabling the session */
					$response['flag']=true;
					$response['user_id']=$data->id;
					$response['class_id']=$data->class_id;
					$response['section_id']=$data->section_id;
				}

	    	}

		}
		else if($code=='t'){
			$data=teacher::where('username',$username)->where('password',$password)->first(['id']);

			if($data!=null){
				$count=$data->count();

				if($count>0){

					if($data->remember_token ==null){
						$update=DB::table('teachers')->where('id',$data->id)->update(['remember_token'=>$key]);
				 }

				$response['flag']=true;
				$response['user_id']=$data->id;
			}
		}
			
	}
		else if($code=='a'){
			$data=admin::where('username',$username)->where('password',$password)->first(['id']);
			if($data!=null){
			$count=$data->count();

			if($count>0){

				if($data->remember_token ==null){
					$update=DB::table('admin')->where('id',$data->id)->update(['remember_token'=>$key]);
					
				}

				$response['flag']=true;
				$response['user_id']=$data->id;
			  }

			}
		}
	   

		return $response;


	}
}
