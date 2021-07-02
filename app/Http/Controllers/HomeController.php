<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;

class HomeController extends BaseController
{
    public function index()
    {
        return view('web.home');
    }

    public function about()
    {
        return view('web.about');   
    }

    public function blog()
    {
        return view('web.blog');   
    }

    public function listing()
    {
        return view('web.listing');   
    }

    public function contact()
    {
        return view('web.contact');   
    }

    public function dashboard()
    {
        return view('web.dashboard');   
    }

    public function page($slug)
    {
        if ($slug == "admin") {
            return Redirect($this->aUrl('login'));   
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
