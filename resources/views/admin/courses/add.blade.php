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
        <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/courses/add') ?>" enctype="multipart/form-data">
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
                            <label>Full Name <span class="-req">*</span></label>
                            <input name="fname" type="text" class="form-control" value="<?= old("fname") ?>" placeholder="Full Name" required>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Duration <span class="-req">*</span></label>
                            <input name="duration" type="text" class="form-control" value="<?= old("duration") ?>" placeholder="Duration" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Thumbnail <span class="-req">*</span><small>(size 500 x 500,1024 x 1024) </small></label>
                            <input name="thumb" type="file" class="form-control" required>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Category <span class="-req">*</span><small> </small></label>
                            <select class="form-control" name="category" required>
                                <option value="">-- Select --</option>
                                <option value="1">Graduation Course</option>
                                <option value="2">Post Graduation Course</option>
                            </select>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>About the program <span class="-req">*</span></label>
                            <textarea name="about" type="text" class="form-control" value="<?= old("about") ?>" placeholder="About the program" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Specialization <span class="-req">*</span></label>
                            <textarea name="specialization" type="text" class="form-control" value="<?= old("specialization") ?>" placeholder="Specialization" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Eligibility Criteria  <span class="-req">*</span></label>
                            <textarea name="eligibility" type="text" class="form-control" value="<?= old("eligibility") ?>" placeholder="Eligibility Criteria " required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job role <span class="-req">*</span></label>
                            <textarea name="job_role" type="text" class="form-control" value="<?= old("job_role") ?>" placeholder="Job role" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Admission Process <span class="-req">*</span></label>
                            <textarea name="process" type="text" class="form-control" value="<?= old("process") ?>" placeholder="Admission Process" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/courses') ?>" class="btn btn-danger">
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
        CKEDITOR.replace( 'about',{
            toolbar : 'Basic',
            toolbarGroups,
        });
        CKEDITOR.replace( 'specialization',{
            toolbar : 'Basic',
            toolbarGroups,
        });
        CKEDITOR.replace( 'eligibility',{
            toolbar : 'Basic',
            toolbarGroups,
        });
        CKEDITOR.replace( 'job_role',{
            toolbar : 'Basic',
            toolbarGroups,
        });
        CKEDITOR.replace( 'process',{
            toolbar : 'Basic',
            toolbarGroups,
        });
    </script>
@stop