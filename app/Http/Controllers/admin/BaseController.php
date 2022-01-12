<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Request;
//use Illuminate\Http\Request;
use DB;
use Response;
use Session;
use URL;
use Carbon;
use PHPMailer\PHPMailer;

class BaseController extends Controller
{

	public function __construct()
	{
		
	}

	public function printViewLead($id)
	{
		$item = DB::table('leads')->where('id',$id)->first();
		$slist = DB::table('leads_status')->limit(10)->orderby('id','desc')->where('lead',$id)->get();
		$str = "";
		$str .= '<div class="row">';
            $str .= '<div class="col-lg-12">';
                $str .= '<div class="general-info">';
                    $str .= '<div class="row">';
                        $str .= '<div class="col-lg-12 col-xl-6">';
                            $str .= '<div class="table-responsive">';
                                $str .= '<table class="table m-0 tbl-whitespace">';
                                    $str .= '<tbody>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">Sr. No.</th>';
                                            $str .= '<td>#'.$item->id.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">Status</th>';
                                            $str .= '<td>'.$item->status.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">Name</th>';
                                            $str .= '<td>'.$item->name.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">Mobile</th>';
                                            $str .= '<td>'.$item->mobile.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">Email</th>';
                                            $str .= '<td>'.$item->email.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">Address</th>';
                                            $str .= '<td>'.$item->address.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">PREVIOUS QUALIFICATION</th>';
                                            $str .= '<td>'.$item->quo.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">YEAR OF PASSING</th>';
                                            $str .= '<td>'.$item->passing.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">ENQUIRY FOR</th>';
                                            $str .= '<td>'.$item->enquiry.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">DOB</th>';
                                            $str .= '<td>'.$item->dob.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">Age</th>';
                                            $str .= '<td>'.$item->age.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">REFERENCE</th>';
                                            $str .= '<td>'.$item->reference.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">REMARK</th>';
                                            $str .= '<td>'.$item->remarks.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">Employee</th>';
                                            $str .= '<td>';
                                                if($item->cby != ""){
                                                    $empl = DB::table('z_user')->where('id',$item->cby)->first();
                                                    if ($empl) {
                                                    	$str .= $empl->name;
                                                    }
                                                }
                                            $str .= '</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">Created On</th>';
                                            $str .= '<td>'.$item->cat.'</td>';
                                        $str .= '</tr>';
                                        $str .= '<tr>';
                                            $str .= '<th scope="row">Updated On</th>';
                                            $str .= '<td>'.$item->uat.'</td>';
                                        $str .= '</tr>';
                                    $str .= '</tbody>';
                                $str .= '</table>';
                            $str .= '</div>';
                        $str .= '</div>';
                        $str .= '<div class="col-lg-12 col-xl-6">';
                            $str .= '<div class="row">';
                                foreach ($slist as $key => $value){
                                    $user = DB::Table('z_user')->where('id',$value->cby)->first();
                                    $str .= '<div class="col-10 col-sm-10 col-xl-11">';
                                        $str .= '<div class="card">';
                                            $str .= '<div class="card-block">';
                                                $str .= '<div class="timeline-details">';
                                                	$pDdate = "";
                                                	if ($value->status == 'Appointment fixed'|| $value->status == "Reschedule") {
                                                		$pDdate = '<small> -at '.$value->adate.'</small>';
                                                	}
                                                    $str .= '<div class="chat-header">'. $value->status.$pDdate.'</div>';
                                                    $str .= '<p class="text-muted">'.nl2br($value->notes).'</p>';
                                                    $str .= '<p class="text-muted text-right"><small>At : '.$value->cat.' by '.$user->name.'</small></p>';
                                                $str .= '</div>';
                                            $str .= '</div>';
                                        $str .= '</div>';
                                    $str .= '</div>';
                                }
                            $str .= '</div>';
                        $str .= '</div>';
                    $str .= '</div>';
                $str .= '</div>';
            $str .= '</div>';
        $str .= '</div>';
        return $str;
	}

