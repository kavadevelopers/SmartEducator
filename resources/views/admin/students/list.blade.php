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
                    <?php if(DB::table('students')->where('uploads','1')->count() > 0){ ?>
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/students/uploads/') ?>" class="btn btn-danger btn-mini">
                            <i class="fa fa-upload"></i> Pending File Uploads
                        </a>
                    <?php } ?>
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/students/export/') ?>" class="btn btn-success btn-mini">
                        <i class="fa fa-download"></i> Export
                    </a>
                    <a href="#" class="btn btn-warning btn-mini" data-toggle="modal" data-target="#importCsv">
                        <i class="fa fa-upload"></i> Import
                    </a>
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/students/add') ?>" class="btn btn-primary btn-mini">
                        <i class="fa fa-plus"></i> Add
                    </a>
                <?php } ?>
                <?php if ($type == "view") { ?>
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/students') ?>" class="btn btn-danger btn-mini">
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
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $value->id ?></td>
                                            <td><?= $value->name ?></td>
                                            <td><?= $value->email ?></td>
                                            <td><?= $value->mobile ?></td>
                                            <td class="text-center">
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/students/view/'.$value->id) ?>" class="btn btn-success btn-mini" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/students/edit/'.$value->id) ?>" class="btn btn-primary btn-mini" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/students/'.$value->id) ?>" class="btn btn-danger btn-mini btn-delete" title="delete">
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
        <div class="modal fade" id="importCsv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/students/import/') ?>" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background: #f6f7f9;">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: #1d262d;">Import Students</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="file" name="file" class="form-control" onchange="readFileExcel(this)" required>
                                <a href="<?= URL::to('/') ?>/public/templates/StudentsImportTemplate.xlsx" target="_blank" download>Download Import Template</a>
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
                            <h5>STUDENT DETAILS</h5>
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
                                                                    <th scope="row">Email</th>
                                                                    <td><?= $item->email ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Mobile</th>
                                                                    <td><?= $item->mobile ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Mobile 2</th>
                                                                    <td><?= $item->mobile2 ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Mobile 3</th>
                                                                    <td><?= $item->mobile3 ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">DOB</th>
                                                                    <td><?= $item->dob ?></td>
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
                                                                    <th scope="row">Batch</th>
                                                                    <td><?= $item->batch ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">COUNSELOR</th>
                                                                    <td><?= $item->counselor ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Admission For</th>
                                                                    <td><?= $item->adfor ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Father</th>
                                                                    <td><?= $item->father ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Mother</th>
                                                                    <td><?= $item->mother ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Address</th>
                                                                    <td><?= $item->address ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Reg. No.</th>
                                                                    <td><?= $item->regno ?></td>
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
                            <h5>Attachments</h5>
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
                                                                <th scope="row">10TH</th>
                                                                <td>
                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'10th') ?>		
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">ID PROOF</th>
                                                                <td>
                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'idproof') ?>		
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">MS1</th>
                                                                <td>
                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms1') ?>		
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">MS3</th>
                                                                <td>
                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms3') ?>		
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">MS5</th>
                                                                <td>
                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms5') ?>		
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">MIGRATION</th>
                                                                <td>
                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'migration') ?>		
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">DEGREE / CONVOCATION</th>
                                                                <td>
                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'degree') ?>		
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">VL</th>
                                                                <td>
                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'vl') ?>		
                                                                </td>
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
                                                                    <th scope="row">12TH</th>
                                                                    <td>
                                                                    	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'12th') ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                	<th scope="row">Photo</th>
	                                                                <td>
	                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'photo') ?>	
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
                                                                	<th scope="row">MS2</th>
	                                                                <td>
	                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms2') ?>	
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
                                                                	<th scope="row">MS4</th>
	                                                                <td>
	                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms4') ?>	
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
                                                                	<th scope="row">MS6</th>
	                                                                <td>
	                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms6') ?>	
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <th scope="row">PROVISIONAL</th>
	                                                                <td>
	                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'provisional') ?>		
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <th scope="row">TRANSCRIPT</th>
	                                                                <td>
	                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'transcript') ?>		
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <th scope="row">SCAN</th>
	                                                                <td>
	                                                                	<?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'scan') ?>		
	                                                                </td>
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
                            <h5>FEES DETAILS</h5>
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
                                                                    <th scope="row">Total</th>
                                                                    <td>₹<?= $item->total ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Balance</th>
                                                                    <td>₹<?= $item->balance ?></td>
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
                                                                    <th scope="row">Paid</th>
                                                                    <td>₹<?= $item->paid ?></td>
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
                            <h5>Installment Details</h5>
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
                                                                    <th scope="row">Pending Fees</th>
                                                                    <td>₹<?= $item->pending_fees ?></td>
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
                                                                    <th scope="row">No. of Installments</th>
                                                                    <td>₹<?= $item->noofinstalllment ?></td>
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
                                                                    <th scope="row">Remarks</th>
                                                                    <td><?= $item->remarks ?></td>
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
                                                                    <th scope="row">Problem</th>
                                                                    <td><?= $item->_problem ?></td>
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
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($type == "add") { ?>
    	<div class="page-body">
            <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/students/add') ?>" enctype="multipart/form-data">
	            {{ csrf_field() }}
	            <div class="card">
	                <div class="card-header">
	                    <h5>STUDENT DETAILS</h5>
	                </div>
	                <div class="card-block">
	                	<div class="row">
	                		<div class="col-md-3">
	                            <div class="form-group">
	                                <label>Name <span class="-req">*</span></label>
	                                <input name="name" type="text" class="form-control" value="<?= old("name") ?>" placeholder="Name" required>
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
	                                <label>Password <span class="-req">*</span></label>
	                                <input name="password" type="text" class="form-control" value="<?= old("password") ?>" placeholder="Password" required>
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Batch <span class="-req">*</span></label>
	                                <input name="batch" type="text" class="form-control" value="<?= old("batch") ?>" placeholder="Batch" required>
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
	                                <label>Mobile 2</label>
	                                <input name="mobile2" type="text" class="form-control" value="<?= old("mobile2") ?>" placeholder="Mobile 2">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Mobile 3</label>
	                                <input name="mobile3" type="text" class="form-control" value="<?= old("mobile3") ?>" placeholder="Mobile 3">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>COUNSELOR <span class="-req">*</span></label>
	                                <input name="counselor" type="text" class="form-control" value="<?= old("counselor") ?>" placeholder="COUNSELOR" required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Admission For <span class="-req">*</span></label>
	                                <input name="adfor" type="text" class="form-control" value="<?= old("adfor") ?>" placeholder="Admission For" required>
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
	                                <label>Father <span class="-req">*</span></label>
	                                <input name="father" type="text" class="form-control" value="<?= old("father") ?>" placeholder="Father" required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Mother <span class="-req">*</span></label>
	                                <input name="mother" type="text" class="form-control" value="<?= old("mother") ?>" placeholder="Mother" required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Reg. No. <span class="-req">*</span></label>
	                                <input name="regno" type="text" class="form-control" value="<?= old("regno") ?>" placeholder="Reg. No." required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Address <span class="-req">*</span></label>
	                                <textarea name="address" type="text" class="form-control" value="<?= old("address") ?>" placeholder="Address" required></textarea>
	                            </div>
	                        </div>
	                	</div>
	                </div>
	                <div class="card-header">
	                    <h5>Attachment</h5>
	                </div>
	                <div class="card-block">
	                	<div class="row">
	                		<div class="col-md-3">
	                            <div class="form-group">
	                                <label>10TH</label>
	                                <input name="10th" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>12TH</label>
	                                <input name="12th" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>ID PROOF</label>
	                                <input name="idproof" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Photo</label>
	                                <input name="photo" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 1</label>
	                                <input name="ms1" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 2</label>
	                                <input name="ms2" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 3</label>
	                                <input name="ms3" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 4</label>
	                                <input name="ms4" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 5</label>
	                                <input name="ms5" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 6</label>
	                                <input name="ms6" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MIGRATION</label>
	                                <input name="migration" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>PROVISIONAL</label>
	                                <input name="provisional" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>DEGREE / CONVOCATION</label>
	                                <input name="degree" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>TRANSCRIPT</label>
	                                <input name="transcript" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>VL</label>
	                                <input name="vl" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>SCAN</label>
	                                <input name="scan" type="file" class="form-control" onchange="maxSizeFile(this)">
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="card-header">
	                    <h5>FEES DETAILS</h5>
	                </div>
	                <div class="card-block">
	                	<div class="row">
	                		<div class="col-md-3">
	                            <div class="form-group">
	                                <label>Total <span class="-req">*</span></label>
	                                <input name="total" type="text" class="form-control decimal-num" value="<?= old("total") ?>" placeholder="Total" required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Paid <span class="-req">*</span></label>
	                                <input name="paid" type="text" class="form-control decimal-num" value="<?= old("paid") ?>" placeholder="Paid" required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Balance <span class="-req">*</span></label>
	                                <input name="balance" type="text" class="form-control decimal-num" value="<?= old("balance") ?>" placeholder="Balance" required>
	                            </div>
	                        </div>
	                	</div>
	                </div>
	                <div class="card-header">
	                    <h5>Installment Details</h5>
	                </div>
	                <div class="card-block">
	                	<div class="row">
	                		<div class="col-md-3">
	                            <div class="form-group">
	                                <label>Pending Fees</label>
	                                <input name="pending_fees" type="text" class="form-control decimal-num" value="<?= old("pending_fees") ?>" placeholder="Pending Fees">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>No. of Installments</label>
	                                <input name="noofinstalllment" type="text" class="form-control numbers" value="<?= old("noofinstalllment") ?>" placeholder="NO of Installments">
	                            </div>
	                        </div>
	                	</div>
	                </div>
	                <div class="card-header">
	                    <h5>Other Details</h5>
	                </div>
	                <div class="card-block">
	                	<div class="row">
	                		<div class="col-md-6">
	                            <div class="form-group">
	                                <label>Remarks</label>
	                                <textarea rows="5" name="remarks" type="text" class="form-control" value="<?= old("remarks") ?>" placeholder="Remarks"></textarea>
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="form-group">
	                                <label>Problem</label>
	                                <textarea rows="5" name="problem" type="text" class="form-control" value="<?= old("problem") ?>" placeholder="Problem"></textarea>
	                            </div>
	                        </div>
	                	</div>
	                </div>
	                <div class="card-footer text-right">
	                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/students') ?>" class="btn btn-danger">
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
            <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/students/edit') ?>" enctype="multipart/form-data">
	            {{ csrf_field() }}
	            <div class="card">
	                <div class="card-header">
	                    <h5>STUDENT DETAILS</h5>
	                </div>
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
	                                <label>Email <span class="-req">*</span></label>
	                                <input name="email" type="email" class="form-control" value="<?= old("email",$item->email) ?>" placeholder="Email" required>
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
	                                <label>Batch <span class="-req">*</span></label>
	                                <input name="batch" type="text" class="form-control" value="<?= old("batch",$item->batch) ?>" placeholder="Batch" required>
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
	                                <label>Mobile 2</label>
	                                <input name="mobile2" type="text" class="form-control" value="<?= old("mobile2",$item->mobile2) ?>" placeholder="Mobile 2">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Mobile 3</label>
	                                <input name="mobile3" type="text" class="form-control" value="<?= old("mobile3",$item->mobile3) ?>" placeholder="Mobile 3">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>COUNSELOR <span class="-req">*</span></label>
	                                <input name="counselor" type="text" class="form-control" value="<?= old("counselor",$item->counselor) ?>" placeholder="COUNSELOR" required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Admission For <span class="-req">*</span></label>
	                                <input name="adfor" type="text" class="form-control" value="<?= old("adfor",$item->adfor) ?>" placeholder="Admission For" required>
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
	                                <label>Father <span class="-req">*</span></label>
	                                <input name="father" type="text" class="form-control" value="<?= old("father",$item->father) ?>" placeholder="Father" required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Mother <span class="-req">*</span></label>
	                                <input name="mother" type="text" class="form-control" value="<?= old("mother",$item->mother) ?>" placeholder="Mother" required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Reg. No. <span class="-req">*</span></label>
	                                <input name="regno" type="text" class="form-control" value="<?= old("regno",$item->regno) ?>" placeholder="Reg. No." required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Address <span class="-req">*</span></label>
	                                <textarea name="address" type="text" class="form-control" placeholder="Address" required><?= old("address",$item->address) ?></textarea>
	                            </div>
	                        </div>
	                	</div>
	                </div>
	                <div class="card-header">
	                    <h5>Attachment</h5>
	                </div>
	                <div class="card-block">
	                	<div class="row">
	                		<div class="col-md-3">
	                            <div class="form-group">
	                                <label>10TH</label>
	                                <input name="10th" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'10th') ?></p>
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>12TH</label>
	                                <input name="12th" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'12th') ?></p>
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>ID PROOF</label>
	                                <input name="idproof" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'idproof') ?></p>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Photo</label>
	                                <input name="photo" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'photo') ?></p>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 1</label>
	                                <input name="ms1" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms1') ?></p>
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 2</label>
	                                <input name="ms2" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms2') ?></p>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 3</label>
	                                <input name="ms3" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms3') ?></p>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 4</label>
	                                <input name="ms4" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms4') ?></p>
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 5</label>
	                                <input name="ms5" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms5') ?></p>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MS 6</label>
	                                <input name="ms6" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms6') ?></p>
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>MIGRATION</label>
	                                <input name="migration" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'migration') ?></p>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>PROVISIONAL</label>
	                                <input name="provisional" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'provisional') ?></p>
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>DEGREE / CONVOCATION</label>
	                                <input name="degree" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'degree') ?></p>
	                            </div>
	                        </div> 
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>TRANSCRIPT</label>
	                                <input name="transcript" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'transcript') ?></p>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>VL</label>
	                                <input name="vl" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'vl') ?></p>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>SCAN</label>
	                                <input name="scan" type="file" class="form-control" onchange="maxSizeFile(this)">
	                                <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'scan') ?></p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="card-header">
	                    <h5>FEES DETAILS</h5>
	                </div>
	                <div class="card-block">
	                	<div class="row">
	                		<div class="col-md-3">
	                            <div class="form-group">
	                                <label>Total <span class="-req">*</span></label>
	                                <input name="total" type="text" class="form-control decimal-num" value="<?= old("total",$item->total) ?>" placeholder="Total" required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Paid <span class="-req">*</span></label>
	                                <input name="paid" type="text" class="form-control decimal-num" value="<?= old("paid",$item->paid) ?>" placeholder="Paid" required>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>Balance <span class="-req">*</span></label>
	                                <input name="balance" type="text" class="form-control decimal-num" value="<?= old("balance",$item->balance) ?>" placeholder="Balance" required>
	                            </div>
	                        </div>
	                	</div>
	                </div>
	                <div class="card-header">
	                    <h5>Installment Details</h5>
	                </div>
	                <div class="card-block">
	                	<div class="row">
	                		<div class="col-md-3">
	                            <div class="form-group">
	                                <label>Pending Fees</label>
	                                <input name="pending_fees" type="text" class="form-control decimal-num" value="<?= old("pending_fees",$item->pending_fees) ?>" placeholder="Pending Fees">
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                            <div class="form-group">
	                                <label>No. of Installments</label>
	                                <input name="noofinstalllment" type="text" class="form-control numbers" value="<?= old("noofinstalllment",$item->noofinstalllment) ?>" placeholder="NO of Installments">
	                            </div>
	                        </div>
	                	</div>
	                </div>
	                <div class="card-header">
	                    <h5>Other Details</h5>
	                </div>
	                <div class="card-block">
	                	<div class="row">
	                		<div class="col-md-6">
	                            <div class="form-group">
	                                <label>Remarks</label>
	                                <textarea rows="5" name="remarks" type="text" class="form-control" placeholder="Remarks"><?= old("remarks",$item->remarks) ?></textarea>
	                            </div>
	                        </div>
	                        <div class="col-md-6">
	                            <div class="form-group">
	                                <label>Problem</label>
	                                <textarea rows="5" name="problem" type="text" class="form-control" placeholder="Problem"><?= old("remarks",$item->_problem) ?></textarea>
	                            </div>
	                        </div>
	                	</div>
	                </div>
	                <div class="card-footer text-right">
	                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/students') ?>" class="btn btn-danger">
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
    <?php } ?>

@stop