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
                    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/cources-univercities/slider/save') ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-block">
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title <span class="-req">*</span></label>
                                    <input name="title" type="text" class="form-control"  placeholder="Title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description <span class="-req">*</span></label>
                                    <textarea name="desc" type="text" class="form-control"  placeholder="Description" rows="5" required></textarea>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sort <span class="-req">*</span></label>
                                    <input name="sort" type="text" class="form-control"  placeholder="Sort" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banner <span class="-req">*</span> <small>(size 1600 x 600) </small></label>
                                    <input name="banner" type="file" class="form-control" onchange="readFileImage(this)" required>
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
                    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/cources-univercities/slider/edit') ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-block">
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title <span class="-req">*</span></label>
                                    <input name="title" type="text" class="form-control" value="<?= $item->title ?>" placeholder="Title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description <span class="-req">*</span></label>
                                    <textarea name="desc" type="text" class="form-control" placeholder="Description" rows="5" required><?= $item->body ?></textarea>
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sort <span class="-req">*</span></label>
                                    <input name="sort" type="text" class="form-control" value="<?= $item->sort ?>" placeholder="Sort" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banner <small>(size 1600 x 600) </small></label>
                                    <input name="banner" type="file" class="form-control" onchange="readFileImage(this)" >
                                </div>
                            </div> 
                            <div class="col-md-12 text-center">
                                <img src="<?= url('public/uploads/listing/'.$item->image) ?>" style="max-width: 50px;">
                            </div> 
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/cources-univercities/slider') ?>" class="btn btn-danger">
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
                                <th class="text-center">Sort</th>
                                <th class="text-center">Banner</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $value->sort ?></td>
                                    <td class="text-center">
                                        <img src="<?= url('public/uploads/listing/'.$value->image) ?>" style="max-width: 80px;">
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/cources-univercities/slider/edit/'.$value->id) ?>" class="btn btn-primary btn-mini">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/cources-univercities/slider/'.$value->id) ?>" class="btn btn-danger btn-mini btn-delete">
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