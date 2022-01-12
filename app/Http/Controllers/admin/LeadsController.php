<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;
use Response;
use Maatwebsite\Excel\Facades\Excel;

class LeadsController extends BaseController
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

	public function referenceDel($id)
	{
		$data = [
	    	'df'		=> "yes"
	    ];
	    DB::table('manage_reference')->where('id',$id)->update($data);

	    Session::flash('success', 'Reference deleted.');
	    return Redirect()->back();
	}

	public function reference()
	{
		$data['_title'] = 'Manage Reference';
		$data['list'] 	= DB::table('manage_reference')->where('df','')->get();
		$data['_e']		= 0;
		return view('admin.leads.reference',$data);
	}

	public function edit_reference($id)
	{
		$data['_title'] = 'Manage Reference';
		$data['list'] 	= DB::table('manage_reference')->where('df','')->get();
		$data['item'] 	= DB::table('manage_reference')->where('id',$id)->first();
		$data['_e']		= 1;
		return view('admin.leads.reference',$data);
	}

	public function update_reference(Request $rec)
	{
		$data = [
	    	'name'		=> $rec->name
	    ];
	    DB::table('manage_reference')->where('id',$rec->id)->update($data);

	    Session::flash('success', 'Reference updated.');
	    return Redirect($this->aUrl('/reference'));
	}

	public function save_reference(Request $rec)
	{
		$data = [
	    	'name'		=> $rec->name,
	    	'df'		=> ""
	    ];
	    DB::table('manage_reference')->insert($data);

	    Session::flash('success', 'Reference created.');
	    return Redirect()->back();
	}

	public function assign(Request $rec)
	{
		DB::table('leads')->whereIn('id',explode(',', $rec->leads))->update(['cby' => $rec->employee]);

		Session::flash('success', 'Employee Assigned');
	    return Redirect()->back();
	}

	public function export()
	{
		Excel::create('LeadsExport-'.date('Y-m-d H:i:s'), function($excel) {
			$excel->sheet('Data', function($sheet) {
				$sheet->cell('A1:M1',function($cell){ $cell->setFontWeight('bold'); $cell->setFontSize(14); });
				$sheet->cell('A1', function($cell) {$cell->setValue('Sr. No.');   });
				$sheet->cell('B1', function($cell) {$cell->setValue('Status');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Name');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Mobile');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Email');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Address');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('Previous Qualification');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('Year of Passing');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('Enquiry For');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('DOB');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('Age');   });
                $sheet->cell('L1', function($cell) {$cell->setValue('Reference');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('Remarks');   });

                if(Session::get('AdminId') == "1"){
					$list 	= DB::table('leads')->orderby('id','asc')->get();
				}else{
					$list 	= DB::table('leads')->orderby('id','asc')->where('cby',Session::get('AdminId'))->get();
				}

				foreach($list as $key => $item) {
					$i= $key+2;
					$sheet->cell('A'.$i, $item->id);
					$sheet->cell('B'.$i, $item->status);
	                $sheet->cell('C'.$i, $item->name);
	                $sheet->cell('D'.$i, $item->mobile);
	                $sheet->cell('E'.$i, $item->email);
	                $sheet->cell('F'.$i, $item->address);
	                $sheet->cell('G'.$i, $item->quo);
	                $sheet->cell('H'.$i, $item->passing);
	                $sheet->cell('I'.$i, $item->enquiry);
	                $sheet->cell('J'.$i, $item->dob);
	                $sheet->cell('K'.$i, $item->age);
	                $sheet->cell('L'.$i, $item->reference);
	                $sheet->cell('M'.$i, $item->remarks);
				}
			});
		})->export('xlsx');
	}

	public function import(Request $rec)
	{
		if($rec->hasFile('file')){
			$path = $rec->file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count()){
				foreach ($data->toArray() as $key => $value) {
					$empId = "";
					if ($value['employee_name'] != "") {
						$employeeRow = DB::table('z_user')->where('df','')->where('name',$value['employee_name'])->first();
						if ($employeeRow) {
							$empId = $employeeRow->id;
						}
					}
					 $data = [
						'name'			=> $this->checkColumn($value['name']),
						'mobile'		=> $this->checkColumn($value['mobile']),
						'email'			=> $this->checkColumn($value['email']),
						'address'		=> $this->checkColumn($value['address']),
						'quo'			=> $this->checkColumn($value['previous_qualification']),
						'passing'		=> $this->checkColumn($value['year_of_passing']),
						'enquiry'		=> $this->checkColumn($value['enquiry_for']),
						'dob'			=> $this->dateParse($value['dob']),
						'age'			=> $this->checkColumn($value['age']),
						'reference'		=> $this->checkColumn($value['reference']),
						'remarks'		=> $this->checkColumn($value['remarks']),
						'status'		=> 'new',
						'cby'			=> $empId,
						'cat'			=> date('Y-m-d H:i:s')
					];

					if ($empId == "") {
						$data['cby']	= Session::get('AdminId');
					}
					$insert[] = $data;
				}

				if(!empty($insert)){
					DB::table('leads')->insert($insert);
					Session::flash('success', 'Leads Imported');
	    			return Redirect($this->aUrl('/leads'));
				}else{
					Session::flash('error', 'No Data Found in File');
	    			return Redirect($this->aUrl('/leads'));
				}
			}else{
				Session::flash('error', 'No Data Found in File');
	    		return Redirect($this->aUrl('/leads'));
			}
		}else{
			Session::flash('error', 'Not a valid Excel file.');
	    	return Redirect($this->aUrl('/leads'));
		}
	}



	public function list(Request $rec)
	{
		$data['_title'] = 'Leads';
		$data['type'] 	= 'list';
		$data['rec'] 	= $rec;
		$query = DB::table('leads');
		if ($rec->adate) {
			$query->where('adate','>=',date('Y-m-d',strtotime($rec->adate)).' 00:00:00');
			$query->where('adate','<=',date('Y-m-d',strtotime($rec->adate)).' 23:59:59');
		}
		if ($rec->status) {
			$query->where('status',$rec->status);
		}
		if ($rec->reference) {
			$query->where('reference',$rec->reference);
		}
		if ($rec->employee) {
			$query->where('cby',$rec->employee);
		}
		if ($rec->from) {
			$query->where('cat','>',date('Y-m-d',strtotime($rec->from)).' 00:00:00');
		}
		if ($rec->to) {
			$query->where('cat','<',date('Y-m-d',strtotime($rec->to)).' 23:59:59');
		}
		if(Session::get('AdminId') == "1"){
			$data['list'] 	= $query->orderby('id','desc')->get();
		}else{
			$data['list'] 	= $query->orderby('id','desc')->where('cby',Session::get('AdminId'))->get();
		}
		return view('admin.leads.list',$data);
	}

	public function view($id)
	{
		$data['_title'] = 'View Lead';
		$data['type'] 	= 'view';
		$data['item'] 	= DB::table('leads')->where('id',$id)->first();
		$data['slist'] 	= DB::table('leads_status')->orderby('id','desc')->where('lead',$id)->get();
		return view('admin.leads.list',$data);
	}

	public function viewPost(Request $rec)
	{
		return $this->retJson(['_return' => true,'lead' => $rec->lead,'data' => $this->printViewLead($rec->lead)]);
	}

	public function add()
	{
		$data['_title'] = 'Add Lead';
		$data['type'] 	= 'add';
		return view('admin.leads.list',$data);
	}

	public function status(Request $rec)
	{
		$adate = NULL;
		if ($rec->status == "Appointment fixed" || $rec->status == "Reschedule") {
			$adate = $rec->date?date('Y-m-d H:i:s',strtotime($rec->date)):NULL;
		}
		$data = [
			'lead'			=> $rec->eid,
			'status'		=> $rec->status,
			'notes'			=> $rec->notes?$rec->notes:'',
			'adate'			=> $adate,
			'cat'			=> date('Y-m-d H:i:s'),
			'cby'			=> Session::get('AdminId')
		];
		DB::table('leads_status')->insert($data);
		DB::table('leads')->where('id',$rec->eid)->update(['status' => $rec->status,'adate' => $adate,'uat'				=> date('Y-m-d H:i:s')]);


		// Session::flash('success', 'Lead status changed.');
	 //    return Redirect()->back();

		return $this->retJson(['_return' => true,'lead' => $rec->eid,'data' => $this->printLead($rec->eid)]);
	}

	public function statusbulk(Request $rec)
	{
		foreach(explode(',', $rec->leads) as $val){
			$adate = NULL;
			if ($rec->status == "Appointment fixed" || $rec->status == "Reschedule") {
				$adate = $rec->date?date('Y-m-d H:i:s',strtotime($rec->date)):NULL;
			}
			$data = [
				'lead'			=> $val,
				'status'		=> $rec->status,
				'notes'			=> $rec->notes?$rec->notes:'',
				'adate'			=> $adate,
				'cat'			=> date('Y-m-d H:i:s'),
				'cby'			=> Session::get('AdminId')
			];
			DB::table('leads_status')->insert($data);
			DB::table('leads')->where('id',$val)->update(['status' => $rec->status,'adate' => $adate,'uat'				=> date('Y-m-d H:i:s')]);
		}

		Session::flash('success', 'Lead status changed.');
	    return Redirect()->back();
	}

	public function save(Request $rec)
	{
		$data = [
			'name'			=> $rec->name,
			'mobile'		=> $rec->mobile,
			'email'				=> $rec->email?$rec->email:'',
			'address'			=> $rec->address?$rec->address:'',
			'quo'				=> $rec->quo?$rec->quo:'',
			'passing'			=> $rec->passing?$rec->passing:'',
			'enquiry'			=> $rec->enquiry?$rec->enquiry:'',
			'dob'				=> $rec->dob?date('Y-m-d',strtotime($rec->dob)):NULL,
			'age'				=> $rec->age?$rec->age:'',
			'reference'		=> $rec->reference?$rec->reference:'',
			'remarks'		=> $rec->remarks?$rec->remarks:'',
			'status'		=> 'new',
			'cby'			=> 	$rec->employee?$rec->employee:'',
			'cat'			=> date('Y-m-d H:i:s')
		];

		DB::table('leads')->insert($data);

		Session::flash('success', 'Lead saved.');
	    return Redirect($this->aUrl('/leads'));
	}

	public function deleteLead(Request $rec)
	{
		if (Session::get('AdminId') == "1") {
			DB::table('leads')->where('id',$rec->lead)->delete();
			$message = 'Lead deleted.';
			return $this->retJson(['_return' => true,'msg' => $message,'lead' => $rec->lead]);		
		}else{
			DB::table('delete_approval')->insert([
				'type'	=> 'lead',
				'main'	=> $rec->lead,
				'cby'	=> Session::get('AdminId'),
				'cat'		=> date('Y-m-d H:i:s')
			]);
			$message = 'Delete Request sent to admin';
			return $this->retJson(['_return' => false,'msg' => $message,'lead' => $rec->lead,'data' => $this->printLead($rec->lead)]);		
		}
	}

	public function update(Request $rec)
	{
		$data = [
			'name'				=> $rec->name,
			'mobile'			=> $rec->mobile,
			'email'				=> $rec->email?$rec->email:'',
			'address'			=> $rec->address?$rec->address:'',
			'quo'				=> $rec->quo?$rec->quo:'',
			'passing'			=> $rec->passing?$rec->passing:'',
			'enquiry'			=> $rec->enquiry?$rec->enquiry:'',
			'dob'				=> $rec->dob?date('Y-m-d',strtotime($rec->dob)):NULL,
			'age'				=> $rec->age?$rec->age:'',
			'reference'			=> $rec->reference?$rec->reference:'',
			'remarks'			=> $rec->remarks?$rec->remarks:'',
			'cby'				=> 	$rec->employee?$rec->employee:'',
			'uat'				=> date('Y-m-d H:i:s')
		];

		DB::table('leads')->where('id',$rec->lead)->update($data);

		return $this->retJson(['_return' => true,'lead' => $rec->lead,'data' => $this->printLead($rec->lead)]);
	}

	public function edit($id)
	{
		$data['_title'] = 'Edit Lead';
		$data['type'] 	= 'edit';
		$data['item'] 	= DB::table('leads')->where('id',$id)->first();
		return view('admin.leads.list',$data);
	}

	public function delete($id)
	{
		if (Session::get('AdminId') == "1") {
			DB::table('leads')->where('id',$id)->delete();
			Session::flash('success', 'Lead deleted.');
		}else{
			DB::table('delete_approval')->insert([
				'type'	=> 'lead',
				'main'	=> $id,
				'cby'	=> Session::get('AdminId'),
				'cat'		=> date('Y-m-d H:i:s')
			]);
			Session::flash('success', 'Delete Request sent to admin');
		}
	    return Redirect($this->aUrl('/leads'));
	}
}
