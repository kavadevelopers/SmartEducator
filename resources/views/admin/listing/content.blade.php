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
        <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/cources-univercities/content') ?>" enctype="multipart/form-data">
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
                                <img src="<?= URL::asset("public/uploads/listing/".$item->banner) ?>" style="width: 100%; border: 1px solid #ccc;">
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="stitle" type="text" class="form-control" rows="5" placeholder="" required><?= $item->stitle; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bottom Banner <small>(size 1366 x 450) </small></label>
                                <input name="banner2" type="file" class="form-control">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bottom Banner</label>
                                <img src="<?= URL::asset("public/uploads/listing/".$item->banner2) ?>" style="width: 100%; border: 1px solid #ccc;">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="con_banner" type="text" class="form-control" rows="5" placeholder="" required><?= $item->con_banner; ?></textarea>
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