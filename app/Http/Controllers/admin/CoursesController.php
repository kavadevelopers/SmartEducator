<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class CoursesController extends BaseController
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

	public function add()
	{
		$data['_title'] = 'Add Course';
		return view('admin.courses.add',$data);	
	}

	public function delete($id)
	{
		DB::table('courses')->where('id',$id)->update(['df' => 'yes']);	
		Session::flash('success', 'Course saved.'); 
	    return Redirect($this->aUrl('/courses'));
	}

	public function edit($id)
	{
		$data['_title'] = 'Edit Course';
		$data['item'] 	= DB::table('courses')->where('id',$id)->first();
		return view('admin.courses.edit',$data);		
	}

	public function index()
	{
		$data['_title'] = 'Courses';
		$data['list'] 	= DB::table('courses')->where('df','')->get();
		return view('admin.courses.list',$data);	
	}

	public function save(Request $rec)
	{
		$data = [
			'name'				=> $rec->name,
			'about'				=> $rec->about,
			'duration'			=> $rec->duration,
			'specialization'	=> $rec->specialization,
			'eligibility'		=> $rec->eligibility,
			'job_role'			=> $rec->job_role,
			'process'			=> $rec->process,
			'df'				=> '',
			'cat'				=> date('Y-m-d H:i:s')
		];

		DB::table('courses')->insert($data);	

		Session::flash('success', 'Course saved.'); 
	    return Redirect($this->aUrl('/courses'));
	}

	public function update(Request $rec)
	{
		$data = [
			'name'				=> $rec->name,
			'about'				=> $rec->about,
			'duration'			=> $rec->duration,
			'specialization'	=> $rec->specialization,
			'eligibility'		=> $rec->eligibility,
			'job_role'			=> $rec->job_role,
			'process'			=> $rec->process
		];

		DB::table('courses')->where('id',$rec->id)->update($data);	

		Session::flash('success', 'Course saved.'); 
	    return Redirect($this->aUrl('/courses'));
	}	
}