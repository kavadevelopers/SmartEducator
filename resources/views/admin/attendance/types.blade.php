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
        <?php if($_e == 0){ ?>
            <div class="col-md-4">
                <div class="card">
                    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/attype/save') ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-block">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Reference Name <span class="-req">*</span></label>
                                    <input name="name" type="text" class="form-control"  placeholder="Reference Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success">
                                <i class="fa fa-plus"></i> Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php }else{ ?>
            <div class="col-md-4">
                <div class="card">
                    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/attype/edit') ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-block">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name <span class="-req">*</span></label>
                                    <input name="name" type="text" class="form-control" value="<?= $item->name ?>"  placeholder="Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/attype') ?>" class="btn btn-danger">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                            <button class="btn btn-success">
                                <i class="fa fa-save"></i> Save
                            </button>
                            <input type="hidden" name="id" value="<?= $item->id ?>">
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>

        <div class="col-md-8">
            <div class="card">
                <div class="card-block table-responsive">
                    <table class="table table-striped table-bordered table-mini table-dt">
                        <thead>
                            <tr>
                                <th class="">Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->name ?></td>
                                    <td class="text-center">
                                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/attype/edit/'.$value->id) ?>" class="btn btn-primary btn-mini">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/attype/'.$value->id) ?>" class="btn btn-danger btn-mini btn-delete">
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