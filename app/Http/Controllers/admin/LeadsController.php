<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

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

	public function list()
	{
		$data['_title'] = 'Leads';
		$data['type'] 	= 'list';
		$data['list'] 	= DB::table('leads')->orderby('id','desc')->get();
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
			'notes'			=> $rec->notes
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
			'status'		=> 'new',
			'cat'			=> date('Y-m-d H:i:s')
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