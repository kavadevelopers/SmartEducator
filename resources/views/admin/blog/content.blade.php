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
        <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/blog/content') ?>" enctype="multipart/form-data">
         {{ csrf_field() }}
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner <small>(size 1600 x 400) </small></label>
                                <input name="banner" type="file" class="form-control">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner</label>
                                <img src="<?= URL::asset("public/uploads/blog/".$item->banner) ?>" style="width: 100%; border: 1px solid #ccc;">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="title" type="text" class="form-control" value="<?= $item->title; ?>" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="title2" type="text" class="form-control" value="<?= $item->title2; ?>" placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-success">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>  
        </form>
    </div>

@stop