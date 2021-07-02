<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class PagesController extends BaseController
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
		$data['_title'] = 'Pages';
		$data['list'] 	= DB::table('pages')->get();
		return view('admin.pages.index',$data);	
	}

	public function add()
	{
		$data['_title'] = 'Add Page';
		return view('admin.pages.add',$data);	
	}

	public function addvalidate(Request $rec)
	{
		if ($rec->id) {
			$page = DB::table('pages')->where('slug',$rec->slug)->where('id','!=',$rec->id)->first();
		}else{
			$page = DB::table('pages')->where('slug',$rec->slug)->first();
		}
		if ($page) {
			return $this->retJson(['_return' => false]);
		}else{
			return $this->retJson(['_return' => true]);
		}
	}

	public function save(Request $rec)
	{
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/pages/');
	        if(!$image->move($destinationPath, $imageName)){
	        	$imageName = "";
	        }
	    }

	    $data = [
	    	'name'		=> $rec->name,
	    	'icon'		=> $rec->icon,
	    	'slug'		=> $rec->slug,
	    	'image'		=> $imageName,
	    	'content'	=> $rec->content,
	    ];
	    DB::table('pages')->insert($data);

	    Session::flash('success', 'Page created.'); 
	    return Redirect($this->aUrl('/pages'));
	}

	public function delete($id)
	{
		DB::table('pages')->where('id',$id)->delete();
		Session::flash('success', 'Page deleted.'); 
	    return Redirect($this->aUrl('/pages'));
	}

	public function edit($id)
	{
		$data['_title'] = 'Edit Page';
		$data['single']	= DB::table('pages')->where('id',$id)->first();
		if ($data['single']) {
			return view('admin.pages.edit',$data);	
		}else{
	    	return Redirect($this->aUrl('/pages'));		
		}
	}

	public function update(Request $rec)
	{
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/pages/');
	        if($image->move($destinationPath, $imageName)){
				$data = [
			    	'image'		=> $imageName
			    ];
			    DB::table('pages')->where('id',$rec->id)->update($data);	        	
	        }
	    }

	    $data = [
	    	'name'		=> $rec->name,
	    	'slug'		=> $rec->slug,
	    	'icon'		=> $rec->icon,
	    	'content'	=> $rec->content,
	    ];
	    DB::table('pages')->where('id',$rec->id)->update($data);

	    Session::flash('success', 'Page updated.'); 
	    return Redirect($this->aUrl('/pages'));
	}
}