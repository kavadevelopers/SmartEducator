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
            <div class="col-md-6 text-right">
                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/courses/add') ?>" class="btn btn-primary btn-mini">
                    <i class="fa fa-plus"></i> Add
                </a>
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
                                    <th>Name</th>
                                    <th class="text-center">Duration</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $key + 1 ?>
                                        </td>
                                        <th><?= $value->name ?></th>
                                        <td class="text-center"><?= $value->duration ?></td>
                                        <td class="text-center">
                                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/courses/edit/'.$value->id) ?>" class="btn btn-primary btn-mini" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/courses/'.$value->id) ?>" class="btn btn-danger btn-mini btn-delete" title="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
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