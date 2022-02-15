@extends('web.layouts.main')

@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background: url('<?= URL::asset("public/uploads/contact/".$content->banner) ?>') top left; background-size: cover;">
	<div class="container" data-aos="zoom-out" data-aos-delay="100">
		<h1><?= $content->title ?></h1>
	</div>
</section><!-- End Hero -->

<!-- ======= Team Section ======= -->
<section id="team contact-top" class="team section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h3><?= $content->title2 ?></h3>
            <div class="title-border"></div>
            <p><?= $content->descr ?></p>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
        	<div class="col-lg-12">
	            <div class="info-box mb-4">
	              	<div class="col-lg-12 row">
	              		<div class="col-lg-6">
	              			<div class="row mb-4" style="margin-top: 80px;" data-aos="fade-right" data-aos-delay="100">
	              				<div class="col-lg-4 col-md-2 col-sm-2 col-2 text-right">
	              					<i class="bx bx-map small-box-contact-top-i"></i>
	              				</div>
	              				<div class="col-lg-8 col-md-10 col-sm-10 col-10 pt-2">
	              					<h5 class="small-box-contact-top-h5">Address</h5>
	              					<p class="small-box-contact-top-p text-left"><?= nl2br($content->address) ?></p>
	              				</div>
	              			</div>
	              			<div class="row mb-4" data-aos="fade-right" data-aos-delay="100">
	              				<div class="col-lg-4 col-md-2 col-sm-2 col-2 text-right">
	              					<i class="bx bx-phone-call small-box-contact-top-i"></i>
	              				</div>
	              				<div class="col-lg-8 col-md-10 col-sm-10 col-10 pt-2">
	              					<h5 class="small-box-contact-top-h5">Let's Talk</h5>
	              					<p class="small-box-contact-top-p text-left"><?= $content->phone ?></p>
	              				</div>
	              			</div>
	              			<div class="row mb-4" data-aos="fade-right" data-aos-delay="100">
	              				<div class="col-lg-4 col-md-2 col-sm-2 col-2 text-right">
	              					<i class="bx bx-envelope small-box-contact-top-i"></i>
	              				</div>
	              				<div class="col-lg-8 col-md-10 col-sm-10 col-10 pt-2">
	              					<h5 class="small-box-contact-top-h5">Email</h5>
	              					<p class="small-box-contact-top-p text-left"><?= $content->email ?></p>
	              				</div>
	              			</div>
	              		</div>
	              		<div class="col-lg-6">
	              			<img src="<?= URL::asset("public/uploads/contact/".$content->banner2) ?>" style="width:100%;" data-aos="fade-left" data-aos-delay="100">
	              		</div>
	              	</div>
	            </div>
	        </div>
        </div>
    </div>
</section>
<!-- End Team Section -->

<?php $courses = DB::table('courses')->where('df','')->get(); ?>
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6 col-12">
            	<h3 class="get-in-touch-title">Get in touch</h3>
                <form action="savecontact" method="post" role="form">
                	{{ csrf_field() }}
                    <div class="form-row">
                        <div class="col form-group">
                            <input type="text" name="name" class="form-control kava-input" id="name" placeholder="Your Name" required/>
                        </div>
                        <div class="col form-group">
                            <input type="text" name="phone" class="form-control kava-input" placeholder="Your Mobile" required>
                        </div>
                    </div>
                    <div class="form-group">
                    	<input type="email" class="form-control kava-input" name="email" id="email" placeholder="Your Email" required/>
	        		</div>
                    <div class="form-group">
                        <select class="form-control kava-input" name="subject" required>
                        	<option value="">-- Select Course --</option>
                        	<?php foreach ($courses as $key => $value): ?>
                        		<option value="<?=  $value->name ?>"><?=  $value->name ?></option>
                        	<?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control kava-input" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-theme btn-main-color">Send Message</button></div>
                    <input type="hidden" name="uri" value="<?= Request::fullUrl() ?>">
                </form>
            </div>
            <div class="col-lg-6 col-12 map-block">
                <iframe class="mb-4 mb-lg-0" src="<?= $content->map ?>" frameborder="0" style="border:0; width: 100%; height: 450px;" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Section -->

@stop