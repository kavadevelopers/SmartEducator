@extends('admin.layouts.main')


@section('content')
    <style type="text/css">
        .star-block-of-review span i{
            color: #ccc !important;
            text-shadow: 1px 1px #000000;
        }
        .star-block-of-review span .active{
            color: #FDD922 !important;
        }
    </style>
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
                <a href="#" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#addReviewModel">
                    <i class="fa fa-plus"></i> Add
                </a>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-block table-responsive">
                        <table class="table table-bordered table-mini table-dt">
                            <thead>
                                <tr>
                                    <th class="text-center">Rating</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Review</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= App\Http\Controllers\admin\BaseController::ratingPrint($value->rating) ?>
                                        </td>
                                        <td><?= $value->name ?></td>
                                        <td><?= $value->email ?></td>
                                        <td><?= $value->phone ?></td>
                                        <td><?= App\Http\Controllers\admin\BaseController::strLimit(nl2br($value->review),20) ?></td>
                                        <td class="text-center">
                                            <?php if ($value->status == "0") { ?>
                                                <span class="badge badge-warning">Pending</span>
                                            <?php } ?>
                                            <?php if ($value->status == "1") { ?>
                                                <span class="badge badge-success">Approved</span>
                                            <?php } ?>
                                            <?php if ($value->status == "2") { ?>
                                                <span class="badge badge-danger">Rejected</span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-mini edit-review" title="Edit" data-values="<?= htmlspecialchars(json_encode($value), ENT_QUOTES, 'UTF-8'); ?>">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/reviews/delete/'.$value->id) ?>" class="btn btn-danger btn-mini btn-delete" title="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <br>
                                            <?php if($value->status == 0 || $value->status == 2){ ?>
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/reviews/status/1/'.$value->id) ?>" class="btn btn-success btn-mini" title="Approve" onclick="return confirm('Are you sure?');">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            <?php } ?>
                                            <?php if($value->status == 0 || $value->status == 1){ ?>
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/reviews/status/2/'.$value->id) ?>" class="btn btn-danger btn-mini" title="Reject" onclick="return confirm('Are you sure?');">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            <?php } ?>
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

    <div class="modal fade" id="addReviewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/reviews/save/') ?>" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background: #f6f7f9;">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #1d262d;">Add Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-star-rating">
                              <input type="radio" id="5-stars" name="rating" value="5" />
                              <label for="5-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input type="radio" id="4-stars" name="rating" value="4" />
                              <label for="4-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input type="radio" id="3-stars" name="rating" value="3" />
                              <label for="3-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input type="radio" id="2-stars" name="rating" value="2" />
                              <label for="2-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input type="radio" id="1-star" name="rating" value="1" />
                              <label for="1-star" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <textarea name="desc" rows="5" class="form-control" placeholder="Write Review Here" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="editReviewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/reviews/update/') ?>" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background: #f6f7f9;">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #1d262d;">Edit Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-star-rating">
                              <input type="radio" id="5-stars" name="erating" value="5" />
                              <label for="5-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input type="radio" id="4-stars" name="erating" value="4" />
                              <label for="4-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input type="radio" id="3-stars" name="erating" value="3" />
                              <label for="3-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input type="radio" id="2-stars" name="erating" value="2" />
                              <label for="2-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                              <input type="radio" id="1-star" name="erating" value="1" />
                              <label for="1-star" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="ename" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="eemail" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="ephone" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <textarea name="edesc" rows="5" class="form-control" placeholder="Write Review Here" required></textarea>
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
            $('.edit-review').click(function(e){
                e.preventDefault();
                data = $(this).data('values');
                $('#editReviewModel').modal('show');
                $("input[name=eid]").val(data.id);
                $("input[name=ename]").val(data.name);
                $("input[name=eemail]").val(data.email);
                $("input[name=ephone]").val(data.phone);
                $("textarea[name=edesc]").val(data.review);
                $("input[name=erating]").removeAttr('checked');
                $("input[name=erating][value=" + data.rating + "]").attr('checked', 'checked');
            })
        })
    </script>
@stop