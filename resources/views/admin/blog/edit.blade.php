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
    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/blog/edit') ?>" enctype="multipart/form-data" id="formAddPage">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Thumbnail <small>(size 500 x 500,1024 x 1024) </small></label>
                            <input name="thumb" type="file" class="form-control">
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Banner <small>(size 1600 x 600) </small></label>
                            <input name="banner" type="file" class="form-control">
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Title <span class="-req">*</span></label>
                            <input name="title" type="text" class="form-control" value="<?= $item->title ?>" placeholder="Title" required>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sub Title <span class="-req">*</span></label>
                            <input name="sub" type="text" class="form-control" value="<?= $item->sub ?>" placeholder="Sub Title" required>
                        </div>
                    </div>  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Facebook Link <span class="-req">*</span></label>
                            <input name="fb" type="text" class="form-control" value="<?= $item->fb ?>" placeholder="Facebook Link" required>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Instagram Link <span class="-req">*</span></label>
                            <input name="ins" type="text" class="form-control" value="<?= $item->ins ?>" placeholder="Instagram Link" required>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Twiter Link <span class="-req">*</span></label>
                            <input name="twi" type="text" class="form-control" value="<?= $item->twi ?>" placeholder="Twiter Link" required>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <textarea name="content" id="editor" class="form-control"><?= $item->content ?></textarea>
                    </div>   
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/blog/list') ?>" class="btn btn-danger">
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


@stop