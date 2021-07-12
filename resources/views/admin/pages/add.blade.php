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
    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/pages/add') ?>" enctype="multipart/form-data" id="formAddPage">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Icon <span class="-req">*</span> <small><a href="https://fontawesome.com/v4.7/icons/" target="_blank">Choose icons from here</a></small></label>
                            <input name="icon" type="text" class="form-control" value="" placeholder="ex : fa fa-user">
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Name <span class="-req">*</span></label>
                            <input name="name" type="text" class="form-control" value="" placeholder="Name">
                        </div>
                    </div>  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Url Slug <span class="-req">*</span></label>
                            <input name="slug" type="text" class="form-control" value="" placeholder="Url Slug">
                        </div>
                    </div>    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Banner <small>(size 1600 x 600) </small></label>
                            <input name="banner" type="file" class="form-control">
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <textarea name="content" id="editor" class="form-control"></textarea>
                    </div>   
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/pages') ?>" class="btn btn-danger">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </div>
    </form>
</div>



<script src="<?= url('public/admin/') ?>/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    var toolbarGroups = [
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
        { name: 'forms', groups: [ 'forms' ] },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
        '/',
        { name: 'styles', groups: [ 'styles' ] },
        { name: 'colors', groups: [ 'colors' ] },
        { name: 'tools', groups: [ 'tools' ] },
        { name: 'others', groups: [ 'others' ] }
    ];
    CKEDITOR.replace( 'editor',{
        toolbar : 'Basic',
        toolbarGroups,
    });
</script>

<script type="text/javascript">
    var validate = false;
    $(function() {
        $('#formAddPage').submit(function(e) {
            if (!validate) {
                e.preventDefault();
            }
            if ($('input[name=icon]').val() == "") {
                PNOTY('Please enter icon','error');
                return false;
            }
            else if ($('input[name=name]').val() == "") {
                PNOTY('Please enter page name','error');
                return false;
            }else if($('input[name=slug]').val() == ""){
                PNOTY('Please enter url slug','error');
                return false;
            }else{
                var AjaxParam = {
                    'url'       : '<?= App\Http\Controllers\admin\BaseController::aUrl('/pages/addvalidate') ?>',
                    'data'      : {_token : '<?= csrf_token() ?>',slug : $('input[name=slug]').val() },
                    'dataType'  : 'json',
                    'successCb' : callBackAddPage
                };
                doAjax(AjaxParam);
            }
        });
    });
    function callBackAddPage(data) {
        myConsole(data);
        if (!data._return) {
            PNOTY('Url slug already exists','error');
        }else{
            validate = true;
            $('#formAddPage').submit();
        }
    }
</script>


@stop