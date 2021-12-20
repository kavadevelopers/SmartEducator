@extends('admin.layouts.main')


@section('content')
<form method="post" action="{{ App\Http\Controllers\admin\BaseController::aUrl('/attendance/download') }}">
{{ csrf_field() }}
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-md-6">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4><?= $_title ?></h4>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-right">
            <?php if(App\Http\Controllers\admin\BaseController::checkRight(28)){ ?>
            <button type="submit" class="btn btn-primary btn-mini">
                <i class="fa fa-download"></i> Download
            </button>
            <?php } ?>
            <a href="#" class="btn btn-success btn-mini btnTakeAttendance">
                <i class="fa fa-plus"></i> Add
            </a>
        </div>
    </div>
</div>
<input type="hidden" name="type" value="<?= $rec->type?$rec->type:'' ?>">
<input type="hidden" name="employee" value="<?= $rec->employee?$rec->employee:'' ?>">
<input type="hidden" name="from" value="<?= $rec->from?$rec->from:'' ?>">
<input type="hidden" name="to" value="<?= $rec->to?$rec->to:'' ?>">
</form>
<div class="row">
    <div class="col-sm-12">
        <form method="post" action="{{ App\Http\Controllers\admin\BaseController::aUrl('/attendance') }}">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h5>Filter</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="feather icon-plus minimize-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block" style="display: none;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" name="type">
                                    <option value="">-- Select --</option>
                                    <?php foreach(DB::table('manage_attendance_types')->where('df','')->get() as $val){ ?>
                                        <option value="<?= $val->name ?>" <?= $rec->type&&$rec->type==$val->name?'selected':'' ?>><?= $val->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Employee</label>
                                <select class="form-control" name="employee">
                                    <option value="">-- Select Employee --</option>
                                    <?php foreach(DB::table('z_user')->where('id','!=','1')->get() as $val){ ?>
                                        <option value="<?= $val->id ?>" <?= $rec->employee&&$rec->employee==$val->id?'selected':'' ?>><?= $val->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>From Date</label>
                                <input name="from" type="text" placeholder="From Date" class="form-control datepicker" value="<?= $rec->from?$rec->from:'' ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>To Date</label>
                                <input name="to" type="text" placeholder="To Date" class="form-control datepicker" value="<?= $rec->to?$rec->to:'' ?>">
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <a href="{{ App\Http\Controllers\admin\BaseController::aUrl('/attendance') }}" class="btn btn-danger" type="submit">
                                <i class="fa fa-retweet"></i> Reset Filter
                            </a>
                            <button class="btn btn-warning" type="submit">
                                <i class="fa fa-filter"></i> Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block table-responsive">
                    <table class="table table-bordered table-mini table-dt">
                        <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th>Employee</th>
                                <th>Type</th>
                                <th>Remarks</th>
                                <th class="text-center">Created On</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $key => $value) { ?>
                                <?php $em = DB::table('z_user')->where('id',$value->employee)->first(); ?>
                                <tr>
                                    <td class="text-center"><?= date('d-m-Y',strtotime($value->dt)) ?></td>
                                    <td><?= $em->name ?></td>
                                    <td><?= $value->type ?></td>
                                    <td><?= nl2br($value->remarks) ?></td>
                                    <td class="text-center">
                                        <small><?= $value->cat ?></small>
                                    </td>
                                    <td class="text-center">
                                        <?php if(App\Http\Controllers\admin\BaseController::isNotDeleteSent($value->id,'attendance')){ ?>
                                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/attendance/'.$value->id) ?>" class="btn btn-danger btn-mini btn-delete" title="delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@stop
