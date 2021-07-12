<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class AboutController extends BaseController
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

	public function team()
	{
		$data['_title'] = 'About team';
		$data['list'] 	= DB::table('cms_about_team')->orderby('sort','asc')->get();
		$data['_e']		= 0;
		return view('admin.about.team',$data);	
	}

	public function save_team(Request $rec)
	{
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/about/');
	        if(!$image->move($destinationPath, $imageName)){
	        	$imageName = "";
	        }
	    }

	    $data = [
	    	'title'		=> $rec->title,
	    	'sub'		=> $rec->sub,
	    	'content'	=> $rec->content,
	    	'sort'		=> $rec->sort,
	    	'banner'	=> $imageName
	    ];
	    DB::table('cms_about_team')->insert($data);

	    Session::flash('success', 'Team saved.'); 
	    return Redirect($this->aUrl('/about/team'));	
	}

	public function edit_team($id)
	{
		$data['_title'] = 'About team';
		$data['list'] 	= DB::table('cms_about_team')->orderby('sort','asc')->get();
		$data['item'] 	= DB::table('cms_about_team')->where('id',$id)->first();
		$data['_e']		= 1;
		return view('admin.about.team',$data);	
	}

	public function update_team(Request $rec)
	{
		$old = DB::table('cms_about_team')->where('id',$rec->id)->first();
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/about/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/about/'.$old->banner))) {
					@unlink(public_path('uploads/about/'.$old->banner));
				}
				$data = [
			    	'banner'		=> $imageName
			    ];
			    DB::table('cms_about_team')->where('id',$rec->id)->update($data);	        	
	        }
	    }
		$data = [
	    	'title'		=> $rec->title,
	    	'sub'		=> $rec->sub,
	    	'content'	=> $rec->content,
	    	'sort'		=> $rec->sort
	    ];
	    DB::table('cms_about_team')->where('id',$rec->id)->update($data);

	    Session::flash('success', 'Team updated.'); 
	    return Redirect($this->aUrl('/about/team'));	
	}

	public function delete_team($id)
	{
		$old = DB::table('cms_about_team')->where('id',$id)->first();
		if (file_exists( public_path('uploads/about/'.$old->banner))) {
			@unlink(public_path('uploads/about/'.$old->banner));
		}
		DB::table('cms_about_team')->where('id',$id)->delete();
		Session::flash('success', 'Team deleted.'); 
	    return Redirect($this->aUrl('/about/team'));
	}

	public function content()
	{
		$data['_title'] = 'About content';	
		$data['item']	= DB::table('cms_about_content')->where('id','1')->first();
		return view('admin.about.content',$data);	
	}

	public function save(Request $rec)
	{
		$old = DB::table('cms_about_content')->where('id','1')->first();
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/about/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/about/'.$old->banner))) {
					@unlink(public_path('uploads/about/'.$old->banner));
				}
				$data = [
			    	'banner'		=> $imageName
			    ];
			    DB::table('cms_about_content')->where('id','1')->update($data);	        	
	        }
	    }
	    $imageName = "";
		if ($rec->hasFile('image')) {
	        $image = $rec->file('image');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/about/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/about/'.$old->image))) {
					@unlink(public_path('uploads/about/'.$old->image));
				}
				$data = [
			    	'image'		=> $imageName
			    ];
			    DB::table('cms_about_content')->where('id','1')->update($data);	        	
	        }
	    }
	    $imageName = "";
		if ($rec->hasFile('coimage')) {
	        $image = $rec->file('coimage');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/about/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/about/'.$old->coimage))) {
					@unlink(public_path('uploads/about/'.$old->coimage));
				}
				$data = [
			    	'coimage'		=> $imageName
			    ];
			    DB::table('cms_about_content')->where('id','1')->update($data);	        	
	        }
	    }

	    $imageName = "";
		if ($rec->hasFile('bbanner')) {
	        $image = $rec->file('bbanner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/about/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/about/'.$old->bbanner))) {
					@unlink(public_path('uploads/about/'.$old->bbanner));
				}
				$data = [
			    	'bbanner'		=> $imageName
			    ];
			    DB::table('cms_about_content')->where('id','1')->update($data);	        	
	        }
	    }

	    $data = [
	    	'title'			=> $rec->title,
	    	'content'		=> $rec->content,
	    	'title2'		=> $rec->title2,
	    	'content2'		=> $rec->content2,
	    	'cotitle'		=> $rec->cotitle,
	    	'cosubtitle'	=> $rec->cosubtitle,
	    	'cocontent'		=> $rec->cocontent,
	    	'btitle'		=> $rec->btitle,
	    ];
	    DB::table('cms_about_content')->where('id','1')->update($data);	        	

		Session::flash('success', 'Content saved.'); 
	    return Redirect($this->aUrl('/about/content'));	
	}

	public function slider()
	{
		$data['_title'] = 'About partner slider';
		$data['list'] 	= DB::table('cms_about_slider')->orderby('sort','asc')->get();
		$data['_e']		= 0;
		return view('admin.about.slider',$data);	
	}

	public function edit_slider($id)
	{
		$data['_title'] = 'About partner slider';
		$data['list'] 	= DB::table('cms_about_slider')->orderby('sort','asc')->get();
		$data['item'] 	= DB::table('cms_about_slider')->where('id',$id)->first();
		$data['_e']		= 1;
		return view('admin.about.slider',$data);	
	}

	public function slider_delete($id)
	{
		$old = DB::table('cms_about_slider')->where('id',$id)->first();
		if (file_exists( public_path('uploads/about/'.$old->image))) {
			@unlink(public_path('uploads/about/'.$old->image));
		}

		DB::table('cms_about_slider')->where('id',$id)->delete();
		Session::flash('success', 'Slider deleted.'); 
	    return Redirect($this->aUrl('/about/slider'));	
	}

	public function slider_save(Request $rec)
	{
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/about/');
	        if(!$image->move($destinationPath, $imageName)){
	        	$imageName = "";
	        }
	    }

	    $data = [
	    	'sort'		=> $rec->sort,
	    	'image'		=> $imageName
	    ];
	    DB::table('cms_about_slider')->insert($data);

	    Session::flash('success', 'Slider added.'); 
	    return Redirect($this->aUrl('/about/slider'));
	}

	public function slider_update(Request $rec)
	{
		$old = DB::table('cms_about_slider')->where('id',$rec->id)->first();
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/about/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/about/'.$old->image))) {
					@unlink(public_path('uploads/about/'.$old->image));
				}
				$data = [
			    	'image'		=> $imageName
			    ];
			    DB::table('cms_about_slider')->where('id',$rec->id)->update($data);	        	
	        }
	    }
	    $data = [
	    	'sort'		=> $rec->sort
	    ];
	    DB::table('cms_about_slider')->where('id',$rec->id)->update($data);

	    Session::flash('success', 'Slider saved.'); 
	    return Redirect($this->aUrl('/about/slider'));
	}
}