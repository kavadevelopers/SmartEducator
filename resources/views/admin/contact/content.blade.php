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
        <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/contact/content') ?>" enctype="multipart/form-data">
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
                                <img src="<?= URL::asset("public/uploads/contact/".$item->banner) ?>" style="width: 100%; border: 1px solid #ccc;">
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
                                <textarea name="descr" type="text" class="form-control" rows="5" placeholder="" required><?= $item->descr; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address <span class="-req">*</span></label>
                                <textarea name="address" type="text" class="form-control" rows="5" placeholder="Address" required><?= $item->address; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone <span class="-req">*</span></label>
                                <input name="phone" type="text" class="form-control" value="<?= $item->phone; ?>" placeholder="Phone" required>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email <span class="-req">*</span></label>
                                <input name="email" type="text" class="form-control" value="<?= $item->email; ?>" placeholder="Email" required>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner2 <small>(size 500 x 500,1024 x 1024) </small></label>
                                <input name="banner2" type="file" class="form-control">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner2</label>
                                <img src="<?= URL::asset("public/uploads/contact/".$item->banner2) ?>" style="width: 100%; border: 1px solid #ccc;">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Map Link <span class="-req">*</span></label>
                                <input name="map" type="text" class="form-control" value="<?= $item->map; ?>" placeholder="Map Link" required>
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