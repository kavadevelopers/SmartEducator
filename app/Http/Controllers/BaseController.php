<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use Session;

class BaseController extends Controller
{

	public static function getSetting()
	{
		return DB::table('z_setting')->where('id','1')->first();
	}	

	public static function aUrl($link)
	{
		return url('admin'.$link);
	}

	public static function getPageBanner($id)
	{
		$page = DB::table('pages')->where('id',$id)->first();
		if ($page) {
			if (@getimagesize(public_path('uploads/pages/'.$page->image))) {
				$image = url('public/uploads/pages/').'/'.$page->image;
			}else{
				$image = "";
			}
		}else{
			$image = "";
		}
		return $image;
	}	

}