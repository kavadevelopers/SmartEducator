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

<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block table-responsive">
                    <table class="table table-striped table-bordered table-mini table-dt">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Type</th>
                                <th class="">Description</th>
                                <th>By</th>
                                <th class="text-center">At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $key => $value) { ?>
                                <?php if($value->type == "lead"){ ?>
                                    <?php $row = DB::table('leads')->where('id',$value->main)->first(); ?>
                                <?php } ?>
                                <?php if($value->type == "expenses"){ ?>
                                    <?php $row = DB::table('expenses')->where('id',$value->main)->first(); ?>
                                <?php } ?>
                                <?php if($value->type == "employee"){ ?>
                                    <?php $row = DB::table('z_user')->where('id',$value->main)->first(); ?>
                                <?php } ?>
                                <?php if($value->type == "student"){ ?>
                                    <?php $row = DB::table('students')->where('id',$value->main)->first(); ?>
                                <?php } ?>
                                <?php if($value->type == "attendance"){ ?>
                                    <?php $row = DB::table('manage_attendance')->where('id',$value->main)->first(); ?>
                                <?php } ?>
                                <?php if($row){ ?>
                                    <tr>
                                        <td class="text-center"><?= $key +1  ?></td>
                                        <td class="text-center"><?= ucfirst($value->type) ?></td>
                                        <td>
                                            <?php if($value->type == "lead"){ ?>
                                                <?php $lead = DB::table('leads')->where('id',$value->main)->first(); ?>
                                                #<?= $lead->id ?>-<?= $lead->name ?>
                                            <?php } ?>
                                            <?php if($value->type == "expenses"){ ?>
                                                <?php $ex = DB::table('expenses')->where('id',$value->main)->first(); ?>
                                                <?= $ex->descr ?>
                                            <?php } ?>
                                            <?php if($value->type == "employee"){ ?>
                                                <?php $em = DB::table('z_user')->where('id',$value->main)->first(); ?>
                                                <?= $em->name ?>
                                            <?php } ?>
                                            <?php if($value->type == "student"){ ?>
                                                <?php $students = DB::table('students')->where('id',$value->main)->first(); ?>
                                                <?= $students->name ?>
                                            <?php } ?>
                                            <?php if($value->type == "attendance"){ ?>
                                                <?php $attend = DB::table('manage_attendance')->where('id',$value->main)->first(); ?>
                                                <?php $em = DB::table('z_user')->where('id',$attend->employee)->first(); ?>
                                                <?= $em->name ?>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?= DB::table('z_user')->where('id',$value->cby)->first()->name ?>
                                        </td>
                                        <td class="text-center">
                                            <?= date('d-m-Y h:i A',strtotime($value->cat)) ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/deletereq/'.$value->id.'/1') ?>" class="btn btn-primary btn-mini">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/deletereq/'.$value->id.'/2') ?>" class="btn btn-danger btn-mini">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </div>
</div>

@stop