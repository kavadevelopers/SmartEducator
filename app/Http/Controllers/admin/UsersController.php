<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class UsersController extends BaseController
{

	public function __construct(Request $rec)
	{
		$this->middleware(function ($request, $next){
			if (!$request->session()->has('AdminId')) {
	   			return Redirect($this->aUrl('/'))->send();
			}
			return $next($request);
	   	});
	}

	public function list()
	{
		$data['_title'] = 'Admin List';	
		$data['list']	= DB::table('z_user')->where('id','!=','1')->where('df','')->orderby('id','desc')->get();
		return view('admin.users.list',$data);	
	}


	public function add()
	{
		$data['_title'] = 'Admin Add';	
		return view('admin.users.add',$data);	
	}	

	public function edit($id)
	{
		$data['_title'] = 'Edit Admin ';	
		$data['item']	= DB::table('z_user')->where('id',$id)->first();
		return view('admin.users.edit',$data);	
	}

	public function delete($id)
	{
		$data = [
			'df'		=> 	'yes'
		];

		DB::table('z_user')->where('id',$id)->update($data);	
		Session::flash('success', 'Admin deleted.'); 
	    return Redirect($this->aUrl('/users'));
	}

	public function save(Request $rec)
	{
		if (preg_match('/^\w{5,}$/', $rec->username)) {
			$user = DB::table('z_user')->where('username',$rec->username)->count();
			if ($user > 0) {
				Session::flash('error', 'Username already exists'); 
		    	return redirect()->back()->withInput();
			}else{
				$data = [
					'user_type'		=> 	'1',
					'name'			=> 	$rec->name,
					'username'		=> 	$rec->username,
					'password'		=> 	md5($rec->password),
					'email'			=> 	$rec->email,
					'mobile'		=> 	$rec->mobile,
					'gender'		=> 	"Male",
					'rights'		=> 	"",
					'df'			=> 	"",
					'block'			=> 	""
				];

				DB::table('z_user')->insert($data);
				Session::flash('success', 'Admin created.'); 
	    		return Redirect($this->aUrl('/users'));	
			}
		}else{
			Session::flash('error', 'Please enter valid username'); 
	    	return redirect()->back()->withInput();
		}
	}

	public function update(Request $rec)
	{
		if (preg_match('/^\w{5,}$/', $rec->username)) {
			$user = DB::table('z_user')->where('username',$rec->username)->where('id','!=',$rec->id)->count();
			if ($user > 0) {
				Session::flash('error', 'Username already exists'); 
		    	return redirect()->back()->withInput();
			}else{
				$data = [
					'name'			=> 	$rec->name,
					'username'		=> 	$rec->username,
					'email'			=> 	$rec->email,
					'mobile'		=> 	$rec->mobile
				];

				DB::table('z_user')->where('id',$rec->id)->update($data);

				if ($rec->pass != "") {
					$data = [
						'password'		=> 	md5($rec->password),
					];

					DB::table('z_user')->where('id',$rec->id)->update($data);					
				}

				Session::flash('success', 'Admin updated.'); 
	    		return Redirect($this->aUrl('/users'));	
			}
		}else{
			Session::flash('error', 'Please enter valid username'); 
	    	return redirect()->back()->withInput();
		}
	}
}