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
    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/home/steps') ?>" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Step 1 <span class="-req">*</span></label>
                            <textarea name="step1" type="text" class="form-control" rows="6" placeholder="Step 1" required><?= $item->step1 ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Step 2 <span class="-req">*</span></label>
                            <textarea name="step2" type="text" class="form-control" rows="6" placeholder="Step 2" required><?= $item->step2 ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Step 3 <span class="-req">*</span></label>
                            <textarea name="step3" type="text" class="form-control" rows="6" placeholder="Step 3" required><?= $item->step3 ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Banner <small>(size 1600 x 400) </small></label>
                            <input name="banner" type="file" class="form-control">
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Old Banner</label>
                            <img src="<?= URL::asset("public/uploads/home/".$item->banner) ?>" style="width: 100%; border: 1px solid #ccc;">
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