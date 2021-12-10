<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class DashboardController extends BaseController
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

	public function index()
	{
		if(Session::get('AdminId') == "1"){
			$data['list'] 	= DB::table('leads')->orderby('adate','asc')->where('adate','!=',NULL)->get();
		}else{
			$data['list'] 	= DB::table('leads')->orderby('adate','asc')->where('adate','!=',NULL)->where('cby',Session::get('AdminId'))->get();
		}
		return view('admin.dashboard',$data);	
	}

	public function getMessages()
	{
		$data['_title'] = 'Messages';
		$data['list'] 	= DB::table('contact_form')->orderby('id','desc')->limit(200)->get();
		return view('admin.messages',$data);	
	}

	public function deleteMessages($id)
	{
		DB::table('contact_form')->where('id',$id)->delete();
		Session::flash('success', 'Message deleted.'); 
	    return Redirect($this->aUrl('/messages'));
	}
}