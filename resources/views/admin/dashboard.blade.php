@extends('admin.layouts.main')


@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-md-6">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Dashboard</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php if(App\Http\Controllers\admin\BaseController::checkRight(1)){ ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="fa fa-shopping-bag bg-c-blue card1-icon"></i>
                                <span class="text-c-blue f-w-600">Courses</span>
                                <h4><?= DB::table('courses')->where('df','')->count(); ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if(App\Http\Controllers\admin\BaseController::checkRight(6)){ ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="fa fa-user-md bg-c-pink card1-icon"></i>
                                <span class="text-c-pink f-w-600">Employees</span>
                                <h4><?= DB::table('z_user')->where('df','')->where('id','!=','1')->count(); ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if(App\Http\Controllers\admin\BaseController::checkRight(5)){ ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="fa fa-calendar bg-c-yellow card1-icon"></i>
                                <span class="text-c-yellow f-w-600">Leads</span>
                                <?php if(Session::get('AdminId') == "1"){ ?>
                                    <h4><?= DB::table('leads')->count(); ?></h4>
                                <?php }else{ ?>
                                    <h4><?= DB::table('leads')->where('cby',Session::get('AdminId'))->count(); ?></h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if(App\Http\Controllers\admin\BaseController::checkRight(17)){ ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="fa fa-users bg-c-green card1-icon"></i>
                                <span class="text-c-green f-w-600">Students</span>
                                <h4><?= DB::table('students')->count(); ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if(Session::get('AdminId') == "1"){ ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="card widget-card-1">
                            <div class="card-block-small">
                                <i class="fa fa-reply bg-c-pink card1-icon"></i>
                                <span class="text-c-pink f-w-600">Delete Requests</span>
                                <h4><?= DB::table('delete_approval')->count(); ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php if(App\Http\Controllers\admin\BaseController::checkRight(5)){ ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Appointments</h5>
                    </div>
                    <div class="card-block table-responsive">
                        <table class="table table-bordered table-mini table-dt10">
                            <thead>
                                <tr>
                                    <th class="text-center">Sr. No.</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th class="text-center">Status</th>
                                    <?php if(Session::get('AdminId') == "1"){ ?>
                                        <th>Employee</th>   
                                    <?php } ?>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><?= $value->id ?></td>
                                        <td><?= $value->name ?></td>
                                        <td><?= $value->mobile ?></td>
                                        <td><?= $value->email ?></td>
                                        <td class="text-center">
                                            <?= ucfirst($value->status) ?>
                                            <?php if($value->status == "Appointment fixed"){ ?>
                                                <br><small>At : <?= date('d-m-Y h:i A',strtotime($value->adate)); ?></small>
                                            <?php } ?>
                                        </td>
                                        <?php if(Session::get('AdminId') == "1"){ ?>
                                            <td>
                                                <?php if($value->cby != "" && DB::table('z_user')->where('id',$value->cby)->first()){ ?>
                                                    <small><?= DB::table('z_user')->where('id',$value->cby)->first()->name ?></small>
                                                <?php } ?>
                                            </td>
                                        <?php } ?>
                                        <td class="text-center">
                                            <small><?= $value->cat ?></small>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/view/'.$value->id) ?>" class="btn btn-success btn-mini" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-success btn-mini btn-statuschange" data-values="<?= htmlspecialchars(json_encode($value), ENT_QUOTES, 'UTF-8'); ?>" data-adate="<?= $value->adate; ?>" title="Change Status">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

@stop