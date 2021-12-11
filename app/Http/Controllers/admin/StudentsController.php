<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;
use Maatwebsite\Excel\Facades\Excel;

class StudentsController extends BaseController
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

	public function uploads()
	{
		$data['_title'] = 'Upload Students Files';
		$data['list'] 	= DB::table('students')->where('uploads','1')->get();
		return view('admin.students.uploads',$data);
	}

	public function uploadsSkip()
	{
		Session::flash('success', 'Uploads are skipped.'); 
	    return Redirect($this->aUrl('/students'));	
	}

	public function uploadsSave(Request $rec)
	{
		// echo "<pre>";
		// print_r($rec->all());
		// exit;


		foreach ($rec->id as $key => $value) {
			if (isset($rec->a10th[$key])) {
		        $image = $rec->file('a10th')[$key];
		        $a10th = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $a10th)){
		        	DB::table('students')->where('id',$value)->update(['10th' => $a10th]);
		        }
		    }			
		    if (isset($rec->a12th[$key])) {
		        $image = $rec->file('a12th')[$key];
		        $a12th = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $a12th)){
		        	DB::table('students')->where('id',$value)->update(['12th' => $a12th]);
		        }
		    }	
		    if (isset($rec->idproof[$key])) {
		        $image = $rec->file('idproof')[$key];
		        $idproof = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $idproof)){
		        	DB::table('students')->where('id',$value)->update(['idproof' => $idproof]);
		        }
		    }
		    if (isset($rec->photo[$key])) {
		        $image = $rec->file('photo')[$key];
		        $photo = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $photo)){
		        	DB::table('students')->where('id',$value)->update(['photo' => $photo]);
		        }
		    }
		    if (isset($rec->ms1[$key])) {
		        $image = $rec->file('ms1')[$key];
		        $ms1 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms1)){
		        	DB::table('students')->where('id',$value)->update(['ms1' => $ms1]);
		        }
		    }	
		    if (isset($rec->ms2[$key])) {
		        $image = $rec->file('ms2')[$key];
		        $ms2 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms2)){
		        	DB::table('students')->where('id',$value)->update(['ms2' => $ms2]);
		        }
		    }	
		    if (isset($rec->ms3[$key])) {
		        $image = $rec->file('ms3')[$key];
		        $ms3 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms3)){
		        	DB::table('students')->where('id',$value)->update(['ms3' => $ms3]);
		        }
		    }
		    if (isset($rec->ms4[$key])) {
		        $image = $rec->file('ms4')[$key];
		        $ms4 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms4)){
		        	DB::table('students')->where('id',$value)->update(['ms4' => $ms4]);
		        }
		    }
		    if (isset($rec->ms5[$key])) {
		        $image = $rec->file('ms5')[$key];
		        $ms5 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms5)){
		        	DB::table('students')->where('id',$value)->update(['ms5' => $ms5]);
		        }
		    }
		    if (isset($rec->ms6[$key])) {
		        $image = $rec->file('ms6')[$key];
		        $ms6 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms6)){
		        	DB::table('students')->where('id',$value)->update(['ms6' => $ms6]);
		        }
		    }
		    if (isset($rec->migration[$key])) {
		        $image = $rec->file('migration')[$key];
		        $migration = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $migration)){
		        	DB::table('students')->where('id',$value)->update(['migration' => $migration]);
		        }
		    }
		    if (isset($rec->provisional[$key])) {
		        $image = $rec->file('provisional')[$key];
		        $provisional = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $provisional)){
		        	DB::table('students')->where('id',$value)->update(['provisional' => $provisional]);
		        }
		    }
		    if (isset($rec->degree[$key])) {
		        $image = $rec->file('degree')[$key];
		        $degree = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $degree)){
		        	DB::table('students')->where('id',$value)->update(['degree' => $degree]);
		        }
		    }	
		    if (isset($rec->transcript[$key])) {
		        $image = $rec->file('transcript')[$key];
		        $transcript = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $transcript)){
		        	DB::table('students')->where('id',$value)->update(['transcript' => $transcript]);
		        }
		    }
		    if (isset($rec->vl[$key])) {
		        $image = $rec->file('vl')[$key];
		        $vl = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $vl)){
		        	DB::table('students')->where('id',$value)->update(['vl' => $vl]);
		        }
		    }
		    if (isset($rec->scan[$key])) {
		        $image = $rec->file('scan')[$key];
		        $scan = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $scan)){
		        	DB::table('students')->where('id',$value)->update(['scan' => $scan]);
		        }
		    }			
		}

		DB::table('students')->update(['uploads' => '0']);

		Session::flash('success', 'Successfully Uploaded'); 
	    return Redirect($this->aUrl('/students'));		
	}

	public function import(Request $rec)
	{
		if($rec->hasFile('file')){
			$path = $rec->file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count()){
				// echo "<pre>";
				// print_r($data);exit;
				foreach ($data->toArray() as $key => $value) {
					$data = [
						'name'					=> $this->checkColumn($value['name']),
						'email'					=> "",
						'password'				=> "",
						'batch'					=> $this->checkColumn($value['batch']),
						'mobile'				=> $this->checkColumn($value['mobile']),
						'mobile2'				=> $this->checkColumn($value['mobile_2']),
						'mobile3'				=> $this->checkColumn($value['mobile_3']),
						'counselor'				=> $this->checkColumn($value['counselor']),
						'adfor'					=> $this->checkColumn($value['admission_for']),
						'dob'					=> $this->dateParse($value['dob']),
						'father'				=> $this->checkColumn($value['father']),
						'mother'				=> $this->checkColumn($value['mother']),
						'regno'					=> $this->checkColumn($value['reg_no.']),
						'address'				=> $this->checkColumn($value['address']),
						'total'					=> $this->checkNumColumn($value['total']),
						'paid'					=> $this->checkNumColumn($value['paid']),
						'balance'				=> $this->checkNumColumn($value['balance']),
						'pending_fees'			=> $this->checkNumColumn($value['pending_fees']),
						'noofinstalllment'		=> $this->checkNumColumn($value['no._of_installments']),
						'remarks'				=> $this->checkColumn($value['other']),
						'_problem'				=> $this->checkColumn($value['problem']),
						'10th'					=> "",
						'12th'					=> "",
						'idproof'				=> "",
						'photo'					=> "",
						'ms1'					=> "",
						'ms2'					=> "",
						'ms3'					=> "",
						'ms4'					=> "",
						'ms5'					=> "",
						'ms6'					=> "",
						'migration'				=> "",
						'provisional'			=> "",
						'degree'				=> "",
						'transcript'			=> "",
						'vl'					=> "",
						'scan'					=> "",
						'catby'					=> Session::get('AdminId'),
						'cat'					=> date('Y-m-d H:i:s')
					];
					$userId = DB::table('students')->insertGetId($data);
				}
				Session::flash('success', 'Students Imported'); 
	    		return Redirect($this->aUrl('/students/uploads'));
			}else{
				Session::flash('error', 'No Data Found in File'); 
	    		return Redirect($this->aUrl('/students'));
			}
		}else{
			Session::flash('error', 'Not a valid Excel file.'); 
	    	return Redirect($this->aUrl('/students'));
		}
	}

	public function export()
	{
		Excel::create('StudentExport-'.date('Y-m-d H:i:s'), function($excel) {	
			$excel->sheet('Data', function($sheet) {
				$sheet->cell('A1:U1',function($cell){ $cell->setFontWeight('bold'); $cell->setFontSize(14); });
				$sheet->cell('A1', function($cell) {$cell->setValue('Sr. No.');   });
				$sheet->cell('B1', function($cell) {$cell->setValue('Batch');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Name');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Mobile');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Mobile 2');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Mobile 3');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('COUNSELOR');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('ADMISSION FOR');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('DOB');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('TOTAL');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('PAID');   });
                $sheet->cell('L1', function($cell) {$cell->setValue('BALANCE');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('Pending Fees');   });
                $sheet->cell('N1', function($cell) {$cell->setValue('No. of Installments');   });
                $sheet->cell('O1', function($cell) {$cell->setValue('PROBLEM');   });
                $sheet->cell('P1', function($cell) {$cell->setValue('OTHER');   });
                $sheet->cell('Q1', function($cell) {$cell->setValue('FATHER');   });
                $sheet->cell('R1', function($cell) {$cell->setValue('MOTHER');   });
                $sheet->cell('S1', function($cell) {$cell->setValue('REG NO.');   });
                $sheet->cell('T1', function($cell) {$cell->setValue('ADDRESS');   });
                $sheet->cell('U1', function($cell) {$cell->setValue('EMAIL');   });


                $list = DB::table('students')->orderby('id','asc')->get();
                foreach($list as $key => $item) {
                	$i= $key+2;
                	$sheet->cell('A'.$i,$item->id);
					$sheet->cell('B'.$i,$item->batch);
	                $sheet->cell('C'.$i,$item->name);
	                $sheet->cell('D'.$i,$item->mobile);
	                $sheet->cell('E'.$i,$item->mobile2);
	                $sheet->cell('F'.$i,$item->mobile3);
	                $sheet->cell('G'.$i,$item->counselor);
	                $sheet->cell('H'.$i,$item->adfor);
	                $sheet->cell('I'.$i,$item->dob);
	                $sheet->cell('J'.$i,$item->total);
	                $sheet->cell('K'.$i,$item->paid);
	                $sheet->cell('L'.$i,$item->balance);
	                $sheet->cell('M'.$i,$item->pending_fees);
	                $sheet->cell('N'.$i,$item->noofinstalllment);
	                $sheet->cell('O'.$i,$item->_problem);
	                $sheet->cell('P'.$i,$item->remarks);
	                $sheet->cell('Q'.$i,$item->father);
	                $sheet->cell('R'.$i,$item->mother);
	                $sheet->cell('S'.$i,$item->regno);
	                $sheet->cell('T'.$i,$item->address);
	                $sheet->cell('U'.$i,$item->email);
                }

			});
		})->export('xlsx');
	}

	public function list()
	{
		$data['_title'] = 'Manage Students';
		$data['type'] 	= 'list';
		$data['list'] 	= DB::table('students')->orderby('id','desc')->get();
		return view('admin.students.list',$data);		
	}

	public function edit($id)
	{
		$data['_title'] = 'Edit Student';
		$data['type'] 	= 'edit';
		$data['item'] 	= DB::table('students')->where('id',$id)->first();
		return view('admin.students.list',$data);
	}

	public function view($id)
	{
		$data['_title'] = 'View Student';
		$data['type'] 	= 'view';
		$data['item'] 	= DB::table('students')->where('id',$id)->first();
		return view('admin.students.list',$data);
	}

	public function delete($id)
	{
		
		if (Session::get('AdminId') == "1") {
			DB::table('students')->where('id',$id)->delete();
			Session::flash('success', 'Student deleted.'); 	
		}else{
			DB::table('delete_approval')->insert([
				'type'	=> 'student',
				'main'	=> $id,
				'cby'	=> Session::get('AdminId'),
				'cat'		=> date('Y-m-d H:i:s')
			]);
			Session::flash('success', 'Delete Request sent to admin'); 	
		}
	    return Redirect($this->aUrl('/students'));
	}

	public function add()
	{
		$data['_title'] = 'Add Student';
		$data['type'] 	= 'add';
		return view('admin.students.list',$data);		
	}

	public function update(Request $rec)
	{
		$user = DB::table('students')->where('id','!=',$rec->id)->where('email',$rec->email)->count();
		if ($user > 0) {
			Session::flash('error', 'Email already exists'); 
	    	return redirect()->back()->withInput();
		}else{
			if ($rec->password && $rec->password != "") {
				DB::table('students')->where('id',$rec->id)->update(['password' => $rec->password]);
			}

			
			if ($rec->hasFile('10th')) {
		        $image = $rec->file('10th');
		        $a10th = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $a10th)){
		        	DB::table('students')->where('id',$rec->id)->update(['10th' => $a10th]);
		        }
		    }

			if ($rec->hasFile('12th')) {
		        $image = $rec->file('12th');
		        $a12th = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $a12th)){
		        	DB::table('students')->where('id',$rec->id)->update(['12th' => $a12th]);
		        }
		    }

			if ($rec->hasFile('idproof')) {
		        $image = $rec->file('idproof');
		        $idproof = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $idproof)){
		        	DB::table('students')->where('id',$rec->id)->update(['idproof' => $idproof]);
		        }
		    }

		    if ($rec->hasFile('photo')) {
		        $image = $rec->file('photo');
		        $photo = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $photo)){
		        	DB::table('students')->where('id',$rec->id)->update(['photo' => $photo]);
		        }
		    }

		    if ($rec->hasFile('ms1')) {
		        $image = $rec->file('ms1');
		        $ms1 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms1)){
		        	DB::table('students')->where('id',$rec->id)->update(['ms1' => $ms1]);
		        }
		    }

		    if ($rec->hasFile('ms2')) {
		        $image = $rec->file('ms2');
		        $ms2 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms2)){
		        	DB::table('students')->where('id',$rec->id)->update(['ms2' => $ms2]);
		        }
		    }

		    if ($rec->hasFile('ms3')) {
		        $image = $rec->file('ms3');
		        $ms3 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms3)){
		        	DB::table('students')->where('id',$rec->id)->update(['ms3' => $ms3]);
		        }
		    }

		    if ($rec->hasFile('ms4')) {
		        $image = $rec->file('ms4');
		        $ms4 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms4)){
		        	DB::table('students')->where('id',$rec->id)->update(['ms4' => $ms4]);
		        }
		    }

		    if ($rec->hasFile('ms5')) {
		        $image = $rec->file('ms5');
		        $ms5 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms5)){
		        	DB::table('students')->where('id',$rec->id)->update(['ms5' => $ms5]);
		        }
		    }

		    if ($rec->hasFile('ms6')) {
		        $image = $rec->file('ms6');
		        $ms6 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $ms6)){
		        	DB::table('students')->where('id',$rec->id)->update(['ms6' => $ms6]);
		        }
		    }

		    if ($rec->hasFile('migration')) {
		        $image = $rec->file('migration');
		        $migration = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $migration)){
		        	DB::table('students')->where('id',$rec->id)->update(['migration' => $migration]);
		        }
		    }

		    if ($rec->hasFile('provisional')) {
		        $image = $rec->file('provisional');
		        $provisional = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $provisional)){
		        	DB::table('students')->where('id',$rec->id)->update(['provisional' => $provisional]);
		        }
		    }

		    if ($rec->hasFile('degree')) {
		        $image = $rec->file('degree');
		        $degree = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $degree)){
		        	DB::table('students')->where('id',$rec->id)->update(['degree' => $degree]);
		        }
		    }

		    if ($rec->hasFile('transcript')) {
		        $image = $rec->file('transcript');
		        $transcript = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $transcript)){
		        	DB::table('students')->where('id',$rec->id)->update(['transcript' => $transcript]);
		        }
		    }

		    if ($rec->hasFile('vl')) {
		        $image = $rec->file('vl');
		        $vl = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $vl)){
		        	DB::table('students')->where('id',$rec->id)->update(['vl' => $vl]);
		        }
		    }

		    if ($rec->hasFile('scan')) {
		        $image = $rec->file('scan');
		        $scan = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if($image->move($destinationPath, $scan)){
		        	DB::table('students')->where('id',$rec->id)->update(['scan' => $scan]);
		        }
		    }

			$data = [
				'name'					=> $rec->name,
				'email'					=> $rec->email,
				'batch'					=> $rec->batch,
				'mobile'				=> $rec->mobile,
				'mobile2'				=> $rec->mobile2?$rec->mobile2:'',
				'mobile3'				=> $rec->mobile3?$rec->mobile3:'',
				'counselor'				=> $rec->counselor,
				'adfor'					=> $rec->adfor,
				'dob'					=> date('Y-m-d',strtotime($rec->dob)),
				'father'				=> $rec->father,
				'mother'				=> $rec->mother,
				'regno'					=> $rec->regno,
				'address'				=> $rec->address,
				'total'					=> $rec->total,
				'paid'					=> $rec->paid,
				'balance'				=> $rec->balance,
				'pending_fees'			=> $this->checkNumColumn($rec->pending_fees),
				'noofinstalllment'		=> $this->checkNumColumn($rec->noofinstalllment),
				'remarks'				=> $rec->remarks?$rec->remarks:'',
				'_problem'				=> $rec->problem?$rec->problem:''
			];
			$userId = DB::table('students')->where('id',$rec->id)->update($data);

			Session::flash('success', 'Student updated.'); 
		   	return Redirect($this->aUrl('/students'));	
		}	
	}

	public function save(Request $rec)
	{
		$user = DB::table('students')->where('email',$rec->email)->count();
		if ($user > 0) {
			Session::flash('error', 'Email already exists'); 
	    	return redirect()->back()->withInput();
		}else{

			$a10th = "";
			if ($rec->hasFile('10th')) {
		        $image = $rec->file('10th');
		        $a10th = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $a10th)){
		        	$a10th = "";
		        }
		    }

		    $a12th = "";
			if ($rec->hasFile('12th')) {
		        $image = $rec->file('12th');
		        $a12th = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $a12th)){
		        	$a12th = "";
		        }
		    }

		    $idproof = "";
			if ($rec->hasFile('idproof')) {
		        $image = $rec->file('idproof');
		        $idproof = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $idproof)){
		        	$idproof = "";
		        }
		    }

		    $photo = "";
			if ($rec->hasFile('photo')) {
		        $image = $rec->file('photo');
		        $photo = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $photo)){
		        	$photo = "";
		        }
		    }

		    $ms1 = "";
			if ($rec->hasFile('ms1')) {
		        $image = $rec->file('ms1');
		        $ms1 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $ms1)){
		        	$ms1 = "";
		        }
		    }

		    $ms2 = "";
			if ($rec->hasFile('ms2')) {
		        $image = $rec->file('ms2');
		        $ms2 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $ms2)){
		        	$ms2 = "";
		        }
		    }

		    $ms3 = "";
			if ($rec->hasFile('ms3')) {
		        $image = $rec->file('ms3');
		        $ms3 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $ms3)){
		        	$ms3 = "";
		        }
		    }

		    $ms4 = "";
			if ($rec->hasFile('ms4')) {
		        $image = $rec->file('ms4');
		        $ms4 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $ms4)){
		        	$ms4 = "";
		        }
		    }

		    $ms5 = "";
			if ($rec->hasFile('ms5')) {
		        $image = $rec->file('ms5');
		        $ms5 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $ms5)){
		        	$ms5 = "";
		        }
		    }

		    $ms6 = "";
			if ($rec->hasFile('ms6')) {
		        $image = $rec->file('ms6');
		        $ms6 = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $ms6)){
		        	$ms6 = "";
		        }
		    }

		    $migration = "";
			if ($rec->hasFile('migration')) {
		        $image = $rec->file('migration');
		        $migration = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $migration)){
		        	$migration = "";
		        }
		    }

		    $provisional = "";
			if ($rec->hasFile('provisional')) {
		        $image = $rec->file('provisional');
		        $provisional = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $provisional)){
		        	$provisional = "";
		        }
		    }

		    $degree = "";
			if ($rec->hasFile('degree')) {
		        $image = $rec->file('degree');
		        $degree = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $degree)){
		        	$degree = "";
		        }
		    }

		    $transcript = "";
			if ($rec->hasFile('transcript')) {
		        $image = $rec->file('transcript');
		        $transcript = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $transcript)){
		        	$transcript = "";
		        }
		    }

		    $vl = "";
			if ($rec->hasFile('vl')) {
		        $image = $rec->file('vl');
		        $vl = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $vl)){
		        	$vl = "";
		        }
		    }

		    $scan = "";
			if ($rec->hasFile('scan')) {
		        $image = $rec->file('scan');
		        $scan = microtime(true).'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('uploads/students/');
		        if(!$image->move($destinationPath, $scan)){
		        	$scan = "";
		        }
		    }

			$data = [
				'name'					=> $rec->name,
				'email'					=> $rec->email,
				'password'				=> $rec->password,
				'batch'					=> $rec->batch,
				'mobile'				=> $rec->mobile,
				'mobile2'				=> $rec->mobile2?$rec->mobile2:'',
				'mobile3'				=> $rec->mobile3?$rec->mobile3:'',
				'counselor'				=> $rec->counselor,
				'adfor'					=> $rec->adfor,
				'dob'					=> date('Y-m-d',strtotime($rec->dob)),
				'father'				=> $rec->father,
				'mother'				=> $rec->mother,
				'regno'					=> $rec->regno,
				'address'				=> $rec->address,
				'total'					=> $rec->total,
				'paid'					=> $rec->paid,
				'balance'				=> $rec->balance,
				'pending_fees'			=> $this->checkNumColumn($rec->pending_fees),
				'noofinstalllment'		=> $this->checkNumColumn($rec->noofinstalllment),
				'remarks'				=> $rec->remarks?$rec->remarks:'',
				'_problem'				=> $rec->problem?$rec->problem:'',
				'10th'					=> $a10th,
				'12th'					=> $a12th,
				'idproof'				=> $idproof,
				'photo'					=> $photo,
				'ms1'					=> $ms1,
				'ms2'					=> $ms2,
				'ms3'					=> $ms3,
				'ms4'					=> $ms4,
				'ms5'					=> $ms5,
				'ms6'					=> $ms6,
				'migration'				=> $migration,
				'provisional'			=> $provisional,
				'degree'				=> $degree,
				'transcript'			=> $transcript,
				'vl'					=> $vl,
				'scan'					=> $scan,
				'catby'					=> Session::get('AdminId'),
				'cat'					=> date('Y-m-d H:i:s')
			];
			$userId = DB::table('students')->insertGetId($data);
			Session::flash('success', 'Student created.'); 
		   	return Redirect($this->aUrl('/students'));		
		}
	}
}