	public static function printLead($id)
	{
		$value = DB::table('leads')->where('id',$id)->first();
		$str = "";
		if(Session::get('AdminId') == "1"){
            $str .= '<td class="text-center">';
                $str .= '<div class="checkbox-fade fade-in-primary d-">';
                    $str .= '<label>';
                        $str .= '<input type="checkbox" name="cus[]" value="<?= $value->id ?>" class="checkSingle">';
                        $str .= '<span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>';
                    $str .= '</label>';
                $str .= '</div>';
            $str .= '</td>';
		}
        $str .= '<td class="text-center">';
            $str .= '<a href="#" class="btn btn-success btn-mini btnLeadView" data-id="'.$id.'" title="View">';
                $str .= '<i class="fa fa-eye"></i>';
            $str .= '</a>';
        $str .= '</td>';
        $str .= '<td class="text-center">'.$value->id.'</td>';
        $str .= '<td>'.$value->name.'</td>';
        $str .= '<td>'.$value->mobile.'</td>';
        $str .= '<td class="text-center">';
                    $str .= ucfirst($value->status);
        			if($value->status == "Appointment fixed" || $value->status == "Reschedule"){
                        $str .= '<br><small>At : '.date('d-m-Y h:i A',strtotime($value->adate)).'</small>';
                    }
        $str .= '</td>';
       		if(Session::get('AdminId') == "1"){
                $str .= '<td>';
                    if($value->cby != "" && DB::table('z_user')->where('id',$value->cby)->first()){
                        $str .= '<small>'.DB::table('z_user')->where('id',$value->cby)->first()->name.'</small>';
                    }else{
                        $str .= '<small>unassigned</small>';
                    }
                $str .= '</td>';
        	}
        $str .= '<td class="text-center">';
            $str .= '<small>'.$value->cat.'</small>';
        $str .= '</td>';
        $str .= '<td class="text-center">';
            $str .= '<small>'.$value->uat.'</small>';
        $str .= '</td>';
        $str .= '<td class="text-center">';
            $str .= '<a href="#" data-values="'.htmlspecialchars(json_encode($value), ENT_QUOTES, "UTF-8").'" class="btn btn-primary btn-mini btnEdit" title="Edit">';
                $str .= '<i class="fa fa-pencil"></i>';
            $str .= '</a>';
            $str .= ' <a href="#" class="btn btn-success btn-mini btn-statuschange" data-values="'.htmlspecialchars(json_encode($value), ENT_QUOTES, "UTF-8").'" data-adate="'.$value->adate.'" title="Change Status">';
                $str .= '<i class="fa fa-check"></i>';
            $str .= '</a>';
        $str .= '</td>';
        return $str;
	}

	public static function isNotDeleteSent($id,$type)
	{
		if (Session::get('AdminId') == "1") {
			return true;
		}else{
			$is = DB::table('delete_approval')->where('type',$type)->where('main',$id)->where('cby',Session::get('AdminId'))->first();
			if ($is) {
				return false;
			}else{
				return true;
			}
		}
	}

	public static function dateParse($item)
	{
		$date = date('Y-m-d');
		if (!empty($item)) {
			$dobCarbon = Carbon::parse($item);
			$date = $dobCarbon->format('Y-m-d');
		}
		return $date;
	}

	public static function checkColumn($item)
	{
		$ret = "";
		if (isset($item)) {
			if (!empty($item)) {
				$ret = $item;
			}	
		}
		return $ret;
	}

	public static function checkNumColumn($item)
	{
		$ret = 0;
		if (!empty($item)) {
			if(preg_replace('/^(\-){0,1}[0-9]+(\.[0-9]+){0,1}/', '', $item) == ""){
				$ret = $item;
			}
		}
		return $ret;
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

	public static function employeeAttchment($row,$key)
	{
		if ($row->$key != "") {
			if (file_exists(public_path().'/uploads/all/'.$row->$key)) {
				return '<a href="'.URL::to('/').'/public/uploads/all/'.$row->$key.'" target="_blank" download><span style="color:green;">Download File</span></a>';
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