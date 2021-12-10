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
        <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/expenses/save') ?>" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block table-responsive">
                        <table class="table table-striped table-bordered table-mini">
                            <thead>
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Remarks</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody id="expense-body">
                                <tr>
                                    <td>
                                        <input type="text" class="form-control datepicker" name="date[]" placeholder="Date" value="<?= date('d-m-Y') ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="desc[]" placeholder="Description" value="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control decimal-num" name="amount[]" placeholder="Amount" value="">
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="notes[]" placeholder="Remarks" value=""></textarea>
                                    </td>
                                    <td>
                                         <a href="#" class="btn btn-danger btn-mini remove-row"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>                            
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-right" colspan="5">
                                        <a href="#" class="btn btn-primary btn-mini add-row"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/expenses') ?>" class="btn btn-danger">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                        <button class="btn btn-success">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </div>    
            </div>
    </div>
        </form>
</div>


<script type="text/javascript">
    $(function(){
        $(document).on('click','.remove-row', function(e){
            e.preventDefault();
            $(this).closest('tr').remove();
        });
        $(document).on('click','.add-row', function(e){
            e.preventDefault();
            text = '<tr>';    
                text += '<td>';
                    text += '<input type="text" class="form-control datepicker" name="date[]" placeholder="Date" value="<?= date('d-m-Y') ?>">';
                text += '</td>';
                text += '<td>';
                    text += '<input type="text" class="form-control" name="desc[]" placeholder="Description" value="">';
                text += '</td>';
                text += '<td>';
                    text += '<input type="text" class="form-control decimal-num" name="amount[]" placeholder="Amount" value="">';
                text += '</td>';
                text += '<td>';
                    text += '<textarea class="form-control" name="notes[]" placeholder="Remarks" value=""></textarea>';
                text += '</td>';
                text += '<td>';
                    text += '<a href="#" class="btn btn-danger btn-mini remove-row"><i class="fa fa-trash"></i></a>';
                text += '</td>';
            text += '<tr>';

            $('#expense-body').append(text);
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight:'TRUE',
                autoclose: true
            }).keydown(function(e) {
                return false;
            });
        });
    })
</script>
@stop

