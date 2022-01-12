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
                    <a href="#" class="btn btn-success btn-mini btn-bulk-status-change">
                        <i class="fa fa-check"></i> Status change
                    </a>
                    <?php if(Session::get('AdminId') == "1"){ ?>
                        <a href="#" class="btn btn-success btn-mini btnAssignEmployee">
                            <i class="fa fa-link"></i> Assign Employee
                        </a>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(19)){ ?>
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/export/') ?>" class="btn btn-success btn-mini">
                        <i class="fa fa-download"></i> Export
                    </a>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(18)){ ?>
                    <a href="#" class="btn btn-warning btn-mini" data-toggle="modal" data-target="#importCsv">
                        <i class="fa fa-upload"></i> Import
                    </a>
                    <?php } ?>

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
    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="{{ App\Http\Controllers\admin\BaseController::aUrl('/leads') }}">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        <h5>Filter</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="feather icon-plus minimize-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block" style="display: none;">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Reference</label>
                                    <select class="form-control" name="reference">
                                        <option value="">-- Select --</option>
                                        <?php foreach(DB::table('manage_reference')->where('df','')->get() as $val){ ?>
                                            <option value="<?= $val->name ?>" <?= $rec->reference&&$rec->reference==$val->name?'selected':'' ?>><?= $val->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="">-- Select Status --</option>
                                        <option value="new" <?= $rec->status&&$rec->status=='new'?'selected':'' ?>>New</option>
                                        <option value="Busy" <?= $rec->status&&$rec->status=='Busy'?'selected':'' ?>>Busy</option>
                                        <option value="Visitor" <?= $rec->status&&$rec->status=='Visitor'?'selected':'' ?>>Visitor</option>
                                        <option value="Switch off" <?= $rec->status&&$rec->status=='Switch off'?'selected':'' ?>>Switch off</option>
                                        <option value="Not reachable" <?= $rec->status&&$rec->status=='Not reachable'?'selected':'' ?>>Not reachable</option>
                                        <option value="Not interested" <?= $rec->status&&$rec->status=='Not interested'?'selected':'' ?>>Not interested</option>
                                        <option value="Deal closed" <?= $rec->status&&$rec->status=='Deal closed'?'selected':'' ?>>Deal closed</option>
                                        <option value="Appointment fixed" <?= $rec->status&&$rec->status=='Appointment fixed'?'selected':'' ?>>Appointment fixed</option>
                                        <option value="Reschedule" <?= $rec->status&&$rec->status=='Reschedule'?'selected':'' ?>>Reschedule</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Appointment Date</label>
                                    <input name="adate" type="text" placeholder="Appointment Date" class="form-control datepicker" value="<?= $rec->adate?$rec->adate:'' ?>">
                                </div>
                            </div>
                            <?php if(Session::get('AdminId') == "1"){ ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Employee</label>
                                    <select class="form-control" name="employee">
                                        <option value="">unassigned</option>
                                        <?php foreach(DB::table('z_user')->where('id','!=','1')->get() as $val){ ?>
                                            <option value="<?= $val->id ?>" <?= $rec->employee&&$rec->employee==$val->id?'selected':'' ?>><?= $val->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Create From Date</label>
                                    <input name="from" type="text" placeholder="From Date" class="form-control datepicker" value="<?= $rec->from?$rec->from:'' ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Create To Date</label>
                                    <input name="to" type="text" placeholder="To Date" class="form-control datepicker" value="<?= $rec->to?$rec->to:'' ?>">
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <a href="{{ App\Http\Controllers\admin\BaseController::aUrl('/leads') }}" class="btn btn-danger" type="submit">
                                    <i class="fa fa-retweet"></i> Reset Filter
                                </a>
                                <button class="btn btn-warning" type="submit">
                                    <i class="fa fa-filter"></i> Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php } ?>
    <?php if ($type == "list") { ?>

        <script type="text/javascript">
            $(document).ready(function(){
                var datatableLead = $('#table-dt2').DataTable({
                    "dom": "<'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12't>><'row'<'col-md-4'i><'col-md-4 text-center'><'col-md-4'p>>",
                    order : [],
                    'retrive' : true,
                    "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
                    "drawCallback" : function(settings){
                        var pageinfo = this.api().page.info();
                        $('#leadPagesTotal').html(pageinfo.pages);

                        opHtml = "";
                        start = 0;
                        length = pageinfo.length;
                        for (var i = 1;i <= pageinfo.pages; i++) {
                            pagenumber = i - 1;
                            opHtml += '<option value="'+pagenumber+'">Page '+i+'</option>';
                        }
                        $('#pageListDt').html(opHtml);
                        $('#pageListDt').val(pageinfo.page);
                    }
                });

                $('#pageListDt').change(function() {
                    num = parseInt($(this).val());
                    datatableLead.page(num).draw(false);
                });
            });
        </script>

        <div class="page-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-right">
                            <div class="row">
                                <div class="col-md-9">
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Goto&nbsp;&nbsp;</span>
                                        </div>
                                        <select name="" id="pageListDt" class="form-control form-control-sm">
                                            <option>page 1</option>
                                        </select>
                                        <!-- <div class="input-group-append">
                                            <span class="input-group-text">&nbsp;of&nbsp;&nbsp;<span id="leadPagesTotal"></span> </span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-block table-responsive">
                            <table class="table table-bordered table-mini table-dt2" id="table-dt2">
                                <thead>
                                    <tr>
                                        <?php if(Session::get('AdminId') == "1"){ ?>
                                        <th class="text-center">
                                            <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <input type="checkbox" value="" id="checkedAll" class="">
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse">Select All</span>
                                                </label>
                                            </div>
                                        </th>
                                        <?php } ?>
                                        <th></th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th class="text-center">Status</th>
                                        <?php if(Session::get('AdminId') == "1"){ ?>
                                            <th>Employee</th>
                                        <?php } ?>
                                        <th class="text-center">Created On</th>
                                        <th class="text-center">Updated On</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $key => $value) { ?>
                                        <tr id="lead0<?= $value->id ?>">
                                            <?= App\Http\Controllers\admin\BaseController::printLead($value->id) ?>
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
            <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/import/') ?>" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background: #f6f7f9;">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: #1d262d;">Import Leads</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="file" name="file" class="form-control" onchange="readFileExcel(this)" required>
                                <a href="<?= URL::to('/') ?>/public/templates/LeadsImportTemplate.xlsx" target="_blank" download>Download Import Template</a>
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
        <script type="text/javascript">
            $(function(){

                $("#checkedAll").change(function() {
                    if (this.checked) {
                        $(".checkSingle").each(function() {
                            this.checked=true;
                        });
                    } else {
                        $(".checkSingle").each(function() {
                            this.checked=false;
                        });
                    }
                });
                $(".checkSingle").click(function () {
                    if ($(this).is(":checked")) {
                        var isAllChecked = 0;

                        $(".checkSingle").each(function() {
                            if (!this.checked)
                                isAllChecked = 1;
                        });

                        if (isAllChecked == 0) {
                            $("#checkedAll").prop("checked", true);
                        }
                    }
                    else {
                        $("#checkedAll").prop("checked", false);
                    }
                });

                $(document).on('click','.btnAssignEmployee', function(e){
                    if($(".checkSingle:checked").length > 0){
                        var list = $(".checkSingle:checked").map(function () {
                            return this.value;
                        }).get();
                        $('#bulkEmployeeModal input[name=leads]').val(list.toString());
                        $('#bulkEmployeeModal').modal('show');
                    }else{
                        PNOTY('please select at least one Lead','error');
                        return false;
                    }
                });

                $(document).on('click','.deleteLead', function(e){
                    e.preventDefault();
                    if (confirm('Are you sure?')) {
                        var AjaxParam = {
                            'url'       : '<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/delete') ?>',
                            'data'      : $('#editLeadModal form').serialize(),
                            'dataType'  : 'json',
                            'successCb' : callBackDeleteLead
                        };
                        doAjax(AjaxParam);
                    }
                });

                $(document).on('click','.btnEdit', function(e){
                    e.preventDefault();
                    data = $(this).data('values');
                    $('#editLeadModal input[name=lead]').val(data.id);
                    $('#editLeadModal input[name=name]').val(data.name);
                    $('#editLeadModal input[name=mobile]').val(data.mobile);
                    $('#editLeadModal input[name=email]').val(data.email);
                    $('#editLeadModal textarea[name=address]').val(data.address);
                    $('#editLeadModal textarea[name=quo]').val(data.quo);
                    $('#editLeadModal input[name=passing]').val(data.passing);
                    $('#editLeadModal textarea[name=enquiry]').val(data.enquiry);
                    $('#editLeadModal input[name=age]').val(data.age);
                    $('#editLeadModal select[name=reference]').val(data.reference);
                    $('#editLeadModal select[name=employee]').val(data.cby);
                    $('#editLeadModal textarea[name=remarks]').val(data.remarks);
                    dobFor = new Date(data.dob);
                    $('#editLeadModal .datepicker').datepicker({
                        format: 'dd-mm-yyyy',
                        todayHighlight:'TRUE',
                        autoclose: true,
                        "setDate" : dobFor
                    }).keydown(function(e) {
                        return false;
                    }).datepicker("update", dobFor);
                    $('#editLeadModal').modal('show');
                });     

                $(document).on('submit','#editLeadModal form', function(e){
                    e.preventDefault();
                    var AjaxParam = {
                        'url'       : '<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/edit') ?>',
                        'data'      : $(this).serialize(),
                        'dataType'  : 'json',
                        'successCb' : callBackEditLead
                    };
                    doAjax(AjaxParam);
                }); 

                $(document).on('submit','#changeStatus form', function(e){
                    e.preventDefault();
                    var AjaxParam = {
                        'url'       : '<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/status') ?>',
                        'data'      : $(this).serialize(),
                        'dataType'  : 'json',
                        'successCb' : callBackStatus
                    };
                    doAjax(AjaxParam);
                }); 
                $(document).on('click','.btnLeadView', function(e){
                    e.preventDefault();
                    var AjaxParam = {
                        'url'       : '<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/view') ?>',
                        'data'      : {_token : '<?= csrf_token() ?>',lead:$(this).data('id')},
                        'dataType'  : 'json',
                        'successCb' : callBackLeadView
                    };
                    doAjax(AjaxParam);
                });                               
            });
            function callBackLeadView(res) {
                $('#viewLeadModal').modal('show');
                $('#viewLeadModal .modal-body').html(res.data);
            }
            function callBackStatus(res) {
                PNOTY('Status changed','success');
                $('#lead0'+res.lead).html(res.data);
                $('#changeStatus').modal('hide');
            }
            function callBackEditLead(res) {
                PNOTY('Lead Saved','success');
                $('#lead0'+res.lead).html(res.data);
                $('#editLeadModal').modal('hide');
            }
            function callBackDeleteLead(res) {
                PNOTY(res.msg,'success');
                $('#editLeadModal').modal('hide');
                if (res._return) {
                    $('#lead0'+res.lead).remove();
                }else{
                    $('#lead0'+res.lead).html(res.data);
                }
            }
        </script>
        <div class="modal fade" id="bulkEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/assign/') ?>" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background: #f6f7f9;">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: #1d262d;">Assign Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Select Employee</label>
                                <select class="form-control" name="employee" required>
                                    <option value="">-- Select --</option>
                                    <?php foreach(DB::table('z_user')->where('id','!=','1')->get() as $val){ ?>
                                        <option value="<?= $val->id ?>"><?= $val->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Assign</button>
                            <input type="hidden" name="leads" >
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="viewLeadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content" style="background: #f6f7f9;">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #1d262d;">View Lead</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background: #f6f7f9;">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editLeadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="post" action="" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content" style="background: #f6f7f9;">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: #1d262d;">Edit Lead</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
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
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" value="<?= old("email") ?>" placeholder="Email" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" type="text" class="form-control" value="<?= old("address") ?>" placeholder="Address" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PREVIOUS QUALIFICATION</label>
                                        <textarea name="quo" type="text" class="form-control" value="<?= old("quo") ?>" placeholder="PREVIOUS QUALIFICATION" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>YEAR OF PASSING</label>
                                        <input name="passing" type="text" class="form-control" value="<?= old("passing") ?>" placeholder="YEAR OF PASSING" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>ENQUIRY FOR</label>
                                        <textarea name="enquiry" type="text" class="form-control" value="<?= old("enquiry") ?>" placeholder="ENQUIRY FOR" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input name="dob" type="text" class="form-control datepicker" value="<?= old("dob") ?>" placeholder="DOB" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input name="age" type="text" class="form-control numbers" value="<?= old("age") ?>" placeholder="Age" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Reference</label>
                                        <select class="form-control" name="reference">
                                            <option value="">-- Select --</option>
                                            <?php foreach(DB::table('manage_reference')->where('df','')->get() as $val){ ?>
                                                <option value="<?= $val->name ?>"><?= $val->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea name="remarks" type="text" class="form-control" value="<?= old("remarks") ?>" placeholder="Remarks"></textarea>
                                    </div>
                                </div>
                                <?php if(Session::get('AdminId') == '1'){ ?>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Employee</label>
                                            <select class="form-control" name="employee" >
                                                <option value="">unassigned</option>
                                                <?php foreach(DB::table('z_user')->where('id','!=','1')->get() as $val){ ?>
                                                    <option value="<?= $val->id ?>"><?= $val->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php }else{ ?>
                                    <input type="hidden" name="employee" value="<?= Session::get('AdminId') ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger deleteLead" title="delete">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-arrow-left"></i> Back
                            </button>
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-save"></i> Save
                            </button>
                            <input type="hidden" name="lead" >
                        </div>
                    </div>
                </div>
            </form>
        </div>

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
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" value="<?= old("email") ?>" placeholder="Email" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" type="text" class="form-control" value="<?= old("address") ?>" placeholder="Address" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PREVIOUS QUALIFICATION</label>
                                <textarea name="quo" type="text" class="form-control" value="<?= old("quo") ?>" placeholder="PREVIOUS QUALIFICATION" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>YEAR OF PASSING</label>
                                <input name="passing" type="text" class="form-control" value="<?= old("passing") ?>" placeholder="YEAR OF PASSING" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ENQUIRY FOR</label>
                                <textarea name="enquiry" type="text" class="form-control" value="<?= old("enquiry") ?>" placeholder="ENQUIRY FOR" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>DOB</label>
                                <input name="dob" type="text" class="form-control datepicker" value="<?= old("dob") ?>" placeholder="DOB" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Age</label>
                                <input name="age" type="text" class="form-control numbers" value="<?= old("age") ?>" placeholder="Age" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Reference</label>
                                <select class="form-control" name="reference">
                                    <option value="">-- Select --</option>
                                    <?php foreach(DB::table('manage_reference')->where('df','')->get() as $val){ ?>
                                        <option value="<?= $val->name ?>"><?= $val->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea name="remarks" type="text" class="form-control" value="<?= old("remarks") ?>" placeholder="Remarks"></textarea>
                            </div>
                        </div>
                        <?php if(Session::get('AdminId') == '1'){ ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Employee</label>
                                    <select class="form-control" name="employee" >
                                        <option value="">unassigned</option>
                                        <?php foreach(DB::table('z_user')->where('id','!=','1')->get() as $val){ ?>
                                            <option value="<?= $val->id ?>"><?= $val->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <input type="hidden" name="employee" value="<?= Session::get('AdminId') ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads') ?>" class="btn btn-danger">
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
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" value="<?= old("email",$item->email) ?>" placeholder="Email" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" type="text" class="form-control" placeholder="Address"><?= old("address",$item->address) ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PREVIOUS QUALIFICATION</label>
                                <textarea name="quo" type="text" class="form-control" placeholder="PREVIOUS QUALIFICATION"><?= old("quo",$item->quo) ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>YEAR OF PASSING</label>
                                <input name="passing" type="text" class="form-control" value="<?= old("passing",$item->passing) ?>" placeholder="YEAR OF PASSING">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ENQUIRY FOR</label>
                                <textarea name="enquiry" type="text" class="form-control" placeholder="ENQUIRY FOR"><?= old("enquiry",$item->enquiry) ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>DOB </label>
                                <input name="dob" type="text" class="form-control datepicker" value="<?= old("dob",$item->dob?date('d-m-Y',strtotime($item->dob)):'') ?>" placeholder="DOB">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Age</label>
                                <input name="age" type="text" class="form-control numbers" value="<?= old("age",$item->age) ?>" placeholder="Age">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Reference</label>
                                <select class="form-control" name="reference">
                                    <option value="">-- Select --</option>
                                    <?php foreach(DB::table('manage_reference')->where('df','')->get() as $val){ ?>
                                        <option value="<?= $val->name ?>" <?= $item->reference==$val->name?'selected':'' ?>><?= $val->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea name="remarks" type="text" class="form-control" placeholder="Remarks"><?= old("remarks",$item->remarks) ?></textarea>
                            </div>
                        </div>
                        <?php if(Session::get('AdminId') == '1'){ ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Employee</label>
                                    <select class="form-control" name="employee" >
                                        <option value="">unassigned</option>
                                        <?php foreach(DB::table('z_user')->where('id','!=','1')->get() as $val){ ?>
                                            <option value="<?= $val->id ?>" <?= $item->cby==$val->id?'selected':'' ?>><?= $val->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <input type="hidden" name="employee" value="<?= Session::get('AdminId') ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <?php if(App\Http\Controllers\admin\BaseController::isNotDeleteSent($item->id,'lead')){ ?>
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/'.$item->id) ?>" class="btn btn-danger btn-delete" title="delete">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                    <?php } ?>
                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads') ?>" class="btn btn-danger">
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
                                                                    <th scope="row">Employee</th>
                                                                    <td>
                                                                        <?php if($item->cby != ""){ ?>
                                                                            <?= DB::table('z_user')->where('id',$item->cby)->first()->name ?>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Created On</th>
                                                                    <td><?= $item->cat ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Updated On</th>
                                                                    <td><?= $item->uat ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-xl-6">
                                                    <div class="row">
                                                        <?php foreach ($slist as $key => $value): ?>
                                                            <?php $user = DB::Table('z_user')->where('id',$value->cby)->first(); ?>
                                                            <div class="col-10 col-sm-10 col-xl-11">
                                                                <div class="card">
                                                                    <div class="card-block">
                                                                        <div class="timeline-details">
                                                                            <div class="chat-header">{{ $value->status }}<?= $value->status == 'Appointment fixed'|| $value->status == "Reschedule"?'<small> -at '.$value->adate.'</small>':'' ?></div>
                                                                            <p class="text-muted">{{ nl2br($value->notes) }}</p>
                                                                            <p class="text-muted text-right"><small>At : {{ ($value->cat) }} by {{ $user->name }}</small></p>
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
