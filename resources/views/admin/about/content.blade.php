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
        <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/about/content') ?>" enctype="multipart/form-data">
         {{ csrf_field() }}
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner <small>(size 1600 x 400) </small></label>
                                <input name="banner" type="file" class="form-control">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner</label>
                                <img src="<?= URL::asset("public/uploads/about/".$item->banner) ?>" style="width: 100%; border: 1px solid #ccc;">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="title" type="text" class="form-control" value="<?= $item->title; ?>" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="content" type="text" id="editor" class="form-control" rows="12" placeholder="" required><?= $item->content; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image <small>(size 500 x 500,1024 x 1024) </small></label>
                                <input name="image" type="file" class="form-control">
                                <img src="<?= URL::asset("public/uploads/about/".$item->image) ?>" style="width: 50%; border: 1px solid #ccc; margin: 0 auto;">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Content</label>
                                <input name="title2" type="text" class="form-control" value="<?= $item->title2; ?>" placeholder="" required>
                                <textarea name="content2" id="editor2" type="text" class="form-control" rows="12" placeholder="" required><?= $item->content2; ?></textarea>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Co founder content</label>
                                <input name="cotitle" type="text" class="form-control" value="<?= $item->cotitle; ?>" placeholder="" required>
                                <input name="cosubtitle" type="text" class="form-control" value="<?= $item->cosubtitle; ?>" placeholder="" required>
                                <textarea name="cocontent" type="text" class="form-control" rows="12" placeholder="" required><?= $item->cocontent; ?></textarea>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image <small>(size 248 x 500) </small></label>
                                <input name="coimage" type="file" class="form-control">
                                <img src="<?= URL::asset("public/uploads/about/".$item->coimage) ?>" style="width: 20%; border: 1px solid #ccc; margin: 0 auto;">
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Bottom Title</label>
                                <input name="btitle" type="text" class="form-control" value="<?= $item->btitle; ?>" placeholder="" required>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bottom Banner <small>(size 1366 x 205) </small></label>
                                <input name="bbanner" type="file" class="form-control">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bottom Banner</label>
                                <img src="<?= URL::asset("public/uploads/about/".$item->bbanner) ?>" style="width: 100%; border: 1px solid #ccc;">
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
        CKEDITOR.replace( 'editor2',{
            toolbar : 'Basic',
            toolbarGroups,
        });
    </script>
@stop