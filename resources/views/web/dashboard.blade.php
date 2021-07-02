@extends('web.layouts.main')

@section('content')


<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg-white" style="margin-top: 150px;">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12">
            	<div class="form-group row">
            		<label for="" class="col-sm-2 col-form-label"><i class="fa fa-user-plus"></i> Profile</label>
            	</div>
            </div>

            <div class="col-lg-6">
            	<div class="form-group row">
            		<label for="" class="col-sm-4 col-form-label"><i class="fa fa-address-card"></i> User id</label>
            		<div class="col-sm-8">
				      <input type="text" class="form-control kava-input" id="" placeholder="User id">
				    </div>
            	</div>
            </div>
            <div class="col-lg-6">
            	<div class="form-group row">
            		<label for="" class="col-sm-4 col-form-label"><i class="fa fa-user"></i> Full Name</label>
            		<div class="col-sm-8">
				      <input type="text" class="form-control kava-input" id="" placeholder="Full name">
				    </div>
            	</div>
            </div>

            <div class="col-lg-6">
            	<div class="form-group row">
            		<label for="" class="col-sm-4 col-form-label"><i class="fa fa-envelope"></i> Email id</label>
            		<div class="col-sm-8">
				      <input type="text" class="form-control kava-input" id="" placeholder="Email id">
				    </div>
            	</div>
            </div>
            <div class="col-lg-6">
            	<div class="form-group row">
            		<label for="" class="col-sm-4 col-form-label"><i class="fa fa-key"></i> Password</label>
            		<div class="col-sm-8">
				      <input type="text" class="form-control kava-input" id="" placeholder="Password">
				    </div>
            	</div>
            </div>
        </div>
        <div class="col-md-12 text-center" style="margin-top:120px; margin-bottom: 100px;">
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
        </div>
    </div>
</section>
<!-- End Team Section -->


@stop