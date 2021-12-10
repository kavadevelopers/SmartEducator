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
                <?php if ($type == "list") { ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(22)){ ?>
                    <?php if(DB::table('employee')->where('uploads','1')->count() > 0){ ?>
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/uploads/') ?>" class="btn btn-danger btn-mini">
                            <i class="fa fa-upload"></i> Pending File Uploads
                        </a>
                    <?php } ?>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(23)){ ?>
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/export/') ?>" class="btn btn-success btn-mini">
                        <i class="fa fa-download"></i> Export
                    </a>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(22)){ ?>
                    <a href="#" class="btn btn-warning btn-mini" data-toggle="modal" data-target="#importCsv">
                        <i class="fa fa-upload"></i> Import
                    </a>
                    <?php } ?>
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/add') ?>" class="btn btn-primary btn-mini">
                        <i class="fa fa-plus"></i> Add
                    </a>
                <?php } ?>
                <?php if ($type == "view") { ?>
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee') ?>" class="btn btn-danger btn-mini">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php if ($type == "list") { ?>
        <div class="page-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block table-responsive">
                            <table class="table table-bordered table-mini table-dt">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sr. No.</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $key + 1 ?></td>
                                            <td><?= $value->name ?></td>
                                            <td><?= $value->mobile ?></td>
                                            <td><?= $value->email ?></td>
                                            <td class="text-center">
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/view/'.$value->id) ?>" class="btn btn-success btn-mini" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/edit/'.$value->id) ?>" class="btn btn-primary btn-mini" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <?php if(App\Http\Controllers\admin\BaseController::isNotDeleteSent($value->id,'employee')){ ?>
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/'.$value->id) ?>" class="btn btn-danger btn-mini btn-delete" title="delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <?php } ?>
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
        <div class="modal fade" id="importCsv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/import/') ?>" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background: #f6f7f9;">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: #1d262d;">Import Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="file" name="file" class="form-control" onchange="readFileExcel(this)" required>
                                <a href="<?= URL::to('/') ?>/public/templates/EmployeesImportTemplate.xlsx" target="_blank" download>Download Import Template</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Import</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>
    <?php if ($type == "view") { ?>
        <div class="page-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>PERSONAL DETAILS</h5>
                        </div>
                        <div class="card-block">
                            <div class="view-info">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-6">
                                                    <div class="table-responsive">
                                                        <table class="table m-0 tbl-whitespace">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Sr. No.</th>
                                                                    <td>#<?= $item->id ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Name</th>
                                                                    <td><?= $item->name ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Username</th>
                                                                    <td><?= $user->username ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Mobile</th>
                                                                    <td><?= $item->mobile ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Emergency Mobile</th>
                                                                    <td><?= $item->emobile ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Email</th>
                                                                    <td><?= $item->email ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">DOB</th>
                                                                    <td><?= $item->dob ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Age</th>
                                                                    <td><?= $item->age ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Address</th>
                                                                    <td><?= $item->address ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Temp. Address</th>
                                                                    <td><?= $item->taddress ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <th scope="row">At</th>
                                                                    <td><?= $item->cat ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-6">
                                                    <div class="table-responsive">
                                                        <table class="table m-0 tbl-whitespace">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Photo</th>
                                                                    <td>
                                                                        <img src="<?= URL::asset("public/uploads/all/".$item->photo) ?>" style="width: 150px;">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">CV ATACHMENT</th>
                                                                    <td>
                                                                        <?= App\Http\Controllers\admin\BaseController::employeeAttchment($item,'cv') ?>        
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">AGREEMENT DOCUMENT</th>
                                                                    <td>
                                                                        <?= App\Http\Controllers\admin\BaseController::employeeAttchment($item,'agreement') ?>     
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Aadhar Number</th>
                                                                    <td><?= $item->adhar ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">PAN Number</th>
                                                                    <td><?= $item->pan ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Date of Join</th>
                                                                    <td><?= $item->dateofjoin ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h5>BANK ACCOUNT DETAILS</h5>
                        </div>
                        <div class="card-block">
                            <div class="view-info">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-6">
                                                    <div class="table-responsive">
                                                        <table class="table m-0 tbl-whitespace">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">A/C Name</th>
                                                                    <td><?= $item->acname ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">A/C Number</th>
                                                                    <td><?= $item->acno ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-6">
                                                    <div class="table-responsive">
                                                        <table class="table m-0 tbl-whitespace">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Bank Name</th>
                                                                    <td><?= $item->bank ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">IFSC Code</th>
                                                                    <td><?= $item->ifsc ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h5>OTHER DETAILS</h5>
                        </div>
                        <div class="card-block">
                            <div class="view-info">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-6">
                                                    <div class="table-responsive">
                                                        <table class="table m-0 tbl-whitespace">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">PREVIOUS COMPANY</th>
                                                                    <td><?= $item->company ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">BASIC PAY</th>
                                                                    <td><?= $item->bpay ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">HRA</th>
                                                                    <td><?= $item->hra ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">STATUTAORY BONOUS</th>
                                                                    <td><?= $item->sbonus ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">FLEXI PAY</th>
                                                                    <td><?= $item->flexi ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">SHIFT ALLOWANCE</th>
                                                                    <td><?= $item->sallo ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-6">
                                                    <div class="table-responsive">
                                                        <table class="table m-0 tbl-whitespace">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">INCENTIVE</th>
                                                                    <td><?= $item->incentive ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">PF</th>
                                                                    <td><?= $item->pf ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">PROFESSIONAL TAX</th>
                                                                    <td><?= $item->ptax ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">LABOUR WELFARE FUND</th>
                                                                    <td><?= $item->lwfund ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">UAN NO.</th>
                                                                    <td><?= $item->uanno ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h5>Rights</h5>
                        </div>
                        <?php $rights_list = DB::table('zuser_rights')->orderby('name','asc')->get(); ?>
                        <div class="card-block">
                            <div class="row">
                                <?php foreach ($rights_list as $key => $value) { ?>
                                    <div class="col-md-3">
                                        <div class="checkbox-fade fade-in-primary d-">
                                            <label>
                                                <input type="checkbox" <?= in_array($value->id,old('rights',explode(',',$user->rights)))?'checked':'' ?> disabled>
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse"><?= $value->name ?></span>
                                            </label>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($type == "add") { ?>
        <div class="page-body">
            <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/add') ?>" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h5>PERSONAL DETAILS</h5>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Photo <span class="-req">*</span></label>
                                <input name="photo" type="file" class="form-control" onchange="readFileImage(this)" placeholder="Name" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Name <span class="-req">*</span></label>
                                <input name="name" type="text" class="form-control" value="<?= old("name") ?>" placeholder="Name" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Username <span class="-req">*</span></label>
                                <input name="username" type="text" class="form-control" value="<?= old("username") ?>" placeholder="Username" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Password <span class="-req">*</span></label>
                                <input name="password" type="text" class="form-control" value="<?= old("password") ?>" placeholder="Password" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email <span class="-req">*</span></label>
                                <input name="email" type="email" class="form-control" value="<?= old("email") ?>" placeholder="Email" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mobile <span class="-req">*</span></label>
                                <input name="mobile" type="text" class="form-control" value="<?= old("mobile") ?>" placeholder="Mobile" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Emergency Mobile</label>
                                <input name="emobile" type="text" class="form-control" value="<?= old("emobile") ?>" placeholder="Emergency Mobile">
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>DOB <span class="-req">*</span></label>
                                <input name="dob" type="text" class="form-control datepicker" value="<?= old("dob") ?>" placeholder="DOB" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Age <span class="-req">*</span></label>
                                <input name="age" type="text" class="form-control numbers" value="<?= old("age") ?>" placeholder="Age" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Address <span class="-req">*</span></label>
                                <textarea name="address" type="text" class="form-control" placeholder="Address" required><?= old("address") ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Temp. Address</label>
                                <textarea name="taddress" type="text" class="form-control" placeholder="Temp. Address"><?= old("taddress") ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Aadhar Number <span class="-req">*</span></label>
                                <input name="adhar" type="text" class="form-control numbers" value="<?= old("adhar") ?>" placeholder="Aadhar Number" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PAN Number</label>
                                <input name="pan" type="text" class="form-control" value="<?= old("pan") ?>" placeholder="PAN Number">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Date of Join <span class="-req">*</span></label>
                                <input name="dateofjoin" type="text" class="form-control datepicker" value="<?= old("dateofjoin") ?>" placeholder="Date of Join" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h5>BANK ACCOUNT DETAILS</h5>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>A/C Name <span class="-req">*</span></label>
                                <input name="acname" type="text" class="form-control" value="<?= old("acname") ?>" placeholder="A/C Name" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>A/C Number <span class="-req">*</span></label>
                                <input name="acno" type="text" class="form-control" value="<?= old("acno") ?>" placeholder="A/C Number" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Bank Name <span class="-req">*</span></label>
                                <input name="bank" type="text" class="form-control" value="<?= old("bank") ?>" placeholder="Bank Name" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>IFSC Code <span class="-req">*</span></label>
                                <input name="ifsc" type="text" class="form-control" value="<?= old("ifsc") ?>" placeholder="IFSC Code" required>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="card-header">
                    <h5>OTHER DETAILS</h5>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>CV ATACHMENT </label>
                                <input name="cv" type="file" class="form-control" onchange="maxSizeFile(this)" placeholder="Name" >
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>AGREEMENT DOCUMENT </label>
                                <input name="agreement" type="file" onchange="maxSizeFile(this)" class="form-control" placeholder="Name" >
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PREVIOUS COMPANY <span class="-req">*</span></label>
                                <input name="company" type="text" class="form-control" value="<?= old("company") ?>" placeholder="PREVIOUS COMPANY" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>BASIC PAY <span class="-req">*</span></label>
                                <input name="bpay" type="text" class="form-control decimal-num" value="<?= old("bpay") ?>" placeholder="BASIC PAY" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>HRA <span class="-req">*</span></label>
                                <input name="hra" type="text" class="form-control decimal-num" value="<?= old("hra") ?>" placeholder="HRA" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>STATUTAORY BONOUS <span class="-req">*</span></label>
                                <input name="sbonus" type="text" class="form-control decimal-num" value="<?= old("sbonus") ?>" placeholder="STATUTAORY BONOUS" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>FLEXI PAY <span class="-req">*</span></label>
                                <input name="flexi" type="text" class="form-control decimal-num" value="<?= old("flexi") ?>" placeholder="FLEXI PAY" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>SHIFT ALLOWANCE <span class="-req">*</span></label>
                                <input name="sallo" type="text" class="form-control decimal-num" value="<?= old("sallo") ?>" placeholder="SHIFT ALLOWANCE" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>INCENTIVE <span class="-req">*</span></label>
                                <input name="incentive" type="text" class="form-control decimal-num" value="<?= old("incentive") ?>" placeholder="INCENTIVE" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PF <span class="-req">*</span></label>
                                <input name="pf" type="text" class="form-control decimal-num" value="<?= old("pf") ?>" placeholder="PF" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PROFESSIONAL TAX <span class="-req">*</span></label>
                                <input name="ptax" type="text" class="form-control decimal-num" value="<?= old("ptax") ?>" placeholder="PROFESSIONAL TAX" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>LABOUR WELFARE FUND <span class="-req">*</span></label>
                                <input name="lwfund" type="text" class="form-control decimal-num" value="<?= old("lwfund") ?>" placeholder="LABOUR WELFARE FUND" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>UAN NO. <span class="-req">*</span></label>
                                <input name="uanno" type="text" class="form-control" value="<?= old("uanno") ?>" placeholder="UAN NO." required>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="card-header">
                    <h5>Select Employee Rights</h5>
                </div>
                <?php $rights_list = DB::table('zuser_rights')->orderby('name','asc')->get(); ?>
                <div class="card-block">
                    <div class="row">
                        <?php foreach ($rights_list as $key => $value) { ?>
                            <div class="col-md-3">
                                <div class="checkbox-fade fade-in-primary d-">
                                    <label>
                                        <input type="checkbox" name="rights[]" value="<?= $value->id ?>" <?= old('rights')&&in_array($value->id,old('rights'))?'checked':'' ?>>
                                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse"><?= $value->name ?></span>
                                    </label>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee') ?>" class="btn btn-danger">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
            </form>
        </div>
    <?php } ?>
    <?php if ($type == "edit") { ?>
        <div class="page-body">
            <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee/edit') ?>" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-header">
                    <h5>PERSONAL DETAILS</h5>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Photo</label>
                                <input name="photo" type="file" class="form-control" onchange="readFileImage(this)" placeholder="Name">
                                <p><?= App\Http\Controllers\admin\BaseController::employeeAttchment($item,'photo') ?></p>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Name <span class="-req">*</span></label>
                                <input name="name" type="text" class="form-control" value="<?= old("name",$item->name) ?>" placeholder="Name" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Username <span class="-req">*</span></label>
                                <input name="username" type="text" class="form-control" value="<?= old("username",$user->username) ?>" placeholder="Username" required>
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
                                <label>Mobile <span class="-req">*</span></label>
                                <input name="mobile" type="text" class="form-control" value="<?= old("mobile",$item->mobile) ?>" placeholder="Mobile" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Emergency Mobile</label>
                                <input name="emobile" type="text" class="form-control" value="<?= old("emobile",$item->emobile) ?>" placeholder="Emergency Mobile">
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>DOB <span class="-req">*</span></label>
                                <input name="dob" type="text" class="form-control datepicker" value="<?= old("dob",date('d-m-Y',strtotime($item->dob))) ?>" placeholder="DOB" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Age <span class="-req">*</span></label>
                                <input name="age" type="text" class="form-control numbers" value="<?= old("age",$item->age) ?>" placeholder="Age" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Address <span class="-req">*</span></label>
                                <textarea name="address" type="text" class="form-control" placeholder="Address" required><?= old("address",$item->address) ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Temp. Address</label>
                                <textarea name="taddress" type="text" class="form-control" placeholder="Temp. Address"><?= old("taddress",$item->taddress) ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Aadhar Number <span class="-req">*</span></label>
                                <input name="adhar" type="text" class="form-control numbers" value="<?= old("adhar",$item->adhar) ?>" placeholder="Aadhar Number" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PAN Number</label>
                                <input name="pan" type="text" class="form-control" value="<?= old("pan",$item->pan) ?>" placeholder="PAN Number">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Date of Join <span class="-req">*</span></label>
                                <input name="dateofjoin" type="text" class="form-control datepicker" value="<?= old("dateofjoin",date('d-m-Y',strtotime($item->dateofjoin))) ?>" placeholder="Date of Join" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h5>BANK ACCOUNT DETAILS</h5>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>A/C Name <span class="-req">*</span></label>
                                <input name="acname" type="text" class="form-control" value="<?= old("acname",$item->acname) ?>" placeholder="A/C Name" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>A/C Number <span class="-req">*</span></label>
                                <input name="acno" type="text" class="form-control" value="<?= old("acno",$item->acno) ?>" placeholder="A/C Number" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Bank Name <span class="-req">*</span></label>
                                <input name="bank" type="text" class="form-control" value="<?= old("bank",$item->bank) ?>" placeholder="Bank Name" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>IFSC Code <span class="-req">*</span></label>
                                <input name="ifsc" type="text" class="form-control" value="<?= old("ifsc",$item->ifsc) ?>" placeholder="IFSC Code" required>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="card-header">
                    <h5>OTHER DETAILS</h5>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>CV ATACHMENT </label>
                                <input name="cv" type="file" onchange="maxSizeFile(this)" class="form-control" placeholder="Name" >
                                <p><?= App\Http\Controllers\admin\BaseController::employeeAttchment($item,'cv') ?></p>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>AGREEMENT DOCUMENT </label>
                                <input name="agreement" type="file" onchange="maxSizeFile(this)" class="form-control" placeholder="Name" >
                                <p><?= App\Http\Controllers\admin\BaseController::employeeAttchment($item,'agreement') ?></p>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PREVIOUS COMPANY <span class="-req">*</span></label>
                                <input name="company" type="text" class="form-control" value="<?= old("company",$item->company) ?>" placeholder="PREVIOUS COMPANY" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>BASIC PAY <span class="-req">*</span></label>
                                <input name="bpay" type="text" class="form-control decimal-num" value="<?= old("bpay",$item->bpay) ?>" placeholder="BASIC PAY" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>HRA <span class="-req">*</span></label>
                                <input name="hra" type="text" class="form-control decimal-num" value="<?= old("hra",$item->hra) ?>" placeholder="HRA" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>STATUTAORY BONOUS <span class="-req">*</span></label>
                                <input name="sbonus" type="text" class="form-control decimal-num" value="<?= old("sbonus",$item->sbonus) ?>" placeholder="STATUTAORY BONOUS" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>FLEXI PAY <span class="-req">*</span></label>
                                <input name="flexi" type="text" class="form-control decimal-num" value="<?= old("flexi",$item->flexi) ?>" placeholder="FLEXI PAY" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>SHIFT ALLOWANCE <span class="-req">*</span></label>
                                <input name="sallo" type="text" class="form-control decimal-num" value="<?= old("sallo",$item->sallo) ?>" placeholder="SHIFT ALLOWANCE" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>INCENTIVE <span class="-req">*</span></label>
                                <input name="incentive" type="text" class="form-control decimal-num" value="<?= old("incentive",$item->incentive) ?>" placeholder="INCENTIVE" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PF <span class="-req">*</span></label>
                                <input name="pf" type="text" class="form-control decimal-num" value="<?= old("pf",$item->pf) ?>" placeholder="PF" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PROFESSIONAL TAX <span class="-req">*</span></label>
                                <input name="ptax" type="text" class="form-control decimal-num" value="<?= old("ptax",$item->ptax) ?>" placeholder="PROFESSIONAL TAX" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>LABOUR WELFARE FUND <span class="-req">*</span></label>
                                <input name="lwfund" type="text" class="form-control decimal-num" value="<?= old("lwfund",$item->lwfund) ?>" placeholder="LABOUR WELFARE FUND" required>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>UAN NO. <span class="-req">*</span></label>
                                <input name="uanno" type="text" class="form-control" value="<?= old("uanno",$item->uanno) ?>" placeholder="UAN NO." required>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="card-header">
                    <h5>Select Employee Rights</h5>
                </div>
                <?php $rights_list = DB::table('zuser_rights')->orderby('name','asc')->get(); ?>
                <div class="card-block">
                    <div class="row">
                        <?php foreach ($rights_list as $key => $value) { ?>
                            <div class="col-md-3">
                                <div class="checkbox-fade fade-in-primary d-">
                                    <label>
                                        <input type="checkbox" name="rights[]" value="<?= $value->id ?>" <?= old('rights',explode(',',$user->rights))&&in_array($value->id,old('rights',explode(',',$user->rights)))?'checked':'' ?>>
                                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse"><?= $value->name ?></span>
                                    </label>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee') ?>" class="btn btn-danger">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-save"></i> Save
                    </button>
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                </div>
            </div>
            </form>
        </div>
    <?php } ?>
@stop