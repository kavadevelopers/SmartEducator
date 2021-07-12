<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Request;
//use Illuminate\Http\Request;
use DB;
use Response;
use Session;

class BaseController extends Controller
{

	public function __construct()
	{
		
	}

	public function retJson($array)
	{
		return Response::json($array);
	}

	public static function aUrl($link)
	{
		return url('admin'.$link);
	}

	public static function getSetting()
	{
		return DB::table('cms_zsettings')->where('id','1')->first();
	}	

	public static function getUser()
	{
		return DB::table('z_user')->where('id',Session::get('AdminId'))->first();
	}	

	public static function getPageBanner($id)
	{
		$page = DB::table('pages')->where('id',$id)->first();
		if ($page) {
			if (@getimagesize(public_path('uploads/pages/'.$page->image))) {
				$image = url('public/uploads/pages/').'/'.$page->image;
			}else{
				$image = url('public/img/placeholder.jpg');
			}
		}else{
			$image = url('public/img/placeholder.jpg');
		}
		return $image;
	}		

	public static function menu($seg,$array)
	{
		$ret = array("","","");
		$path = Request::segment($seg);
	    foreach($array as $a)
	    {
	        if($path === $a)
	        {
	          	$ret = array("active","active","pcoded-trigger");
	          	break;  
	        }
	    }
	    return $ret;
	}
}