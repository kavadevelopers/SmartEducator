<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;
use Response;

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

	public function export()
	{
		$headers = array(
	        "Content-type" => "text/csv",
	        "Content-Disposition" => "attachment; filename=Leads.csv",
	        "Pragma" => "no-cache",
	        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
	        "Expires" => "0"
	    );

	    $columns = array('Sr. No.', 'Status','Name', 'Mobile', 'Email', 'Address', 'PREVIOUS QUALIFICATION', 'YEAR OF PASSING', 'ENQUIRY FOR', 'DOB', 'Age','REFERENCE','REMARK','At');

	    $callback = function() use ($columns)
	    {
	        $file = fopen('php://output', 'w');
	        fputcsv($file, $columns);
	        if(Session::get('AdminId') == "1"){
				$list 	= DB::table('leads')->orderby('id','desc')->get();
			}else{
				$list 	= DB::table('leads')->orderby('id','desc')->where('cby',Session::get('AdminId'))->get();
			}
	        foreach($list as $item) {
	            fputcsv($file, array($item->id, $item->status, $item->name, $item->mobile,$item->email,$item->address,$item->quo,$item->passing,$item->enquiry,$item->dob,$item->age,$item->reference,$item->remarks,$item->cat));
	        }
	        fclose($file);
	    };
	    return Response::stream($callback, 200, $headers);
	}

	public function import(Request $rec)
	{
		$file = $rec->file('file');
		$tempPath = $file->getRealPath();
		if(($handle = fopen($tempPath, 'r')) !== FALSE) {
			$rows = 0;
			while(($data = fgetcsv($handle, 0, ',')) !== FALSE) {
				if($rows > 0){
					$data = [
						'name'			=> $data[1]?$data[1]:'',
						'mobile'		=> $data[2]?$data[2]:'',
						'email'			=> $data[3]?$data[3]:'',
						'address'		=> $data[4]?$data[4]:'',
						'quo'			=> $data[5]?$data[5]:'',
						'passing'		=> $data[6]?$data[6]:'',
						'enquiry'		=> $data[7]?$data[7]:'',
						'dob'			=> date('Y-m-d',strtotime($data[8]?$data[8]:date('Y-m-d'))),
						'age'			=> $data[9]?$data[9]:'',
						'reference'		=> $data[10]?$data[10]:'',
						'remarks'		=> $data[11]?$data[11]:'',
						'status'		=> 'new',
						'cat'			=> date('Y-m-d H:i:s')
					];

					if (Session::get('AdminId') == "1") {
						$data['cby']	= "";
					}else{
						$data['cby']	= Session::get('AdminId');
					}

					DB::table('leads')->insert($data);	
				}
				$rows++;
			}
			Session::flash('success', 'Leads Imported'); 
	    	return Redirect($this->aUrl('/leads'));
		}else{
			Session::flash('error', 'Not a valid csv file.'); 
	    	return Redirect($this->aUrl('/leads'));
		}
	}

	public function list()
	{
		$data['_title'] = 'Leads';
		$data['type'] 	= 'list';
		if(Session::get('AdminId') == "1"){
			$data['list'] 	= DB::table('leads')->orderby('id','desc')->get();
		}else{
			$data['list'] 	= DB::table('leads')->orderby('id','desc')->where('cby',Session::get('AdminId'))->get();
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

	public function add()
	{
		$data['_title'] = 'Add Lead';
		$data['type'] 	= 'add';
		return view('admin.leads.list',$data);	
	}

	public function status(Request $rec)
	{
		$data = [
			'lead'			=> $rec->eid,
			'status'		=> $rec->status,
			'notes'			=> $rec->notes?$rec->notes:''
		];
		DB::table('leads_status')->insert($data);
		DB::table('leads')->where('id',$rec->eid)->update(['status' => $rec->status]);


		Session::flash('success', 'Lead status changed.'); 
	    return Redirect($this->aUrl('/leads'));
	}

	public function save(Request $rec)
	{
		$data = [
			'name'			=> $rec->name,
			'mobile'		=> $rec->mobile,
			'email'			=> $rec->email,
			'address'		=> $rec->address,
			'quo'			=> $rec->quo,
			'passing'		=> $rec->passing,
			'enquiry'		=> $rec->enquiry,
			'dob'			=> date('Y-m-d',strtotime($rec->dob)),
			'age'			=> $rec->age,
			'reference'		=> $rec->reference?$rec->reference:'',
			'remarks'		=> $rec->remarks?$rec->remarks:'',
			'status'		=> 'new',
			'cat'			=> date('Y-m-d H:i:s')
		];

		DB::table('leads')->insert($data);	

		Session::flash('success', 'Lead saved.'); 
	    return Redirect($this->aUrl('/leads'));
	}

	public function update(Request $rec)
	{
		$data = [
			'name'			=> $rec->name,
			'mobile'		=> $rec->mobile,
			'email'			=> $rec->email,
			'address'		=> $rec->address,
			'quo'			=> $rec->quo,
			'passing'		=> $rec->passing,
			'enquiry'		=> $rec->enquiry,
			'dob'			=> date('Y-m-d',strtotime($rec->dob)),
			'age'			=> $rec->age,
			'reference'		=> $rec->reference?$rec->reference:'',
			'remarks'		=> $rec->remarks?$rec->remarks:'',
			'cby'			=> 	$rec->employee?$rec->employee:''
		];

		DB::table('leads')->where('id',$rec->id)->update($data);	

		Session::flash('success', 'Lead saved.'); 
	    return Redirect($this->aUrl('/leads'));
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
		DB::table('leads')->where('id',$id)->delete();
		Session::flash('success', 'Lead deleted.'); 
	    return Redirect($this->aUrl('/leads'));
	}
}