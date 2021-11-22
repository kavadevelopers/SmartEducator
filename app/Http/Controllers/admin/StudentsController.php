<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

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

	public function list()
	{
		$data['_title'] = 'Students';
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
		DB::table('students')->where('id',$id)->delete();
		Session::flash('success', 'Student deleted.'); 
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
				'pending_fees'			=> $rec->pending_fees?$rec->pending_fees:'',
				'noofinstalllment'		=> $rec->noofinstalllment?$rec->noofinstalllment:'',
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
				'pending_fees'			=> $rec->pending_fees?$rec->pending_fees:'',
				'noofinstalllment'		=> $rec->noofinstalllment?$rec->noofinstalllment:'',
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