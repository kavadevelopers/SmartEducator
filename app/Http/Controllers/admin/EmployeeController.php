<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;
use Maatwebsite\Excel\Facades\Excel;

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
		

		if (Session::get('AdminId') == "1") {
			DB::table('z_user')->where('id',$id)->update(['df' => 'yes']);
			Session::flash('success', 'Employee deleted.'); 	
		}else{
			DB::table('delete_approval')->insert([
				'type'	=> 'employee',
				'main'	=> $id,
				'cby'	=> Session::get('AdminId'),
			]);
			Session::flash('success', 'Delete Request sent to admin'); 	
		}
	    return Redirect($this->aUrl('/employee'));
	}

	public function uploads()
	{
		$data['_title'] = 'Upload Employee Files';
		$data['list'] 	= DB::table('employee')->where('uploads','1')->get();
		return view('admin.employee.uploads',$data);
	}

	public function uploadsSave(Request $rec)
	{
		// echo "<pre>";
		// print_r($rec->all());
		// exit;


		foreach ($rec->id as $key => $value) {
			if (isset($rec->photo[$key])) {
		        $image = $rec->file('photo')[$key];
		        $photo = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/all/');
		        if($image->move($destinationPath, $photo)){
		        	DB::table('employee')->where('id',$value)->update(['photo' => $photo]);
		        }
		    }			
		    if (isset($rec->cv[$key])) {
		        $image = $rec->file('cv')[$key];
		        $cv = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/all/');
		        if($image->move($destinationPath, $cv)){
		        	DB::table('employee')->where('id',$value)->update(['cv' => $cv]);
		        }
		    }			
		    if (isset($rec->agreement[$key])) {
		        $image = $rec->file('agreement')[$key];
		        $agreement = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/all/');
		        if($image->move($destinationPath, $agreement)){
		        	DB::table('employee')->where('id',$value)->update(['agreement' => $agreement]);
		        }
		    }			
		}

		DB::table('employee')->update(['uploads' => '0']);

		Session::flash('success', 'Successfully Uploaded'); 
	    return Redirect($this->aUrl('/employee'));		
	}

	public function uploadsSkip()
	{
		Session::flash('success', 'Uploads are skipped.'); 
	    return Redirect($this->aUrl('/employee'));	
	}

	public function import(Request $rec)
	{
		if($rec->hasFile('file')){
			$path = $rec->file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count()){
				
				foreach ($data->toArray() as $key => $value) {
					$data = [
						'user_type'		=> 	'1',
						'name'			=> 	$this->checkColumn($value['name']),
						'username'		=> 	"",
						'password'		=> 	"",
						'email'			=> 	"",
						'mobile'		=> 	$this->checkColumn($value['mobile']),
						'gender'		=> 	"Male",
						'rights'		=> 	'',
						'df'			=> 	"",
						'block'			=> 	"",
						'code'			=> 	""
					];
					$userId = DB::table('z_user')->insertGetId($data);

					$data = [
						'user'					=> 	$userId,
						'photo'					=> 	"",
						'cv'					=> 	"",
						'agreement'				=> 	"",
						'name'					=> 	$this->checkColumn($value['name']),
						'email'					=> 	"",
						'mobile'				=> 	$this->checkColumn($value['mobile']),
						'emobile'				=> 	$this->checkColumn($value['emergency_mobile']),
						'dob'					=> 	$this->dateParse($value['dob']),
						'age'					=> 	$this->checkColumn($value['age']),
						'address'				=> 	$this->checkColumn($value['address']),
						'taddress'				=> 	$this->checkColumn($value['temp._address']),
						'adhar'					=> 	$this->checkColumn($value['aadhar_number']),
						'pan'					=> 	$this->checkColumn($value['pan_number']),
						'dateofjoin'			=> 	$this->dateParse($value['date_of_join']),
						'acname'				=> 	$this->checkColumn($value['ac_name']),
						'acno'					=> 	$this->checkColumn($value['ac_number']),
						'bank'					=> 	$this->checkColumn($value['bank_name']),
						'ifsc'					=> 	$this->checkColumn($value['ifsc_code']),
						'company'				=> 	$this->checkColumn($value['previous_company']),
						'bpay'					=> 	$this->checkColumn($value['basic_pay']),
						'hra'					=> 	$this->checkColumn($value['hra']),
						'sbonus'				=> 	$this->checkColumn($value['statutaory_bonous']),
						'sallo'					=> 	$this->checkColumn($value['shift_allowance']),
						'incentive'				=> 	$this->checkColumn($value['incentive']),
						'flexi'					=> 	$this->checkColumn($value['flexi_pay']),
						'pf'					=> 	$this->checkColumn($value['pf']),
						'ptax'					=> 	$this->checkColumn($value['professional_tax']),
						'lwfund'				=> 	$this->checkColumn($value['labour_welfare_fund']),
						'uanno'					=> 	$this->checkColumn($value['uan_no.']),
						'uploads'				=> '1',
						'cat'					=> 	date('Y-m-d H:i:s'),
					];
					$userId = DB::table('employee')->insertGetId($data);

				}
				Session::flash('success', 'Employees Imported'); 
	    		return Redirect($this->aUrl('/employee/uploads'));
			}else{
				Session::flash('error', 'No Data Found in File'); 
	    		return Redirect($this->aUrl('/employee'));
			}
		}else{
			Session::flash('error', 'Not a valid Excel file.'); 
	    	return Redirect($this->aUrl('/employee'));
		}
	}

	public function export()
	{
		Excel::create('EmployeeExport-'.date('Y-m-d H:i:s'), function($excel) {	
			$excel->sheet('Data', function($sheet) {

				$sheet->cell('A1:Z1',function($cell){ $cell->setFontWeight('bold'); $cell->setFontSize(14); });
				$sheet->cell('A1', function($cell) {$cell->setValue('Sr. No.');   });
				$sheet->cell('B1', function($cell) {$cell->setValue('Name');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Age');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('DOB');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Mobile');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Emergency Mobile');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('Address');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('Temp. Address');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('Aadhar Number');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('PAN Number');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('Date of Join');   });
                $sheet->cell('L1', function($cell) {$cell->setValue('A/C Name');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('A/C Number');   });
                $sheet->cell('N1', function($cell) {$cell->setValue('Bank Name');   });
                $sheet->cell('O1', function($cell) {$cell->setValue('IFSC Code');   });
                $sheet->cell('P1', function($cell) {$cell->setValue('PREVIOUS COMPANY');   });
                $sheet->cell('Q1', function($cell) {$cell->setValue('BASIC PAY');   });
                $sheet->cell('R1', function($cell) {$cell->setValue('HRA');   });
                $sheet->cell('S1', function($cell) {$cell->setValue('STATUTAORY BONOUS');   });
                $sheet->cell('T1', function($cell) {$cell->setValue('FLEXI PAY');   });
                $sheet->cell('U1', function($cell) {$cell->setValue('SHIFT ALLOWANCE');   });
                $sheet->cell('V1', function($cell) {$cell->setValue('INCENTIVE');   });
                $sheet->cell('W1', function($cell) {$cell->setValue('PF');   });
                $sheet->cell('X1', function($cell) {$cell->setValue('PROFESSIONAL TAX');   });
                $sheet->cell('Y1', function($cell) {$cell->setValue('LABOUR WELFARE FUND');   });
                $sheet->cell('Z1', function($cell) {$cell->setValue('UAN NO.');   });


                $list = DB::table('z_user')->where('id','!=','1')->where('df','')->orderby('id','asc')->get();
                foreach($list as $key => $item) {
                	$emp = DB::table('employee')->where('user',$item->id)->first();
                	$i= $key+2;
                	$sheet->cell('A'.$i,$item->id);
					$sheet->cell('B'.$i,$emp->name);
	                $sheet->cell('C'.$i,$emp->age);
	                $sheet->cell('D'.$i,$emp->dob);
	                $sheet->cell('E'.$i,$emp->mobile);
	                $sheet->cell('F'.$i,$emp->emobile);
	                $sheet->cell('G'.$i,$emp->address);
	                $sheet->cell('H'.$i,$emp->taddress);
	                $sheet->cell('I'.$i,$emp->adhar);
	                $sheet->cell('J'.$i,$emp->pan);
	                $sheet->cell('K'.$i,$emp->dateofjoin);
	                $sheet->cell('L'.$i,$emp->acname);
	                $sheet->cell('M'.$i,$emp->acno);
	                $sheet->cell('N'.$i,$emp->bank);
	                $sheet->cell('O'.$i,$emp->ifsc);
	                $sheet->cell('P'.$i,$emp->company);
	                $sheet->cell('Q'.$i,$emp->bpay);
	                $sheet->cell('R'.$i,$emp->hra);
	                $sheet->cell('S'.$i,$emp->sbonus);
	                $sheet->cell('T'.$i,$emp->flexi);
	                $sheet->cell('U'.$i,$emp->sallo);
	                $sheet->cell('V'.$i,$emp->incentive);
	                $sheet->cell('W'.$i,$emp->pf);
	                $sheet->cell('X'.$i,$emp->ptax);
	                $sheet->cell('Y'.$i,$emp->lwfund);
	                $sheet->cell('Z'.$i,$emp->uanno);
                }

			});
		})->export('xlsx');
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
						'rights'		=> 	$rec->rights?implode(',',$rec->rights):'',
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

				    if ($rec->hasFile('cv')) {
				        $image = $rec->file('cv');
				        $thumb = microtime(true).'.'.$image->getClientOriginalExtension();
				        $destinationPath = public_path('uploads/all/');
				        if($image->move($destinationPath, $thumb)){
				        	DB::table('employee')->where('user',$rec->id)->update(['cv' => $thumb]);
				        }
				    }

				    if ($rec->hasFile('agreement')) {
				        $image = $rec->file('agreement');
				        $thumb = microtime(true).'.'.$image->getClientOriginalExtension();
				        $destinationPath = public_path('uploads/all/');
				        if($image->move($destinationPath, $thumb)){
				        	DB::table('employee')->where('user',$rec->id)->update(['agreement' => $thumb]);
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
						'flexi'					=> 	$rec->flexi,
						'pf'					=> 	$rec->pf,
						'ptax'					=> 	$rec->ptax,
						'lwfund'				=> 	$rec->lwfund,
						'uanno'					=> 	$rec->uanno,
						'uploads'				=> '0'
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
						'rights'		=> 	$rec->rights?implode(',',$rec->rights):'',
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

				    $cv = "";
					if ($rec->hasFile('cv')) {
				        $image = $rec->file('cv');
				        $cv = microtime(true).'.'.$image->getClientOriginalExtension();
				        $destinationPath = public_path('uploads/all/');
				        if(!$image->move($destinationPath, $cv)){
				        	$cv = "";
				        }
				    }

				    $agreement = "";
					if ($rec->hasFile('agreement')) {
				        $image = $rec->file('agreement');
				        $agreement = microtime(true).'.'.$image->getClientOriginalExtension();
				        $destinationPath = public_path('uploads/all/');
				        if(!$image->move($destinationPath, $agreement)){
				        	$agreement = "";
				        }
				    }

					$data = [
						'user'					=> 	$userId,
						'photo'					=> 	$thumb,
						'cv'					=> 	$cv,
						'agreement'				=> 	$agreement,
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
						'flexi'					=> 	$rec->flexi,
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