<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class EmployeeController extends BaseController
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
		$data['_title'] = 'Employees';
		$data['type'] 	= 'list';
		$data['list'] 	= DB::table('z_user')->where('id','!=','1')->where('df','')->orderby('id','desc')->get();
		return view('admin.employee.list',$data);	
	}

	public function add()
	{
		$data['_title'] = 'Add Employee';
		$data['type'] 	= 'add';
		return view('admin.employee.list',$data);	
	}

	public function view($id)
	{
		$data['_title'] = 'View Employee';
		$data['type'] 	= 'view';
		$data['user'] 	= DB::table('z_user')->where('id',$id)->first();
		$data['item'] 	= DB::table('employee')->where('user',$id)->first();
		return view('admin.employee.list',$data);
	}

	public function edit($id)
	{
		$data['_title'] = 'Edit Employee';
		$data['type'] 	= 'edit';
		$data['user'] 	= DB::table('z_user')->where('id',$id)->first();
		$data['item'] 	= DB::table('employee')->where('user',$id)->first();
		return view('admin.employee.list',$data);
	}

	public function delete($id)
	{
		DB::table('z_user')->where('id',$id)->update(['df' => 'yes']);
		Session::flash('success', 'Employee deleted.'); 
	    return Redirect($this->aUrl('/employee'));
	}

	public function update(Request $rec)
	{
		if (preg_match('/^\w{5,}$/', $rec->username)) {
			$user = DB::table('z_user')->where('id','!=',$rec->id)->where('username',$rec->username)->count();
			if ($user > 0) {
				Session::flash('error', 'Username already exists'); 
		    	return redirect()->back()->withInput();
			}else{
				$user = DB::table('z_user')->where('id','!=',$rec->id)->where('email',$rec->email)->count();
				if ($user > 0) {
					Session::flash('error', 'Email already exists'); 
		    		return redirect()->back()->withInput();	
				}else{

					$data = [
						'name'			=> 	$rec->name,
						'username'		=> 	$rec->username,
						'email'			=> 	$rec->email,
						'mobile'		=> 	$rec->mobile,
						'rights'		=> 	implode(',',$rec->rights)
					];
					DB::table('z_user')->where('id',$rec->id)->update($data);

					if ($rec->hasFile('photo')) {
				        $image = $rec->file('photo');
				        $thumb = microtime(true).'.'.$image->getClientOriginalExtension();
				        $destinationPath = public_path('uploads/all/');
				        if($image->move($destinationPath, $thumb)){
				        	DB::table('employee')->where('user',$rec->id)->update(['photo' => $thumb]);
				        }
				    }

				    if ($rec->password && $rec->password != "") {
				    	DB::table('z_user')->where('id',$rec->id)->update(['password' => md5($rec->password)]);
				    }

				    $data = [
						'name'					=> 	$rec->name,
						'email'					=> 	$rec->email,
						'mobile'				=> 	$rec->mobile,
						'emobile'				=> 	$rec->emobile?$rec->emobile:'',
						'dob'					=> 	date('Y-m-d',strtotime($rec->dob)),
						'age'					=> 	$rec->age,
						'address'				=> 	$rec->address,
						'taddress'				=> 	$rec->taddress?$rec->taddress:'',
						'adhar'					=> 	$rec->adhar,
						'pan'					=> 	$rec->pan?$rec->pan:'',
						'dateofjoin'			=> 	date('Y-m-d',strtotime($rec->dateofjoin)),
						'acname'				=> 	$rec->acname,
						'acno'					=> 	$rec->acno,
						'bank'					=> 	$rec->bank,
						'ifsc'					=> 	$rec->ifsc,
						'company'				=> 	$rec->company,
						'bpay'					=> 	$rec->bpay,
						'hra'					=> 	$rec->hra,
						'sbonus'				=> 	$rec->sbonus,
						'sallo'					=> 	$rec->sallo,
						'incentive'				=> 	$rec->incentive,
						'pf'					=> 	$rec->pf,
						'ptax'					=> 	$rec->ptax,
						'lwfund'				=> 	$rec->lwfund,
						'uanno'					=> 	$rec->uanno
					];
					DB::table('employee')->where('user',$rec->id)->update($data);

					Session::flash('success', 'Employee updated.'); 
		    		return Redirect($this->aUrl('/employee'));	

				}
			}
		}else{
			Session::flash('error', 'Please enter valid username'); 
	    	return redirect()->back()->withInput();
		}

	}

	public function save(Request $rec)
	{
		if (preg_match('/^\w{5,}$/', $rec->username)) {
			$user = DB::table('z_user')->where('username',$rec->username)->count();
			if ($user > 0) {
				Session::flash('error', 'Username already exists'); 
		    	return redirect()->back()->withInput();
			}else{
				$user = DB::table('z_user')->where('email',$rec->email)->count();
				if ($user > 0) {
					Session::flash('error', 'Email already exists'); 
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
						'rights'		=> 	implode(',',$rec->rights),
						'df'			=> 	"",
						'block'			=> 	"",
						'code'			=> 	""
					];
					$userId = DB::table('z_user')->insertGetId($data);

					$thumb = "";
					if ($rec->hasFile('photo')) {
				        $image = $rec->file('photo');
				        $thumb = microtime(true).'.'.$image->getClientOriginalExtension();
				        $destinationPath = public_path('uploads/all/');
				        if(!$image->move($destinationPath, $thumb)){
				        	$thumb = "";
				        }
				    }

					$data = [
						'user'					=> 	$userId,
						'photo'					=> 	$thumb,
						'name'					=> 	$rec->name,
						'email'					=> 	$rec->email,
						'mobile'				=> 	$rec->mobile,
						'emobile'				=> 	$rec->emobile?$rec->emobile:'',
						'dob'					=> 	date('Y-m-d',strtotime($rec->dob)),
						'age'					=> 	$rec->age,
						'address'				=> 	$rec->address,
						'taddress'				=> 	$rec->taddress?$rec->taddress:'',
						'adhar'					=> 	$rec->adhar,
						'pan'					=> 	$rec->pan?$rec->pan:'',
						'dateofjoin'			=> 	date('Y-m-d',strtotime($rec->dateofjoin)),
						'acname'				=> 	$rec->acname,
						'acno'					=> 	$rec->acno,
						'bank'					=> 	$rec->bank,
						'ifsc'					=> 	$rec->ifsc,
						'company'				=> 	$rec->company,
						'bpay'					=> 	$rec->bpay,
						'hra'					=> 	$rec->hra,
						'sbonus'				=> 	$rec->sbonus,
						'sallo'					=> 	$rec->sallo,
						'incentive'				=> 	$rec->incentive,
						'pf'					=> 	$rec->pf,
						'ptax'					=> 	$rec->ptax,
						'lwfund'				=> 	$rec->lwfund,
						'uanno'					=> 	$rec->uanno,
						'cat'					=> 	date('Y-m-d H:i:s'),
					];
					$userId = DB::table('employee')->insertGetId($data);

					Session::flash('success', 'Employee created.'); 
		    		return Redirect($this->aUrl('/employee'));	
				}
			}
		}else{
			Session::flash('error', 'Please enter valid username'); 
	    	return redirect()->back()->withInput();
		}
	}
}