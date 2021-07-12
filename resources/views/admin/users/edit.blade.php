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
        <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/users/edit') ?>" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Name <span class="-req">*</span></label>
                            <input name="name" type="text" class="form-control" value="<?= old("name",$item->name) ?>" placeholder="Name" required>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Username <span class="-req">*</span></label>
                            <input name="username" type="text" class="form-control" value="<?= old("username",$item->username) ?>" placeholder="Username" required>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="text" class="form-control" value="<?= old("password") ?>" placeholder="Password">
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Email <span class="-req">*</span></label>
                            <input name="email" type="email" class="form-control" value="<?= old("email",$item->email) ?>" placeholder="Email" required>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Phone <span class="-req">*</span></label>
                            <input name="mobile" type="text" class="form-control" value="<?= old("mobile",$item->mobile) ?>" placeholder="Phone" required>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/users') ?>" class="btn btn-danger">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i> Save
                </button>
                <input type="hidden" name="id" value="<?= $item->id ?>">
            </div>
        </div>
        </form>
    </div>

@stop