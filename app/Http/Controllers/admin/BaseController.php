<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Request;
//use Illuminate\Http\Request;
use DB;
use Response;
use Session;
use URL;
use PHPMailer\PHPMailer;

class BaseController extends Controller
{

	public function __construct()
	{
		
	}

	public static function studentAttchment($row,$key)
	{
		if ($row->$key != "") {
			if (file_exists(public_path().'/uploads/students/'.$row->$key)) {
				return '<a href="'.URL::to('/').'/public/uploads/students/'.$row->$key.'" target="_blank" download><span style="color:green;">Download File</span></a>';
			}else{
				return '<span style="color:red;">Not Uploaded</span>';	
			}
		}else{
			return '<span style="color:red;">Not Uploaded</span>';
		}
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

	public static function checkRight($page)
	{
		if (Session::get('AdminId') == "1") {
			return true;
		}else{
			$user = DB::table('z_user')->where('id',Session::get('AdminId'))->first();		
			if (in_array($page,explode(',', $user->rights))) {
				return true;
			}else{
				return false;
			}
		}
	}	

	public static function strLimit($str,$length){
		$append = '...';
	    if (strlen($str) > $length) {
	        $delim = "~\n~";
	        $str = substr($str, 0, strpos(wordwrap($str, $length, $delim), $delim)) . $append;
	    } 
	    return $str;
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

	public static function ratingPrint($rating)
	{
		if ($rating == 1) {
			return '<p class="star-block-of-review">
    					<span>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			            </span>
			        </p>';
		}else if ($rating == 2) {
			return '<p class="star-block-of-review">
    					<span>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			            </span>
			        </p>';
		}else if ($rating == 3) {
			return '<p class="star-block-of-review">
    					<span>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			            </span>
			        </p>';
		}else if ($rating == 4) {
			return '<p class="star-block-of-review">
    					<span>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			            </span>
			        </p>';
		}else if ($rating == 5) {
			return '<p class="star-block-of-review">
    					<span>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			                <i class="fa fa-star active" aria-hidden="true"></i>
			            </span>
			        </p>';
		}else{
			return '<p class="star-block-of-review">
    					<span>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			            </span>
			        </p>';
		}
	}

	public static function sendEmail($to,$subject,$body)
	{
		$setting = DB::table('cms_zsettings')->where('id','1')->first();

		$mail             	= new PHPMailer\PHPMailer();
		$mail->isSMTP();
        $mail->IsHTML(true);
        $mail->SMTPDebug  	= 0;
        $mail->SMTPAuth   	= true;
        $mail->SMTPSecure 	= 'ssl';
        $mail->CharSet 		= "utf-8";
        $mail->Host       	= $setting->mail_host;
        $mail->Port       	= $setting->mail_port;
        $mail->Username 	= $setting->mail_user;
        $mail->Password 	= $setting->mail_pass;
        $mail->SetFrom($setting->mail_from,$setting->mail_from_name);
        $mail->Subject 		= $subject;
        $mail->Body    		= $body;
        $mail->AddAddress($to);
        if ($mail->Send()) {
            //return 'Email Sended Successfully';
        } else {
            //return 'Failed to Send Email';
        }
	}
}