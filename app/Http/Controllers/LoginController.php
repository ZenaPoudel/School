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
		$response['duplicate']=false;
		$username=$request->post('user');
		$password=$request->post('pass');

		$code=$request->post('code');
		$key=$request->post('key');

		if($code=='s'){
			//if code is of student
			
			$data=student::where('student_name',$username)->where('password',$password)->first(['id','remember_token','class_id','section_id','name']);
			//selecting the specific id of the student

			if($data!=null){
				//if the data is not null returns value greater than 0
				$count=$data->count();

				if($count>0){
		
					/* if the token is null then only it is updated else it is a simply login process */
					if($data->remember_token ==null){

						$update=DB::table('students')->where('id',$data->id)->update(['remember_token'=>$key]);	
					}
					/* if the token is not null and key is not 
					matched during login then it is a duplicate user */
					if($data->remember_token!=null && $key!=$data->remember_token){
						$response['duplicate']=true;
					}

					/* enabling the session */
					$response['flag']=true;
					$response['user_id']=$data->id;
					$response['class_id']=$data->class_id;
					$response['section_id']=$data->section_id;
					$response['code']=$code;
					$response['name']=$data->name;
				}

	    	}

		}
		else if($code=='t'){
			$data=teacher::where('name',$username)->where('password',$password)->first(['id','remember_token','name','email']);

			if($data!=null){
				$count=$data->count();

				if($count>0){

					if($data->remember_token ==null){
						$update=DB::table('teachers')->where('id',$data->id)->update(['remember_token'=>$key]);
				 	}
				   if($data->remember_token!=null && $key!=$data->remember_token){
						$response['duplicate']=true;
					}

				$response['flag']=true;
				$response['user_id']=$data->id;
				$response['code']=$code;
				$response['email']=$data->email;
				$response['name']=$data->name;

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
				if($data->remember_token!=null && $key!=$data->remember_token){
						$response['duplicate']=true;
					}

				$response['flag']=true;
				$response['user_id']=$data->id;
				$response['code']=$code;
			  }

			}
		}
	   

		return $response;


	}

	public function delete(Request $request){

		$response=array();

		$response['delete']=false;

		$user_id=$request->post('id');
		$code=$request->post('code');

		if($code=='s'){
			$delete=DB::table('students')->where('id',$user_id)->update(['remember_token'=>null]);
		 
			if($delete>0) {
				$response['delete']=true;
			}

		}
		else if($code=='t'){
			$delete=DB::table('teachers')->where('id',$user_id)->update(['remember_token'=>null]);
		 
			if($delete>0) {
				$response['delete']=true;
			}
		}
		return $response;

	}
}
