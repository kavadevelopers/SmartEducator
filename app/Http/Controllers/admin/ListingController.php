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