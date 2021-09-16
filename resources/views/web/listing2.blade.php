@extends('web.layouts.main')

@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background: url('<?= URL::asset("public/uploads/listing/".$content->banner) ?>') top left; background-size: cover;">
	<div class="container" data-aos="zoom-out" data-aos-delay="100">
			<h1><?= $_title ?></h1>
	</div>
</section><!-- End Hero -->

<!-- ======= Team Section ======= -->
<section id="team contact-top" class="team section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h3><?= $content->title2 ?></h3>
            <div class="title-border"></div>
        </div>
        <div class="row">

        	<?php foreach ($list as $key => $value) { ?>
        		<div class="col-lg-3 col-md-6 align-items-stretch page-item" data-aos="fade-up" data-aos-delay="100" style="cursor:pointer;" onclick="window.location='course/<?= $value->id ?>'">
	                <div class="member">
	                    <div class="member-img">
	                        <img src="<?= URL::asset("public/uploads/courses/".$value->thumb) ?>" style="width: 100%;" class="img-fluid" alt="">
	                    </div>
	                    <div class="member-info">
	                        <h4><?= App\Http\Controllers\BaseController::strLimit($value->name,22) ?></h4>
	                        <span>Duration : <?= App\Http\Controllers\BaseController::strLimit($value->duration,15) ?></span>
	                    </div>
	                </div>
	            </div>	
        	<?php } ?>

        </div>
    </div>
</section>
<!-- End Team Section -->

    <section id="team contact-top" class="team section-bg">
	    <div class="container" data-aos="fade-up">
	        <div class="section-title">
	            <h3>CONTACT US</h3>
	            <div class="title-border"></div>
	        </div>
	        <div class="col-lg-12" data-aos="fade-up">
	        	<form action="savecontact" method="post" role="form">
                	{{ csrf_field() }}
		        	<div class="row">
		        		<div class="col" style="padding-right: 30px;">
		        			<div class="form-group">
			        			<input type="text" name="name" class="form-control kava-input" id="name" placeholder="Your Name" required/>
			        		</div>
			        		<div class="form-group">
			        			<input type="email" class="form-control kava-input" name="email" id="email" placeholder="Your Email" required/>
			        		</div>
			        		<div class="form-group">
			        			<input type="text" name="phone" class="form-control kava-input" placeholder="Your Phone" required>
			        		</div>
			        	</div>
			        	<div class="col" style="padding-left: 30px;">
			        		<div class="form-group">
			        			<input type="text" class="form-control kava-input" name="subject" id="subject" placeholder="Subject" required/>
			        		</div>
			        		<div class="form-group">
			        			<textarea class="form-control kava-input" name="message" rows="3" placeholder="Message" required></textarea>
			        		</div>
			        	</div>
		        	</div>
		        	<div class="row">
		        		<div class="col">
		        			<div class="form-group text-center">
			        			<button type="submit" class="btn btn-theme btn-main-color" style="margin-top:10px;">Send Message</button>
			        			<input type="hidden" name="uri" value="<?= Request::fullUrl() ?>">
			        		</div>
		        		</div>
		        	</div>
		        </form>
	        </div>
	    </div>
	</section>
@stop