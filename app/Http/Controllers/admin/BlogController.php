<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class BlogController extends BaseController
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
		$data['_title'] = 'Blog List';	
		$data['list']	= DB::table('cms_blog_list')->orderby('id','desc')->get();
		return view('admin.blog.list',$data);	
	}

	public function add()
	{
		$data['_title'] = 'Add Blog';	
		return view('admin.blog.add',$data);	
	}

	public function edit($id)
	{
		$data['_title'] = 'Edit Blog';	
		$data['item']	= DB::table('cms_blog_list')->where('id',$id)->first();
		return view('admin.blog.edit',$data);	
	}

	public function deleteBlog($id)
	{
		$old = DB::table('cms_blog_list')->where('id',$id)->first();
		if (file_exists( public_path('uploads/blog/'.$old->banner))) {
			@unlink(public_path('uploads/blog/'.$old->banner));
		}
		if (file_exists( public_path('uploads/blog/'.$old->thumb))) {
			@unlink(public_path('uploads/blog/'.$old->thumb));
		}
		DB::table('cms_blog_list')->where('id',$id)->delete();
		Session::flash('success', 'Blog deleted.'); 
	    return Redirect($this->aUrl('/blog/list'));		
	}

	public function saveBlog(Request $rec)
	{
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/blog/');
	        if(!$image->move($destinationPath, $imageName)){
	        	$imageName = "";
	        }
	    }

	    $thumb = "";
		if ($rec->hasFile('thumb')) {
	        $image = $rec->file('thumb');
	        $thumb = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/blog/');
	        if(!$image->move($destinationPath, $thumb)){
	        	$thumb = "";
	        }
	    }

	    $data = [
	    	'banner'	=> $imageName,
	    	'thumb'		=> $thumb,
	    	'title'		=> $rec->title,
	    	'sub'		=> $rec->sub,
	    	'content'	=> $rec->content,
	    	'fb'		=> $rec->fb,
	    	'ins'		=> $rec->ins,
	    	'twi'		=> $rec->twi,
	    	'cat'		=> date('Y-m-d H:i:s')
	    ];
	    DB::table('cms_blog_list')->insert($data);


	    Session::flash('success', 'Blog created.'); 
	    return Redirect($this->aUrl('/blog/list'));
	}

	public function updateBlog(Request $rec)
	{

		$old = DB::table('cms_blog_list')->where('id',$rec->id)->first();
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/blog/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/blog/'.$old->banner))) {
					@unlink(public_path('uploads/blog/'.$old->banner));
				}
				$data = [
			    	'banner'		=> $imageName
			    ];
			    DB::table('cms_blog_list')->where('id',$rec->id)->update($data);	        	
	        }
	    }

	    $imageName = "";
		if ($rec->hasFile('thumb')) {
	        $image = $rec->file('thumb');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/blog/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/blog/'.$old->thumb))) {
					@unlink(public_path('uploads/blog/'.$old->thumb));
				}
				$data = [
			    	'thumb'		=> $imageName
			    ];
			    DB::table('cms_blog_list')->where('id',$rec->id)->update($data);	        	
	        }
	    }



		$data = [
	    	'title'		=> $rec->title,
	    	'sub'		=> $rec->sub,
	    	'content'	=> $rec->content,
	    	'fb'		=> $rec->fb,
	    	'ins'		=> $rec->ins,
	    	'twi'		=> $rec->twi
	    ];
	    DB::table('cms_blog_list')->where('id',$rec->id)->update($data);

	    Session::flash('success', 'Blog updated.'); 
	    return Redirect($this->aUrl('/blog/list'));
	}

	public function content()
	{
		$data['_title'] = 'Blog content';	
		$data['item']	= DB::table('cms_blog_content')->where('id','1')->first();
		return view('admin.blog.content',$data);	
	}

	public function save(Request $rec)
	{
		$old = DB::table('cms_blog_content')->where('id','1')->first();
		$imageName = "";
		if ($rec->hasFile('banner')) {
	        $image = $rec->file('banner');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/blog/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/blog/'.$old->banner))) {
					@unlink(public_path('uploads/blog/'.$old->banner));
				}
				$data = [
			    	'banner'		=> $imageName
			    ];
			    DB::table('cms_blog_content')->where('id','1')->update($data);	        	
	        }
	    }

	    $data = [
	    	'title'			=> $rec->title,
	    	'title2'		=> $rec->title2
	    ];
	    DB::table('cms_blog_content')->where('id','1')->update($data);	        	

		Session::flash('success', 'Content saved.'); 
	    return Redirect($this->aUrl('/blog/content'));	
	}
}