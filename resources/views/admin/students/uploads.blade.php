@extends('admin.layouts.main')
@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-md-6">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4><?= $_title ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/students/uploads') ?>" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-block table-responsive">
            		<table class="table table-bordered table-mini">
            			<tr>
            				<td class="" colspan="7">
            					<a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/students/uploads/skip') ?>" class="btn btn-warning btn-mini">Skip</a>
            					<button type="submit" class="btn btn-success btn-mini">Save</button>
            				</td>
            			</tr>
            			<tr>
            				<th>Student Name</th>
                            <th>10TH</th>
                            <th>12TH</th>
                            <th>ID PROOF</th>
                            <th>Photo</th>
                            <th>MS 1</th>
                            <th>MS 2</th>
                            <th>MS 3</th>
                            <th>MS 4</th>
                            <th>MS 5</th>
                            <th>MS 6</th>
                            <th>MIGRATION</th>
                            <th>PROVISIONAL</th>
            				<th>DEGREE / CONVOCATION</th>
                            <th>TRANSCRIPT</th>
                            <th>VL</th>
                            <th>SCAN</th>
            			</tr>
            			<?php foreach($list as $val){ ?>
            				<tr>
            					<td><?= $val->name ?><input type="hidden" name="id[]" value="<?= $val->id ?>"></td>
            					<td class="td-min-width"><input type="file" name="a10th[]" onchange="maxSizeFile(this)" class="form-control"></td>
            					<td class="td-min-width"><input type="file" name="a12th[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="idproof[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="photo[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="ms1[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="ms2[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="ms3[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="ms4[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="ms5[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="ms6[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="migration[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="provisional[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="degree[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="transcript[]" onchange="maxSizeFile(this)" class="form-control"></td>
                                <td class="td-min-width"><input type="file" name="vl[]" onchange="maxSizeFile(this)" class="form-control"></td>
            					<td class="td-min-width"><input type="file" name="scan[]" onchange="maxSizeFile(this)" class="form-control"></td>
            				</tr>
            			<?php } ?>
            			<tr>
            				<td class="" colspan="7">
            					<a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/uploads/skip') ?>" class="btn btn-warning btn-mini">Skip</a>
            					<button type="submit" class="btn btn-success btn-mini">Save</button>
            				</td>
            			</tr>
            		</table>
            	</div>
            </div>
        </div>
    </div>
</div>
</form>

<style type="text/css">
    .td-min-width{
        min-width: 150px;
    }
</style>
@stop