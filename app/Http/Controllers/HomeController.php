<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;
use Session;
use Redirect;

class HomeController extends BaseController
{


    public function test()
    {
        print_r($this->sendEmail('mehul9921@gmail.com',"Final Email",'this is content'));
    }

    public function forgetPassword()
    {
        $data['_title']     = 'Reset Password';
        return view('web.forgetpassword',$data);       
    }

    public function forgetPasswordPost(Request $rec)
    {
        $user = DB::table('students')->where('email',$rec->email)->first();
        if ($user) {
            $token = md5(microtime(true));
            DB::table('z_user_password')->insert([
                'user'      => $user->id,
                'token'     => $token,
                'used'      => '0'
            ]);
            $link = url('').'/reset-password/'.$token;
            $template = "<p>Hello</p>";
            $template .= '<p>Use this link for reset your account password <a href="'.$link.'">Click Here</a></p>';
            $this->sendEmail($user->email,"Reset Password",$template);
            Session::flash('success', 'Reset Email sent. Please check your email.'); 
            return Redirect('login');        
        }else{
            Session::flash('error', 'Email not registered.'); 
            return Redirect('forget-password')->withInput();        
        }
    }

    public function resetPassword($id)
    {
        $item = DB::table('z_user_password')->where('token',$id)->where('used','0')->first();
        if ($item) {
            $data['_title']     = 'Reset Password';
            $data['item']       = $item;
            return view('web.resetpass',$data);       
        }else{
            return Redirect('home');
        }
    }

    public function resetPasswordSave(Request $rec)
    {
        if ($rec->password == $rec->cpassword) {
            DB::table('students')->where('id',$rec->id)->update(['password' => $rec->password]);
            DB::table('z_user_password')->where('token',$rec->token)->update(['used' => '1']);
            Session::flash('success', 'Password Updated'); 
            return Redirect('home');
        }else{
            Session::flash('error', 'Password and Confirm Password not match.'); 
            return Redirect::back()->withInput();
        }
    }

    public function dashboard()
    {
        if (Session::has('WebId')) {
            $data['_title']     = 'Dashboard';
            $data['user']       = DB::table('students')->where('id',Session::get('WebId'))->first();
            return view('web.dashboard',$data);   
        }else{
            return Redirect('login');    
        }
    }

    public function profile(Request $rec)
    {
        DB::table('students')->where('id',Session::get('WebId'))->update(['name' => $rec->name]);
        if ($rec->password) {
            DB::table('students')->where('id',Session::get('WebId'))->update(['password' => $rec->password]);
        }

        Session::flash('success', 'Profile Saved'); 
        return Redirect('dashboard');        
    }

