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
                                <h4><?= DB::table('leads')->count(); ?></h4>
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
            </div>
        </div>
    </div>
</div>

@stop