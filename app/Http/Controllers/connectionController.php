<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class connectionController extends Controller
{
	public function isConnect()
	{
		$response= array();
		$response['connect']=false;
		$response['msg']='';
		try{
			DB::connection()->getpdo();
			if(DB::connection()->getDatabaseName()){
				$response['flag']=true;
				$response['msg']='db connected to '.DB::connection()->getDatabaseName();
			}
		}
		catch(\Exception $e){
				
			}
			return $response;

	}

}