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
<form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/uploads') ?>" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            	<div class="card-block table-responsive">
            		<table class="table table-bordered table-mini">
            			<tr>
            				<td class="text-right" colspan="7">
            					<a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/uploads/skip') ?>" class="btn btn-warning btn-mini">Skip</a>
            					<button type="submit" class="btn btn-success btn-mini">Save</button>
            				</td>
            			</tr>
            			<tr>
            				<th>Employee Name</th>
            				<th>Photo</th>
            				<th>CV ATACHMENT</th>
            				<th>AGREEMENT DOCUMENT</th>
            			</tr>
            			<?php foreach($list as $val){ ?>
            				<tr>
            					<td><?= $val->name ?><input type="hidden" name="id[]" value="<?= $val->id ?>"></td>
            					<td><input type="file" name="photo[]" onchange="readFileImage(this)" class="form-control"></td>
            					<td><input type="file" name="cv[]" onchange="maxSizeFile(this)" class="form-control"></td>
            					<td><input type="file" name="agreement[]" onchange="maxSizeFile(this)" class="form-control"></td>
            				</tr>
            			<?php } ?>
            			<tr>
            				<td class="text-right" colspan="7">
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
@stop