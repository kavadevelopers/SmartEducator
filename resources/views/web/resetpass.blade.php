@extends('web.layouts.main')

@section('content')

<section id="team" class="team section-bg-white" style="margin-top: 150px;">
    <div class="container" data-aos="fade-up">
        <form method="post" action="<?= url('reset-password') ?>" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12">
                	<div class="form-group row">
                		<label for="" class="col-sm-12 col-form-label"><i class="fa fa-lock"></i> Reset Password</label>
                	</div>
                </div>
                <div class="col-lg-6">
                	<div class="form-group row">
                		<label for="" class="col-sm-5 col-form-label kava-final-lable"><i class="fa fa-key"></i> Password</label>
                		<div class="col-sm-7">
    				      <input type="password" class="form-control kava-input" name="password" value="<?= old('password') ?>" placeholder="Password" required>
    				    </div>
                	</div>
                </div>
                <div class="col-lg-6">
                	<div class="form-group row">
                		<label for="" class="col-sm-5 col-form-label kava-final-lable"><i class="fa fa-key"></i> Confirm Password</label>
                		<div class="col-sm-7">
    				      <input type="password" class="form-control kava-input" name="cpassword" value="<?= old('cpassword') ?>" placeholder="Confirm Password" required>
    				    </div>
                	</div>
                </div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-theme btn-main-color" type="submit">Update Password</button>
                </div>
                <input type="hidden" name="id" value="<?= $item->user ?>">
                <input type="hidden" name="token" value="<?= $item->token ?>">
            </div>
        </form>
    </div>
</section>


@stop