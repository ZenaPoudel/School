<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class connectionController extends Controller
{
	public function isConnect()
	{
		$response= array();
		$response['connect']='True';
		return $response;
	}

}