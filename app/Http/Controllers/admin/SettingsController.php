<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class SettingsController extends BaseController
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

	public function deletereqStatus($id,$status)
	{
		$item = DB::table('delete_approval')->where('id',$id)->first();
		if ($status == 1) {
			if ($item->type == "lead") {
				DB::table('leads')->where('id',$item->main)->delete();				
			}else if ($item->type == "expenses") {
				DB::table('expenses')->where('id',$item->main)->delete();				
			}else if ($item->type == "employee") {
				DB::table('z_user')->where('id',$item->main)->update(['df' => 'yes']);
			}else if ($item->type == "student") {
				DB::table('students')->where('id',$item->main)->delete();
			}else if ($item->type == "attendance") {
				DB::table('manage_attendance')->where('id',$item->main)->delete();
			}

			DB::table('delete_approval')->where('id',$id)->delete();
			Session::flash('success', 'Request Approved'); 
		}else{
			DB::table('delete_approval')->where('id',$id)->delete();
			Session::flash('success', 'Request Rejected'); 
		}

		return Redirect()->back();
	}

	public function deletereq()
	{
		$data['_title'] = 'Delete Requests';
		$data['list'] 	= DB::table('delete_approval')->get();
		return view('admin.settings.deletereq',$data);	
	}

	public function profile()
	{
		$data['_title'] = 'My Profile';	
		$data['item']	 = DB::table('z_user')->where('id',Session::get('AdminId'))->first();
		return view('admin.settings.profile',$data);	
	}

	public function profileSave(Request $rec)
	{
		$data = [
			'name'			=> 	$rec->name,
			'username'		=> 	$rec->username,
			'email'			=> 	$rec->email,
			'mobile'		=> 	$rec->mobile
		];

		DB::table('z_user')->where('id',Session::get('AdminId'))->update($data);

		if ($rec->password != "") {
			$data = [
				'password'		=> 	md5($rec->password),
			];

			DB::table('z_user')->where('id',Session::get('AdminId'))->update($data);					
		}

		Session::flash('success', 'Profile updated.'); 
		return Redirect($this->aUrl('/profile'));	
	}

	public function footerLinks()
	{
		$data['_title'] = 'Footer Links';
		$data['list'] 	= DB::table('cms_footer_links')->get();
		$data['_e']		= 0;
		return view('admin.settings.footer-links',$data);		
	}

	public function footerLinksEdit($id)
	{
		$data['_title'] = 'Footer Links';
		$data['list'] 	= DB::table('cms_footer_links')->get();
		$data['item'] 	= DB::table('cms_footer_links')->where('id',$id)->first();
		$data['link_list'] 	= DB::table('cms_footer_links_a')->where('parent',$id)->get();
		$data['_e']		= 1;
		return view('admin.settings.footer-links',$data);	
	}

	public function footerLinksUpdate(Request $rec)
	{
		DB::table('cms_footer_links_a')->where('parent',$rec->id)->delete();
		foreach ($rec->name as $key => $value) {
			//print_r($rec->link[$key]);	
			$data = [
				'name'		=> $rec->name[$key],
				'link'		=> $rec->link[$key],
				'parent'	=> $rec->id
			];
			DB::table('cms_footer_links_a')->insert($data);
		}
		
		Session::flash('success', 'Links updated.'); 
	    return Redirect($this->aUrl('/footer-links'));
	}

	public function socialLinks()
	{
		$data['_title'] = 'Social Links';
		$data['list'] 	= DB::table('cms_social_links')->orderby('sort','asc')->get();
		$data['_e']		= 0;
		return view('admin.settings.social-links',$data);	
	}

	public function socialLinksEdit($id)
	{
		$data['_title'] 	= 'Social Links';
		$data['list'] 		= DB::table('cms_social_links')->orderby('sort','asc')->get();
		$data['item'] 	= DB::table('cms_social_links')->where('id',$id)->first();
		$data['_e']			= 1;
		return view('admin.settings.social-links',$data);	
	}

	public function socialLinksDelete($id)
	{
		DB::table('cms_social_links')->where('id',$id)->delete();	 

	    Session::flash('success', 'Social link deleted.'); 
	    return Redirect($this->aUrl('/common/social-links'));
	}

	public function socialLinksUpdate(Request $rec)
	{
		$data = [
	    	'name'		=> $rec->name,
	    	'icon'		=> $rec->icon,
	    	'link'		=> $rec->link,
	    	'color'		=> $rec->color,
	    	'sort'		=> $rec->sort
	    ];
	    DB::table('cms_social_links')->where('id',$rec->id)->update($data);	 

	    Session::flash('success', 'Social link updated.'); 
	    return Redirect($this->aUrl('/common/social-links'));
	}

	public function socialLinksSave(Request $rec)
	{
		$data = [
	    	'name'		=> $rec->name,
	    	'icon'		=> $rec->icon,
	    	'link'		=> $rec->link,
	    	'color'		=> $rec->color,
	    	'sort'		=> $rec->sort
	    ];
	    DB::table('cms_social_links')->insert($data);	

	    Session::flash('success', 'Social link created.'); 
	    return Redirect($this->aUrl('/common/social-links'));	 
	}

	public function index()
	{
		$data['_title'] = 'Settings';
		$data['item'] 	= DB::table('cms_zsettings')->where('id','1')->first();
		return view('admin.settings.index',$data);	
	}

	public function save(Request $rec)
	{
		$old = DB::table('cms_zsettings')->where('id','1')->first();
		$imageName = "";
		if ($rec->hasFile('logo')) {
	        $image = $rec->file('logo');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/settings/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/settings/'.$old->logo))) {
					@unlink(public_path('uploads/settings/'.$old->logo));
				}
				$data = [
			    	'logo'		=> $imageName
			    ];
			    DB::table('cms_zsettings')->where('id','1')->update($data);	        	
	        }
	    }
	    $imageName = "";
		if ($rec->hasFile('favicon')) {
	        $image = $rec->file('favicon');
	        $imageName = microtime(true).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('uploads/settings/');
	        if($image->move($destinationPath, $imageName)){
				if (file_exists( public_path('uploads/settings/'.$old->favicon))) {
					@unlink(public_path('uploads/settings/'.$old->favicon));
				}
				$data = [
			    	'favicon'		=> $imageName
			    ];
			    DB::table('cms_zsettings')->where('id','1')->update($data);	        	
	        }
	    }

	    $data = [
	    	'mail_host'		=> $rec->mail_host,
	    	'mail_user'		=> $rec->mail_user,
	    	'mail_port'		=> $rec->mail_port,
	    	'mail_pass'		=> $rec->mail_pass,
	    	'mail_from'		=> $rec->mail_from,
	    	'mail_from_name'		=> $rec->mail_from_name,
	    	'phone'			=> $rec->phone,
	    	'email'			=> $rec->email,
	    	'nemail'		=> $rec->nemail,
	    	'footer_desc'		=> $rec->footer_desc,
	    ];
	    DB::table('cms_zsettings')->where('id','1')->update($data);	    

	    Session::flash('success', 'Settings saved.'); 
	    return Redirect($this->aUrl('/settings'));	
	}

}