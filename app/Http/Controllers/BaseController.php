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
		return DB::table('cms_zsettings')->where('id','1')->first();
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

	public static function strLimit($str,$length){
		$append = '...';
	    if (strlen($str) > $length) {
	        $delim = "~\n~";
	        $str = substr($str, 0, strpos(wordwrap($str, $length, $delim), $delim)) . $append;
	    } 
	    return $str;
	}

	public static function linksCheck($link)
	{
		if ($link == "home") {
			return 'home';
		}else if ($link == "about") {
			return 'about-us';
		}else if ($link == "blog") {
			return 'blog';
		}else if ($link == "contact") {
			return 'contact-us';
		}else if ($link == "listing") {
			return 'listing';
		}else{
			$page = DB::table('pages')->where('id',$link)->first();
			return $page->slug;
		}
	}
}