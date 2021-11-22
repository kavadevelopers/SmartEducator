@extends('web.layouts.main')

@section('content')


<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg-white" style="margin-top: 150px;">
    <div class="container" data-aos="fade-up">
        <form method="post" action="<?= url('profile') ?>" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12">
                	<div class="form-group row">
                		<label for="" class="col-sm-2 col-form-label"><i class="fa fa-user-plus"></i> Profile</label>
                	</div>
                </div>
                <div class="col-lg-6">
                	<div class="form-group row">
                		<label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-address-card"></i> User id</label>
                		<div class="col-sm-8">
    				      <input type="text" class="form-control kava-input" id="" value="<?= $user->id ?>" placeholder="User id" readonly>
    				    </div>
                	</div>
                </div>
                <div class="col-lg-6">
                	<div class="form-group row">
                		<label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-user"></i> Full Name</label>
                		<div class="col-sm-8">
    				      <input type="text" class="form-control kava-input" name="name" value="<?= $user->name ?>" placeholder="Full name" required>
    				    </div>
                	</div>
                </div>

                <div class="col-lg-6">
                	<div class="form-group row">
                		<label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-envelope"></i> Email id</label>
                		<div class="col-sm-8">
    				      <input type="text" class="form-control kava-input" id="" value="<?= $user->email ?>" placeholder="Email id" readonly>
    				    </div>
                	</div>
                </div>
                <div class="col-lg-6">
                	<div class="form-group row">
                		<label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-key"></i> Password</label>
                		<div class="col-sm-8">
    				      <input type="password" class="form-control kava-input" name="password" placeholder="Password">
    				    </div>
                	</div>
                </div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-theme btn-main-color" type="submit">Update</button>
                </div>
            </div>
        </form>
        <?php $item = $user; ?>
        <form method="post" action="<?= url('uploads') ?>" enctype="multipart/form-data">
        {{ csrf_field() }}
            <input type="hidden" name="id" value="<?= Session::get('WebId') ?>">
            <div class="row" style="margin-top:120px; margin-bottom: 100px;">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"><i class="fa fa-book"></i> Documents</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> 10th</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="10th" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'10th') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> 12th</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="12th" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'12th') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> ID PROOF</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="idproof" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'idproof') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> Photo</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="photo" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'photo') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> MS 1</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="ms1" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms1') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> MS 2</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="ms2" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms2') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> MS 3</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="ms3" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms3') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> MS 4</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="ms4" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms4') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> MS 5</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="ms5" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms5') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> MS 6</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="ms6" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'ms6') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> MIGRATION</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="migration" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'migration') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> PROVISIONAL</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="provisional" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'provisional') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> DEGREE / CONVOCATION</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="degree" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'degree') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> TRANSCRIPT</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="transcript" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'transcript') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> VL</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="vl" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'vl') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label kava-final-lable"><i class="fa fa-book"></i> SCAN</label>
                        <div class="col-sm-8">
                            <input type="file" onchange="maxSizeFile(this)" name="scan" class="form-control kava-input" >
                            <p><?= App\Http\Controllers\admin\BaseController::studentAttchment($item,'scan') ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-theme btn-main-color">Save Documents</button>
                </div>
            </div>
        </form>
        <!-- <div class="col-md-12 text-center" style="margin-top:120px; margin-bottom: 100px;">
        	<div class="box-dashboard">
        		<p><i class="fa fa-upload"></i></p>
        		<p class="box-dash-text">Upload Document</p>
        	</div>
        	<div class="box-dashboard">
        		<p><i class="fa fa-eye"></i></p>
        		<p class="box-dash-text">View Document</p>
        	</div>
        	<div class="box-dashboard">
        		<p><i class="fa fa-download"></i></p>
        		<p class="box-dash-text">Download Document</p>
        	</div>
        	<div class="box-dashboard">
        		<p><i class="fa fa-pencil-square-o"></i></p>
        		<p class="box-dash-text">Edit/Delete Document</p>
        	</div>
        </div> -->
    </div>
</section>
<!-- End Team Section -->

<script type="text/javascript">
    function maxSizeFile(input) {
        if (input.files && input.files[0]) {
            
            var FileSize = input.files[0].size / 1024 / 1024; // in MB
            var extension = input.files[0].name.substring(input.files[0].name.lastIndexOf('.')+1);
            
            if (FileSize > 2) {
                alert("Maxiumum Image Size Is 2 Mb.");
                input.value = '';
                return false;
            }
            else{
                
            }
        }
    }
</script>
@stop