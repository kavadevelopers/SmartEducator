<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;

class HomeController extends BaseController
{
    public function index()
    {
        $data['_title']     = 'Home';
        $data['sliders']    = DB::table('cms_home_slider')->orderby('sort','asc')->get();
        $data['steps']      = DB::table('cms_home_steps')->where('id','1')->first();
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
}
