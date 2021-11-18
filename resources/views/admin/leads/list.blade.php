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
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/add') ?>" class="btn btn-primary btn-mini">
                        <i class="fa fa-plus"></i> Add
                    </a>
                <?php } ?>
                <?php if ($type == "view") { ?>
                    <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-danger btn-mini">
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
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $value->id ?></td>
                                            <td><?= $value->name ?></td>
                                            <td><?= $value->mobile ?></td>
                                            <td><?= $value->email ?></td>
                                            <td class="text-center">
                                                <?= ucfirst($value->status) ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/view/'.$value->id) ?>" class="btn btn-success btn-mini" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/edit/'.$value->id) ?>" class="btn btn-primary btn-mini" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/'.$value->id) ?>" class="btn btn-danger btn-mini btn-delete" title="delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <a href="#" class="btn btn-success btn-mini btn-statuschange" data-values="<?= htmlspecialchars(json_encode($value), ENT_QUOTES, 'UTF-8'); ?>" title="Change Status">
                                                    <i class="fa fa-check"></i>
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
        <div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/status/') ?>" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background: #f6f7f9;">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: #1d262d;">Change Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <select class="form-control" name="status" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="new">New</option>
                                    <option value="Busy">Busy</option>
                                    <option value="Switch off">Switch off</option>
                                    <option value="Not reachable">Not reachable</option>
                                    <option value="Not interested">Not interested</option>
                                    <option value="Deal closed">Deal closed</option>
                                    <option value="Appointment fixed">Appointment fixed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="notes" rows="5" class="form-control" placeholder="Notes (if any)"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                            <input type="hidden" name="eid">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript">
            $(function(){
                $(document).on('click','.btn-statuschange', function(e){
                    e.preventDefault();
                    data = $(this).data('values');
                    $('#changeStatus').modal('show');
                    $("input[name=eid]").val(data.id);
                    $("select[name=status]").val(data.status);
                })
                $('input[type=radio]').change(function(event) {
                    //alert($(this).val());
                });
            })
        </script>
    <?php }else if ($type == "add") { ?>
        <div class="page-body">
            <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/add') ?>" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
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
                                <label>Mobile <small>(Add comma saparated value if multiple)</small><span class="-req">*</span></label>
                                <input name="mobile" type="text" class="form-control" value="<?= old("mobile") ?>" placeholder="Mobile" required>
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
                                <label>Address <span class="-req">*</span></label>
                                <textarea name="address" type="text" class="form-control" value="<?= old("address") ?>" placeholder="Address" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PREVIOUS QUALIFICATION <span class="-req">*</span></label>
                                <textarea name="quo" type="text" class="form-control" value="<?= old("quo") ?>" placeholder="PREVIOUS QUALIFICATION" required></textarea>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>YEAR OF PASSING <span class="-req">*</span></label>
                                <input name="passing" type="text" class="form-control" value="<?= old("passing") ?>" placeholder="YEAR OF PASSING" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ENQUIRY FOR <span class="-req">*</span></label>
                                <textarea name="enquiry" type="text" class="form-control" value="<?= old("enquiry") ?>" placeholder="ENQUIRY FOR" required></textarea>
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
                                <label>Reference</label>
                                <textarea name="reference" type="text" class="form-control" value="<?= old("reference") ?>" placeholder="Reference"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea name="remarks" type="text" class="form-control" value="<?= old("remarks") ?>" placeholder="Remarks"></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-danger">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
            </form>
        </div>
    
    <?php }else if ($type == "edit") { ?>
        <div class="page-body">
            <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/edit') ?>" enctype="multipart/form-data">
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
                                <label>Mobile <small>(Add comma saparated value if multiple)</small><span class="-req">*</span></label>
                                <input name="mobile" type="text" class="form-control" value="<?= old("mobile",$item->mobile) ?>" placeholder="Mobile" required>
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
                                <label>Address <span class="-req">*</span></label>
                                <textarea name="address" type="text" class="form-control" placeholder="Address" required><?= old("address",$item->address) ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PREVIOUS QUALIFICATION <span class="-req">*</span></label>
                                <textarea name="quo" type="text" class="form-control" placeholder="PREVIOUS QUALIFICATION" required><?= old("quo",$item->quo) ?></textarea>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>YEAR OF PASSING <span class="-req">*</span></label>
                                <input name="passing" type="text" class="form-control" value="<?= old("passing",$item->passing) ?>" placeholder="YEAR OF PASSING" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ENQUIRY FOR <span class="-req">*</span></label>
                                <textarea name="enquiry" type="text" class="form-control" placeholder="ENQUIRY FOR" required><?= old("enquiry",$item->enquiry) ?></textarea>
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
                                <label>Reference</label>
                                <textarea name="reference" type="text" class="form-control" placeholder="Reference"><?= old("reference",$item->reference) ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea name="remarks" type="text" class="form-control" placeholder="Remarks"><?= old("remarks",$item->remarks) ?></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-danger">
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
    <?php }else if ($type == "view") { ?>

        <div class="page-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
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
                                                                    <th scope="row">Status</th>
                                                                    <td><?= $item->status ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Name</th>
                                                                    <td><?= $item->name ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Mobile</th>
                                                                    <td><?= $item->mobile ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Email</th>
                                                                    <td><?= $item->email ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Address</th>
                                                                    <td><?= $item->address ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">PREVIOUS QUALIFICATION</th>
                                                                    <td><?= $item->quo ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">YEAR OF PASSING</th>
                                                                    <td><?= $item->passing ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">ENQUIRY FOR</th>
                                                                    <td><?= $item->enquiry ?></td>
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
                                                                    <th scope="row">REFERENCE</th>
                                                                    <td><?= $item->reference ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">REMARK</th>
                                                                    <td><?= $item->remarks ?></td>
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
                                                    <div class="row">
                                                        <?php foreach ($slist as $key => $value): ?>
                                                            <div class="col-10 col-sm-10 col-xl-11">
                                                                <div class="card">
                                                                    <div class="card-block">
                                                                        <div class="timeline-details">
                                                                            <div class="chat-header">{{ $value->status }}</div>
                                                                            <p class="text-muted">{{ nl2br($value->notes) }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        <?php endforeach ?>
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




@stop