    public function uploads(Request $rec)
    {
        if ($rec->hasFile('10th')) {
            $image = $rec->file('10th');
            $a10th = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $a10th)){
                DB::table('students')->where('id',$rec->id)->update(['10th' => $a10th]);
            }
        }

        if ($rec->hasFile('12th')) {
            $image = $rec->file('12th');
            $a12th = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $a12th)){
                DB::table('students')->where('id',$rec->id)->update(['12th' => $a12th]);
            }
        }

        if ($rec->hasFile('idproof')) {
            $image = $rec->file('idproof');
            $idproof = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $idproof)){
                DB::table('students')->where('id',$rec->id)->update(['idproof' => $idproof]);
            }
        }

        if ($rec->hasFile('photo')) {
            $image = $rec->file('photo');
            $photo = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $photo)){
                DB::table('students')->where('id',$rec->id)->update(['photo' => $photo]);
            }
        }

        if ($rec->hasFile('ms1')) {
            $image = $rec->file('ms1');
            $ms1 = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $ms1)){
                DB::table('students')->where('id',$rec->id)->update(['ms1' => $ms1]);
            }
        }

        if ($rec->hasFile('ms2')) {
            $image = $rec->file('ms2');
            $ms2 = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $ms2)){
                DB::table('students')->where('id',$rec->id)->update(['ms2' => $ms2]);
            }
        }

        if ($rec->hasFile('ms3')) {
            $image = $rec->file('ms3');
            $ms3 = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $ms3)){
                DB::table('students')->where('id',$rec->id)->update(['ms3' => $ms3]);
            }
        }

        if ($rec->hasFile('ms4')) {
            $image = $rec->file('ms4');
            $ms4 = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $ms4)){
                DB::table('students')->where('id',$rec->id)->update(['ms4' => $ms4]);
            }
        }

        if ($rec->hasFile('ms5')) {
            $image = $rec->file('ms5');
            $ms5 = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $ms5)){
                DB::table('students')->where('id',$rec->id)->update(['ms5' => $ms5]);
            }
        }

        if ($rec->hasFile('ms6')) {
            $image = $rec->file('ms6');
            $ms6 = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $ms6)){
                DB::table('students')->where('id',$rec->id)->update(['ms6' => $ms6]);
            }
        }

        if ($rec->hasFile('migration')) {
            $image = $rec->file('migration');
            $migration = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $migration)){
                DB::table('students')->where('id',$rec->id)->update(['migration' => $migration]);
            }
        }

        if ($rec->hasFile('provisional')) {
            $image = $rec->file('provisional');
            $provisional = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $provisional)){
                DB::table('students')->where('id',$rec->id)->update(['provisional' => $provisional]);
            }
        }

        if ($rec->hasFile('degree')) {
            $image = $rec->file('degree');
            $degree = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $degree)){
                DB::table('students')->where('id',$rec->id)->update(['degree' => $degree]);
            }
        }

        if ($rec->hasFile('transcript')) {
            $image = $rec->file('transcript');
            $transcript = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $transcript)){
                DB::table('students')->where('id',$rec->id)->update(['transcript' => $transcript]);
            }
        }

        if ($rec->hasFile('vl')) {
            $image = $rec->file('vl');
            $vl = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $vl)){
                DB::table('students')->where('id',$rec->id)->update(['vl' => $vl]);
            }
        }

        if ($rec->hasFile('scan')) {
            $image = $rec->file('scan');
            $scan = microtime(true).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/students/');
            if($image->move($destinationPath, $scan)){
                DB::table('students')->where('id',$rec->id)->update(['scan' => $scan]);
            }
        }

        Session::flash('success', 'Documents Saved'); 
        return Redirect('dashboard');  
    }

    public function logout()
    {
        Session::forget('WebId');
        Session::flash('success', 'Logout Success');
        return Redirect('home');        
    }

    public function login()
    {
        $data['_title']     = 'Student Login';
        return view('web.login',$data);   
    }

    public function loginTry(Request $rec)
    {
        $user = DB::table('students')->where('email',$rec->email)->first();
        if ($user) {
            if ($user->password == $rec->password) {
                Session::put('WebId',$user->id);
                return Redirect('dashboard');        
            }else{
                Session::flash('error', 'Email and Password do not match.'); 
                return Redirect('login')->withInput();        
            }
        }else{
            Session::flash('error', 'Email not registered.'); 
            return Redirect('login')->withInput();        
        }
    }

    public function index()
    {
        $data['_title']     = 'Home';
        $data['sliders']    = DB::table('cms_home_slider')->orderby('sort','asc')->get();
        $data['steps']      = DB::table('cms_home_steps')->where('id','1')->first();
        $data['reviews']    = $this->getReviewsList();
        return view('web.home',$data);
    }

    public function about()
    {
        $data['_title']     = 'About us';
        $data['sliders']    = DB::table('cms_about_slider')->orderby('sort','asc')->get();
        $data['teams']    = DB::table('cms_about_team')->orderby('sort','asc')->get();
        $data['content']    = DB::table('cms_about_content')->where('id','1')->first();
        return view('web.about',$data);   
    }

    public function blog()
    {
        $data['_title']     = 'Blog';
        $data['content']    = DB::table('cms_blog_content')->where('id','1')->first();
        $data['list']       = DB::table('cms_blog_list')->orderby('id','desc')->get();
        $data['count']       = DB::table('cms_blog_list')->orderby('id','desc')->count();
        return view('web.blog',$data);   
    }

    public function listing(Request $rec)
    {
        if ($rec->q && $rec->q != "") {
            $data['list']       = DB::table('courses')->where('name','like','%'.$rec->q.'%')->where('df','')->get();
        }else{
            $data['list']       = DB::table('courses')->where('df','')->get(); 
        }
        $data['content']    = DB::table('cms_listing_content')->where('id','1')->first();
        $data['sliders']    = DB::table('cms_listing_slider')->orderby('sort','asc')->get();
        $data['_title']     = $data['content']->title;
        return view('web.listing',$data);   
    }

    public function uapprovals()
    {
        $data['_title']     = 'All University’s Approvals';
        $data['content']    = DB::table('cms_content_uapprovals')->where('id','1')->first();
        return view('web.uapprovals',$data);  
    }

    public function listingGraduation()
    {
        $data['content']    = DB::table('cms_listing_content')->where('id','1')->first();
        $data['list']       = DB::table('courses')->where('category','1')->where('df','')->get();
        $data['_title']     = 'Graduation Courses';
        return view('web.listing2',$data);   
    }

    public function listingPostGraduation()
    {
        $data['content']    = DB::table('cms_listing_content')->where('id','1')->first();
        $data['list']       = DB::table('courses')->where('category','2')->where('df','')->get();
        $data['_title']     = 'Post Graduation Courses';
        return view('web.listing2',$data);   
    }

    public function course($id)
    {
        $blog = DB::Table('courses')->where('id',$id)->where('df','')->first();
        if ($blog) {
            $data['item']       = $blog;
            $data['_title']     = $blog->name;
            return view('web.course',$data);   
        }else{
            return Response::view('errors.404',array(),404);
        }
    }

    public function contact()
    {
        $data['content']    = DB::table('cms_contact_content')->where('id','1')->first();
        $data['_title']     = $data['content']->title;
        return view('web.contact',$data);   
    }

    public function vblog($id)
    {
        $blog = DB::Table('cms_blog_list')->where('id',$id)->first();
        if ($blog) {
            $data['blog']       = $blog;
            $data['_title']     = $blog->title;
            return view('web.vblog',$data);   
        }else{
            return Response::view('errors.404',array(),404);
        }
    }



    public function page($slug)
    {
        if ($slug == "admin") {
            return Redirect($this->aUrl('/login'));   
        }else{
            $page = DB::table('pages')->where('slug',$slug)->first();
            if ($page) {
                $data['_title']     = $page->name;
                $data['content']    = $page->content;
                $data['banner']      = $this->getPageBanner($page->id);
                return view('web.page',$data);
            }else{
                return Response::view('errors.404',array(),404);
            }
        }
    }

    public function savereview(Request $rec)
    {
        $data = [
            'rating'        => isset($rec->rating) ? ($rec->rating) : 1,
            'name'          => $rec->name,
            'email'         => $rec->email,
            'phone'         => isset($rec->phone) ? ($rec->phone) : '',
            'review'        => $rec->desc,
            'status'        => '0',
            'df'            => '',
            'cat'           => date('Y-m-d H:i:s'),
        ];
        DB::table('student_reviews')->insert($data);

        Session::flash('success', 'Review successfully sent. Thank you.'); 
        return Redirect('home');    
    }

    public function saveContactForm(Request $rec)
    {
        $data = [
            'name'          => $rec->name,
            'email'         => $rec->email,
            'phone'         => $rec->phone,
            'subject'        => $rec->subject,
            'message'        => $rec->message,
            'cat'           => date('Y-m-d H:i:s'),
        ];
        DB::table('contact_form')->insert($data);


        $str = '<p>';
            $str .= '<p><b>Name </b>: '.$rec->name.'</p>';    
            $str .= '<p><b>Email </b>: '.$rec->email.'</p>';    
            $str .= '<p><b>Phone </b>: '.$rec->phone.'</p>';    
            $str .= '<p><b>Course </b>: '.$rec->subject.'</p>';    
            $str .= '<p><b>Message </b>: '.$rec->message.'</p>';    
        $str .= '</p>';

        $this->sendEmail($this->getSetting()->nemail,$rec->subject,$str);

        Session::flash('success', 'Email sent. Thank you.'); 
        return Redirect::to($rec->uri);
    }

    public function getReviewsList()
    {
        $reviews            = DB::table('student_reviews')->where('df','')->where('status','1')->orderby(DB::raw('RAND()'));
        $rArray             = [];

        if(fmod($reviews->count() / 3, 1) !== 0.00){
            $revCount = floor($reviews->count() / 3) + 1;    
        } else {
            $revCount = $reviews->count() / 3;
        }
        $usedCounter = 0;
        $revList = $reviews->get();
        for ($i=1; $i <= $revCount; $i++) {
            $singArray = []; 
            foreach ($revList as $key => $value) {
                if ($key + 1 > $usedCounter) {
                    if (count($singArray) == 3) {
                        break;
                    }else{
                        $usedCounter++;
                        array_push($singArray,$value);
                    }
                }
            }
            array_push($rArray,$singArray);
        }

        return $rArray;
    }
}
