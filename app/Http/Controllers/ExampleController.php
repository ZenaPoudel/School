<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;


class ExampleController extends Controller
{
   
 public function add(Request $request)
    {
    	$response=array();
        $response['insert']=false;
        $admin = new Admin;
        $name=$admin->name = $request->post('name');
        $admin->email = $request->post('email');
        $admin->mobile=$request->post('mobile');
        $admin->password = bcrypt($name .'123');
        $admin->code = 'a';
        
        if($admin->save()){
        $response['insert']=true;
        }
        echo json_encode($response);
    }

}