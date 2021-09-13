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

		$thumb = "";
		if ($rec->hasFile('thumb')) {
	        $image = $rec->file('thumb');
	        $thumb = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/courses/');
	        if(!$image->move($destinationPath, $thumb)){
	        	$thumb = "";
	        }
	    }

		$data = [
			'thumb'				=> $thumb,
			'name'				=> $rec->name,
			'fname'				=> $rec->fname,
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

		$imageName = "";
		if ($rec->hasFile('thumb')) {
	        $image = $rec->file('thumb');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/courses/');
	        if($image->move($destinationPath, $imageName)){
				$data = [
			    	'thumb'		=> $imageName
			    ];
			    DB::table('courses')->where('id',$rec->id)->update($data);	        	
	        }
	    }

		$data = [
			'name'				=> $rec->name,
			'fname'				=> $rec->fname,
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