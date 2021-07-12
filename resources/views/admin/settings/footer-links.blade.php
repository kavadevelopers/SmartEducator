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
    <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block table-responsive">
                        <table class="table table-striped table-bordered table-mini table-dt">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><?= $value->head ?></td>
                                        <td class="text-center">
                                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/footer-links/edit/'.$value->id) ?>" class="btn btn-primary btn-mini">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>


        <?php if($_e == 1){ ?>
            <?php  
            $linksList = [
                ['val'  => 'home','name' => 'Home'], 
                ['val'  => 'about','name' => 'About us'], 
                ['val'  => 'blog','name' => 'Blog'], 
                ['val'  => 'contact','name' => 'Contact us'], 
                ['val'  => 'listing','name' => 'Courses and Univercities'], 
            ];
            $dyPages = DB::table('pages')->get();
            foreach ($dyPages as $dyKey => $dyValue) {
                array_push($linksList,['val' => $dyValue->id,'name' => $dyValue->name]);
            }
            ?>
            <div class="col-md-6">
                <div class="card">
                    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/footer-links/edit') ?>" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h5>Edit <?=  $item->head ?> Links</h5>
                        </div>
                        <div class="card-block">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th></th>
                                    </tr>    
                                </thead>
                                <tbody id="form-links">

                                    <?php $kLlist = 0; foreach($link_list as $kLlist => $vlLins){ ?>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="name[]" placeholder="Name" value="<?= $vlLins->name ?>" required>
                                            </td>
                                            <td>
                                                <select class="form-control" name="link[]" required>
                                                    <option value="">-- Select --</option>
                                                    <?php foreach($linksList as $vlPag){ ?>
                                                        <option value="<?= $vlPag['val'] ?>" <?= $vlLins->link==$vlPag['val']?'selected':''; ?>><?= $vlPag['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                 <a href="#" class="btn btn-danger btn-mini remove-row"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>        
                                    <?php } ?>
                                    <?php if($kLlist == 0){ ?>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="name[]" placeholder="Name" required>
                                        </td>
                                        <td>
                                            <select class="form-control" name="link[]" required>
                                                <option value="">-- Select --</option>
                                                <?php foreach($linksList as $vlPag){ ?>
                                                    <option value="<?= $vlPag['val'] ?>"><?= $vlPag['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>
                                             <a href="#" class="btn btn-danger btn-mini remove-row"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>  
                                    <?php } ?>  
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-right" colspan="3">
                                            <a href="#" class="btn btn-primary btn-mini add-row"><i class="fa fa-plus"></i></a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/footer-links') ?>" class="btn btn-danger">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                            <button class="btn btn-success">
                                <i class="fa fa-save"></i> Save
                            </button>
                            <input type="hidden" name="id" value="<?= $item->id ?>">
                        </div>
                    </form>
                </div>
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
                                text += '<input type="text" class="form-control" name="name[]" placeholder="Name" required>';
                            text += '</td>';
                            text += '<td>';
                                text += '<select class="form-control" name="link[]" required>';
                                    text += '<option value="">-- Select --</option>';
                                    <?php foreach($linksList as $vlPag){ ?>
                                        text += '<option value="<?= $vlPag['val'] ?>"><?= $vlPag['name'] ?></option>';
                                    <?php } ?>
                                text += '</select>';
                            text += '</td>';
                            text += '<td>';
                                text += '<a href="#" class="btn btn-danger btn-mini remove-row"><i class="fa fa-trash"></i></a>';
                            text += '</td>';
                        text += '<tr>';

                        $('#form-links').append(text);
                    });
                })
            </script>
        <?php } ?>

        
    </div>
</div>




@stop