@extends('web.layouts.main')

@section('content')

<!-- ======= Team Section ======= -->
<section id="team contact-top" class="team section-bg-white" style="margin-top: 150px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h3><?= $_title ?></h3>
            <div class="title-border"></div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
        	<div class="col-lg-4"></div>
        	<div class="col-lg-4">
        		<form action="<?= url('dashboard') ?>" method="post" class="php-email-form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control kava-input" name="subject" id="subject" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control kava-input" name="subject" id="subject" placeholder="Password" />
                    </div>
                    <div class="form-group text-right">
                    	<a href="#">Forget Password?</a>
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-theme btn-main-color" style="width:100%;">Login</button></div>
                </form>
        	</div>
        	<div class="col-lg-4"></div>
        </div>
    </div>
</section>
<!-- End Team Section -->


@stop