<?php
namespace App\Http\Controllers\Auth;
use Auth;
use validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;

class adminLoginController extends Controller
{
    
	public function __construct()
	{
		$this->middleware('guest:admin')->except('logout');

	}
    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }
    public function login( Request $request)
    {
    	//validate
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password'=>'required|min:6'
    	]);
    	$data = array(
            'email' =>$request->post('email'),
            'password' => $request->post('password')
        );
    	if(Auth::guard('admin')->attempt($data)){
    		//echo "success";
    		return redirect()->intended(url('/admin'));

    	}
    	else{
    	echo "unsuccess";
    	return redirect()->back()->withInput($request->only('email','remember'));
    }
}
//protected $redirectLogoutTo = '/admin/login';




    }

