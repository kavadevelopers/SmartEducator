<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class ReviewController extends BaseController
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

	public function index()
	{
		$data['_title'] = 'Manage Reviews';
		$data['list'] 	= DB::table('student_reviews')->where('df','')->orderby('id','desc')->get();
		return view('admin.reviews.index',$data);	
	}

	public function status($status,$id)
	{
		DB::table('student_reviews')->where('id',$id)->update(['status' => $status]);
		if ($status == 1) {
			Session::flash('success', 'Review Approved'); 	
		}else{
			Session::flash('success', 'Review Rejected'); 
		}

	    return Redirect($this->aUrl('/reviews'));
	}

	public function delete($id)
	{
		DB::table('student_reviews')->where('id',$id)->update(['df' => 'yes']);
		Session::flash('success', 'Review deleted'); 
		return Redirect($this->aUrl('/reviews'));
	}

	public function save(Request $rec)
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

        Session::flash('success', 'Review successfully saved.'); 
        return Redirect($this->aUrl('/reviews'));
	}

	public function update(Request $rec)
	{
		$data = [
            'rating'        => isset($rec->erating) ? ($rec->erating) : 1,
            'name'          => $rec->ename,
            'email'         => $rec->eemail,
            'phone'         => isset($rec->ephone) ? ($rec->ephone) : '',
            'review'        => $rec->edesc,
        ];
        DB::table('student_reviews')->where('id',$rec->eid)->update($data);

        Session::flash('success', 'Review successfully saved.'); 
        return Redirect($this->aUrl('/reviews'));
	}
}