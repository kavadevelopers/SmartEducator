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
        <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/settings') ?>" enctype="multipart/form-data">
         {{ csrf_field() }}

            <div class="card">
                <div class="card-header">
                    <h5>Branding and Content</h5>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Logo </label>
                                <input name="logo" type="file" class="form-control">
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <img src="<?= URL::asset("public/uploads/settings/".$item->logo) ?>" style="width: 80%; border: 1px solid #ccc;">
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Favicon </label>
                                <input name="favicon" type="file" class="form-control">
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <img src="<?= URL::asset("public/uploads/settings/".$item->favicon) ?>" style="width: 80%; border: 1px solid #ccc;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Phone <span class="-req">*</span></label>
                                <input name="phone" type="text" class="form-control" value="<?= $item->phone ?>" placeholder="Phone" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email <span class="-req">*</span></label>
                                <input name="email" type="text" class="form-control" value="<?= $item->email ?>" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Notification Email <span class="-req">*</span></label>
                                <input name="nemail" type="text" class="form-control" value="<?= $item->nemail ?>" placeholder="Notification Email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Footer Description <span class="-req">*</span></label>
                                <textarea name="footer_desc" type="text" class="form-control" rows="5" value="<?= $item->footer_desc ?>" placeholder="Footer Description" required><?= $item->footer_desc ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h5>Mail SMTP Details</h5>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mail send from <span class="-req">*</span></label>
                                <input name="mail_from" type="text" class="form-control" value="<?= $item->mail_from ?>" placeholder="Mail send from" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mail send from name<span class="-req">*</span></label>
                                <input name="mail_from_name" type="text" class="form-control" value="<?= $item->mail_from_name ?>" placeholder="Mail send from name" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mail Host <span class="-req">*</span></label>
                                <input name="mail_host" type="text" class="form-control" value="<?= $item->mail_host ?>" placeholder="Mail Host" required>
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mail User <span class="-req">*</span></label>
                                <input name="mail_user" type="text" class="form-control" value="<?= $item->mail_user ?>" placeholder="Mail User" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mail Password <span class="-req">*</span></label>
                                <input name="mail_pass" type="text" class="form-control" value="<?= $item->mail_pass ?>" placeholder="Mail Password" required>
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mail Port <span class="-req">*</span></label>
                                <input name="mail_port" type="text" class="form-control" value="<?= $item->mail_port ?>" placeholder="Mail Port" required>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>  

            <div class="card">
                <div class="card-footer text-right">
                    <button class="btn btn-success">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>

    <style type="text/css">
        .card-header{
            border-bottom: 1px solid #ccc !important;
            margin-bottom: 15px;
        }
        .card-header h5{
            margin-bottom: 0;
        }
    </style>
@stop