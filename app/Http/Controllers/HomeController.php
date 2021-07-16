<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;
use Session;

class HomeController extends BaseController
{


    public function test()
    {
        print_r($this->sendEmail('mehul9921@gmail.com',"Final Email",'this is content'));
    }

    public function login()
    {
        $data['_title']     = 'Login';
        return view('web.login',$data);   
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

    public function listing()
    {
        $data['content']    = DB::table('cms_listing_content')->where('id','1')->first();
        $data['_title']     = $data['content']->title;
        return view('web.listing',$data);   
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

    public function dashboard()
    {
        return view('web.dashboard');   
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
