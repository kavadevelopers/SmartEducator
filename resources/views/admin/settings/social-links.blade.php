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
                    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/common/social-links') ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-block">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name <span class="-req">*</span></label>
                                    <input name="name" type="text" class="form-control"  placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Icon <span class="-req">*</span> <small><a href="https://fontawesome.com/v4.7/icons/" target="_blank">Choose icons from here</a></small></label>
                                    <input name="icon" type="text" class="form-control" value="" placeholder="ex : fa fa-user" required>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Link <span class="-req">*</span></label>
                                    <input name="link" type="text" class="form-control"  placeholder="Link" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sort <span class="-req">*</span></label>
                                    <input name="sort" type="text" class="form-control"  placeholder="Sort" required>
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
                    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/common/social-links/edit') ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-block">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name <span class="-req">*</span></label>
                                    <input name="name" type="text" class="form-control" value="<?= $item->name ?>"  placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Icon <span class="-req">*</span> <small><a href="https://fontawesome.com/v4.7/icons/" target="_blank">Choose icons from here</a></small></label>
                                    <input name="icon" type="text" class="form-control" value="<?= $item->icon ?>" placeholder="ex : fa fa-user" required>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Link <span class="-req">*</span></label>
                                    <input name="link" type="text" class="form-control" value="<?= $item->link ?>"  placeholder="Link" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sort <span class="-req">*</span></label>
                                    <input name="sort" type="text" class="form-control" value="<?= $item->sort ?>"  placeholder="Sort" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/common/social-links') ?>" class="btn btn-danger">
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
                                <th class="text-center">Icon</th>
                                <th class="">Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $value->sort ?></td>
                                    <td class="text-center"><i class="<?= $value->icon ?>"></i></td>
                                    <td><?= $value->name ?></td>
                                    <td class="text-center">
                                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/common/social-links/edit/'.$value->id) ?>" class="btn btn-primary btn-mini">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/common/social-links/'.$value->id) ?>" class="btn btn-danger btn-mini btn-delete">
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