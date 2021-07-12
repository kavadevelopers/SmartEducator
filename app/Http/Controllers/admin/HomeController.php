<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends BaseController
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

	public function stepsSave(Request $rec)
	{
		$data = [
	    	'step1'		=> $rec->step1,
	    	'step2'		=> $rec->step2,
	    	'step3'		=> $rec->step3
	    ];
	    DB::table('cms_home_steps')->where('id','1')->update($data);

	    $imageName = "";
		if ($rec->hasFile('banner')) {
			$old = DB::table('cms_home_steps')->where('id','1')->first();
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/home/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/home/'.$old->banner))) {
					@unlink(public_path('uploads/home/'.$old->banner));
				}
				$data = [
			    	'banner'		=> $imageName
			    ];
			    DB::table('cms_home_steps')->where('id','1')->update($data);        	
	        }
	    }

	    Session::flash('success', 'Content Saved'); 
	    return Redirect($this->aUrl('/home/steps'));
	}

	public function steps()
	{
		$data['_title'] = 'Home Steps';
		$data['item'] 	= DB::table('cms_home_steps')->where('id','1')->first();
		return view('admin.home.steps',$data);	
	}	

	public function slider()
	{
		$data['_title'] = 'Home Slider';
		$data['list'] 	= DB::table('cms_home_slider')->orderby('sort','asc')->get();
		$data['_e']		= 0;
		return view('admin.home.slider',$data);	
	}

	public function save(Request $rec)
	{
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/home/');
	        if(!$image->move($destinationPath, $imageName)){
	        	$imageName = "";
	        }
	    }

	    $data = [
	    	'sort'		=> $rec->sort,
	    	'image'		=> $imageName
	    ];
	    DB::table('cms_home_slider')->insert($data);

	    Session::flash('success', 'Slider added.'); 
	    return Redirect($this->aUrl('/home/slider'));
	}

	public function delete($id)
	{
		$old = DB::table('cms_home_slider')->where('id',$id)->first();
		if (file_exists( public_path('uploads/home/'.$old->image))) {
			@unlink(public_path('uploads/home/'.$old->image));
		}

		DB::table('cms_home_slider')->where('id',$id)->delete();
		Session::flash('success', 'Slider deleted.'); 
	    return Redirect($this->aUrl('/home/slider'));	
	}

	public function edit($id)
	{
		$data['_title'] = 'Home Slider';
		$data['item'] 	= DB::table('cms_home_slider')->where('id',$id)->first();
		$data['list'] 	= DB::table('cms_home_slider')->orderby('sort','asc')->get();
		$data['_e']		= 1;
		return view('admin.home.slider',$data);	
	}

	public function update(Request $rec)
	{
		$old = DB::table('cms_home_slider')->where('id',$rec->id)->first();
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/home/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/home/'.$old->image))) {
					@unlink(public_path('uploads/home/'.$old->image));
				}
				$data = [
			    	'image'		=> $imageName
			    ];
			    DB::table('cms_home_slider')->where('id',$rec->id)->update($data);	        	
	        }
	    }
	    $data = [
	    	'sort'		=> $rec->sort
	    ];
	    DB::table('cms_home_slider')->where('id',$rec->id)->update($data);

	    Session::flash('success', 'Slider saved.'); 
	    return Redirect($this->aUrl('/home/slider'));
	}
}