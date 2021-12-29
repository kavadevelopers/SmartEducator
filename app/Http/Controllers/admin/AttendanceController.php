<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use Session;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends BaseController
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

	public function attendanceDownload(Request $rec)
	{

		Excel::create('Attendance-'.date('Y-m-d H:i:s'), function($excel) use($rec){	
			$excel->sheet('Data', function($sheet) use($rec) {
				$sheet->cell('A1:C1',function($cell){  $cell->setFontWeight('bold'); $cell->setFontSize(14); });
				$sheet->cell('A2:C2',function($cell){  $cell->setFontWeight('bold'); $cell->setFontSize(14); });
				$sheet->mergeCells('A1:C1');
				$sheet->cell('A1', function($cell) {$cell->setValue('Attendance');   });
				$sheet->cell('A2', function($cell) {$cell->setValue('Date');   });
				$sheet->cell('B2', function($cell) {$cell->setValue('Employee');   });
                $sheet->cell('C2', function($cell) {$cell->setValue('Type');   });

                $query = DB::table('manage_attendance');

				if ($rec->employee) {
					$query->where('employee',$rec->employee);
				}
				if ($rec->type) {
					$query->where('type',$rec->type);
				}
				if ($rec->from) {
					$query->where('cat','>=',date('Y-m-d',strtotime($rec->from)).' 00:00:00');
				}
				if ($rec->to) {
					$query->where('cat','<=',date('Y-m-d',strtotime($rec->to)).' 23:59:59');
				}

				if ($rec->employee || $rec->type || $rec->from || $rec->to) {
					$list 	= $query->orderby('cat','desc')->get();
				}else{
					$list 	= $query->orderby('cat','desc')->limit(200)->get();
				}
                foreach($list as $key => $item) {
                	$em = DB::table('z_user')->where('id',$item->employee)->first();
					$i= $key+3;
					$sheet->cell('A'.$i, date('d M Y h:i A',strtotime($item->cat)));
					$sheet->cell('B'.$i, $em->name);
	                $sheet->cell('C'.$i, $item->type);
				}
			});
		})->export('xlsx');
	}

	public function atDelete($id)
	{
		if (Session::get('AdminId') == "1") {
			DB::table('manage_attendance')->where('id',$id)->delete();
			Session::flash('success', 'Attendance deleted.'); 	
		}else{
			DB::table('delete_approval')->insert([
				'type'	=> 'attendance',
				'main'	=> $id,
				'cby'	=> Session::get('AdminId'),
				'cat'		=> date('Y-m-d H:i:s')
			]);
			Session::flash('success', 'Delete Request sent to admin'); 	
		}
		return Redirect()->back();	
	}

	public function attendance_save(Request $rec)
	{
		$data = [
	    	'type'			=> $rec->type,
	    	'employee'		=> $rec->employee,
	    	'remarks'		=> $rec->notes?$rec->notes:'',
	    	'dt'			=> date('Y-m-d',strtotime($rec->date)),
	    	'cat'			=> date('Y-m-d H:i:s')
	    ];
	    DB::table('manage_attendance')->insert($data);	

	    Session::flash('success', 'Saved'); 
	    return Redirect()->back();	
	}

	public function attendance(Request $rec)
	{
		$data['rec'] 	= $rec;
		$data['_title'] = 'Manage Attendance';
		$query = DB::table('manage_attendance');

		if ($rec->employee) {
			$query->where('employee',$rec->employee);
		}
		if ($rec->type) {
			$query->where('type',$rec->type);
		}
		if ($rec->from) {
			$query->where('cat','>=',date('Y-m-d',strtotime($rec->from)).' 00:00:00');
		}
		if ($rec->to) {
			$query->where('cat','<=',date('Y-m-d',strtotime($rec->to)).' 23:59:59');
		}

		if ($rec->employee || $rec->type || $rec->from || $rec->to) {
			$data['list'] 	= $query->orderby('cat','desc')->get();
		}else{
			$data['list'] 	= $query->orderby('cat','desc')->limit(200)->get();
		}
		return view('admin.attendance.list',$data);		
	}

	public function attypeDel($id)
	{
		$data = [
	    	'df'		=> "yes"
	    ];
	    DB::table('manage_attendance_types')->where('id',$id)->update($data);	

	    Session::flash('success', 'Type deleted.'); 
	    return Redirect()->back();
	}

	public function attype()
	{
		$data['_title'] = 'Manage Attendance Type';
		$data['list'] 	= DB::table('manage_attendance_types')->where('df','')->get();
		$data['_e']		= 0;
		return view('admin.attendance.types',$data);	
	}

	public function edit_attype($id)
	{
		$data['_title'] = 'Manage Attendance Type';
		$data['list'] 	= DB::table('manage_attendance_types')->where('df','')->get();
		$data['item'] 	= DB::table('manage_attendance_types')->where('id',$id)->first();
		$data['_e']		= 1;
		return view('admin.attendance.types',$data);	
	}

	public function save_attype(Request $rec)
	{
		$data = [
	    	'name'		=> $rec->name,
	    	'df'		=> ""
	    ];
	    DB::table('manage_attendance_types')->insert($data);	

	    Session::flash('success', 'Type created.'); 
	    return Redirect()->back();
	}

	public function update_attype(Request $rec)
	{
		$data = [
	    	'name'		=> $rec->name
	    ];
	    DB::table('manage_attendance_types')->where('id',$rec->id)->update($data);	

	    Session::flash('success', 'Type updated.'); 
	    return Redirect($this->aUrl('/attype'));
	}
}