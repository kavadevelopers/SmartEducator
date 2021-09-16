<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class ListingController extends BaseController
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

	public function slider()
	{
		$data['_title'] = 'Courses Slider';
		$data['list'] 	= DB::table('cms_listing_slider')->orderby('sort','asc')->get();
		$data['_e']		= 0;
		return view('admin.listing.slider',$data);	
	}

	public function editSlider($id)
	{
		$data['_title'] = 'Courses Slider';
		$data['item'] 	= DB::table('cms_listing_slider')->where('id',$id)->first();
		$data['list'] 	= DB::table('cms_listing_slider')->orderby('sort','asc')->get();
		$data['_e']		= 1;
		return view('admin.listing.slider',$data);	
	}

	public function deleteSlider($id)
	{
		$old = DB::table('cms_listing_slider')->where('id',$id)->first();
		if (file_exists( public_path('uploads/listing/'.$old->image))) {
			@unlink(public_path('uploads/listing/'.$old->image));
		}

		DB::table('cms_listing_slider')->where('id',$id)->delete();
		Session::flash('success', 'Slider deleted.'); 
	    return Redirect($this->aUrl('/cources-univercities/slider'));
	}

	public function updateSlider(Request $rec)
	{
		$old = DB::table('cms_listing_slider')->where('id',$rec->id)->first();
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/listing/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/listing/'.$old->image))) {
					@unlink(public_path('uploads/listing/'.$old->image));
				}
				$data = [
			    	'image'		=> $imageName
			    ];
			    DB::table('cms_listing_slider')->where('id',$rec->id)->update($data);	        	
	        }
	    }
	    $data = [
	    	'title'		=> $rec->title,
	    	'body'		=> $rec->desc,
	    	'sort'		=> $rec->sort,
	    	'sort'		=> $rec->sort
	    ];
	    DB::table('cms_listing_slider')->where('id',$rec->id)->update($data);

	    Session::flash('success', 'Slider saved.'); 
	    return Redirect($this->aUrl('/cources-univercities/slider'));
	}

	public function saveSlider(Request $rec)
	{
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/listing/');
	        if(!$image->move($destinationPath, $imageName)){
	        	$imageName = "";
	        }
	    }

	    $data = [
	    	'title'		=> $rec->title,
	    	'body'		=> $rec->desc,
	    	'sort'		=> $rec->sort,
	    	'image'		=> $imageName
	    ];
	    DB::table('cms_listing_slider')->insert($data);

	    Session::flash('success', 'Slider added.'); 
	    return Redirect($this->aUrl('/cources-univercities/slider'));
	}

	public function content()
	{
		$data['_title'] = 'Courses content';	
		$data['item']	= DB::table('cms_listing_content')->where('id','1')->first();
		return view('admin.listing.content',$data);	
	}

	public function save(Request $rec)
	{
		$old = DB::table('cms_listing_content')->where('id','1')->first();
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/listing/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/listing/'.$old->banner))) {
					@unlink(public_path('uploads/listing/'.$old->banner));
				}
				$data = [
			    	'banner'		=> $imageName
			    ];
			    DB::table('cms_listing_content')->where('id','1')->update($data);	        	
	        }
	    }

	    $imageName = "";
		if ($rec->hasFile('banner2')) {
	        $image = $rec->file('banner2');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/listing/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/listing/'.$old->banner2))) {
					@unlink(public_path('uploads/listing/'.$old->banner2));
				}
				$data = [
			    	'banner2'		=> $imageName
			    ];
			    DB::table('cms_listing_content')->where('id','1')->update($data);	        	
	        }
	    }

	    $data = [
	    	'title'			=> $rec->title,
	    	'title2'		=> $rec->title2,
	    	'stitle'		=> $rec->stitle,
	    	'con_banner'	=> $rec->con_banner
	    ];
	    DB::table('cms_listing_content')->where('id','1')->update($data);	        	

		Session::flash('success', 'Content saved.'); 
	    return Redirect($this->aUrl('/cources-univercities/content'));	
	}
}