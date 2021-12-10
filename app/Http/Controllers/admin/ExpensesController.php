<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

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

	public function download($_from = false,$_to = false)
	{	
		$from = ""; $to = "";
		if ($_from != "na") {
			$from = $_from;
		}
		if ($_to != "na") {
			$to = $_to;
		}
		Excel::create('Expenses-'.date('Y-m-d H:i:s'), function($excel) use($from,$to){	
			$excel->sheet('Data', function($sheet) use($from,$to) {
				$sheet->cell('A1:D1',function($cell){  $cell->setFontWeight('bold'); $cell->setFontSize(14); });
				$sheet->cell('A2:D2',function($cell){  $cell->setFontWeight('bold'); $cell->setFontSize(14); });
				$sheet->mergeCells('A1:D1');
				$sheet->cell('A1', function($cell)use($from,$to) {$cell->setValue('Expenses '.$from.' - '.$to);   });
				$sheet->cell('A2', function($cell) {$cell->setValue('Date');   });
				$sheet->cell('B2', function($cell) {$cell->setValue('Description');   });
                $sheet->cell('C2', function($cell) {$cell->setValue('Remarks');   });
                $sheet->cell('D2', function($cell) {$cell->setValue('Amount');   });


                $query = DB::table('expenses');
				if ($from != "") {
					$query->where('dt','>=',date('Y-m-d',strtotime($from)));
				}
				if ($to != "") {
					$query->where('dt','<=',date('Y-m-d',strtotime($to)));
				}
                $list 	= $query->orderby('dt','desc')->get();
                $total = 0;
                foreach($list as $key => $item) {
					$i= $key+3;
					$sheet->cell('A'.$i, date('d M Y',strtotime($item->dt)));
					$sheet->cell('B'.$i, $item->descr);
	                $sheet->cell('C'.$i, $item->notes);
	                $sheet->cell('D'.$i, $item->amount);
	                $total += $item->amount;
				}
                
                $sheet->cell('A'.($i+1).':D2'.($i+1),function($cell){  $cell->setFontWeight('bold'); $cell->setFontSize(14); });
				$sheet->cell('C'.($i+1), function($cell) {$cell->setValue('Total');   });
                $sheet->cell('D'.($i+1), function($cell) use ($total) {$cell->setValue($total);   });                
			});
		})->export('xlsx');
	}


	public function index(Request $rec)
	{
		$data['_title'] = 'Expenses';
		$data['rec'] 	= $rec;
		$query = DB::table('expenses');
		if ($rec->from) {
			$query->where('dt','>=',date('Y-m-d',strtotime($rec->from)));
		}
		if ($rec->to) {
			$query->where('dt','<=',date('Y-m-d',strtotime($rec->to)));
		}
		$data['list'] 	= $query->orderby('dt','desc')->get();
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
					'notes'		=> $rec->notes[$key]?$rec->notes[$key]:'',
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
		

		if (Session::get('AdminId') == "1") {
			DB::table('expenses')->where('id',$id)->delete();
			Session::flash('success', 'Expenses deleted.'); 	
		}else{
			DB::table('delete_approval')->insert([
				'type'	=> 'expenses',
				'main'	=> $id,
				'cby'	=> Session::get('AdminId')
			]);
			Session::flash('success', 'Delete Request sent to admin'); 	
		}
	    return Redirect($this->aUrl('/expenses'));
	}
}