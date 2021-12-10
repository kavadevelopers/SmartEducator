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
            <?php if(App\Http\Controllers\admin\BaseController::checkRight(25)){ ?>
            <a href="#" class="btn btn-success btn-mini" id="downloadExcel">
                <i class="fa fa-download"></i> Download
            </a>
            <?php } ?>
            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/expenses/add') ?>" class="btn btn-primary btn-mini">
                <i class="fa fa-plus"></i> Add
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form method="post" action="{{ App\Http\Controllers\admin\BaseController::aUrl('/expenses') }}">
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
                                <label>From Date</label>
                                <input name="from" type="text" placeholder="From Date" class="form-control datepicker" value="<?= $rec->from?$rec->from:'' ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>To Date</label>
                                <input name="to" type="text" placeholder="To Date" class="form-control datepicker" value="<?= $rec->to?$rec->to:'' ?>">
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
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

<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block table-responsive">
                    <table class="table table-striped table-bordered table-mini table-dt">
                        <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th>Description</th>
                                <th>Remarks</th>
                                <th class="text-right">Amount (Rs.)</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; foreach ($list as $key => $value) { $total += $value->amount; ?>
                                <tr>
                                    <td class="text-center">
                                        <?= date('d M Y',strtotime($value->dt)) ?>
                                    </td>
                                    <td><?= $value->descr ?></td>
                                    <td><small><?= $value->notes ?></small></td>
                                    <td class="text-right"><?= $value->amount ?> rs.</td>
                                    <td class="text-center">
                                        <?php if(App\Http\Controllers\admin\BaseController::isNotDeleteSent($value->id,'expenses')){ ?>
                                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/expenses/'.$value->id) ?>" class="btn btn-danger btn-mini btn-delete" title="delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">Total - </th>
                                <th class="text-right"><?=  number_format($total, 2, '.', '') ?> rs.</th>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>    
        </div>

    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('#downloadExcel').click(function(event) {
            event.preventDefault();
            urlStr = "/";
            if ($('input[name=from]').val() == "") {
                urlStr += "na/";
            }else{
                urlStr += $('input[name=from]').val()+"/";
            }
            if ($('input[name=to]').val() == "") {
                urlStr += "na";
            }else{
                urlStr += $('input[name=to]').val();
            }
            location.href = "<?= App\Http\Controllers\admin\BaseController::aUrl('/expenses/download') ?>"+urlStr;
        });
    })
</script>

@stop

