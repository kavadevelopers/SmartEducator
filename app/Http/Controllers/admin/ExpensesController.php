<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;

class ExpensesController extends BaseController
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


	public function index($from = false,$to = false)
	{
		$data['_title'] = 'Expenses';
		$data['list'] 	= DB::table('expenses')->orderby('dt','desc')->get();
		return view('admin.expenses.index',$data);	
	}

	public function add()
	{
		$data['_title'] = 'Add Expenses';
		return view('admin.expenses.add',$data);		
	}

	public function save(Request $rec)
	{
		foreach ($rec->date as $key => $value) {
			if ($value != "" && $rec->desc[$key] != "" && $rec->amount[$key] != "") {
				$data = [
					'descr'		=> $rec->desc[$key],
					'amount'	=> $rec->amount[$key],
					'dt'		=> date('Y-m-d',strtotime($value)),
					'cat'		=> date('Y-m-d H:i:s')
				];
				DB::table('expenses')->insert($data);		
			}	
		}


		Session::flash('success', 'Expenses saved.'); 
	    return Redirect($this->aUrl('/expenses'));
	}

	public function delete($id)
	{
		DB::table('expenses')->where('id',$id)->delete();

		Session::flash('success', 'Expenses deleted.'); 
	    return Redirect($this->aUrl('/expenses'));
	}
}