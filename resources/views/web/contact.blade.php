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
	              				<div class="col-lg-4 text-right">
	              					<i class="bx bx-map small-box-contact-top-i"></i>
	              				</div>
	              				<div class="col-lg-8 pt-2">
	              					<h5 class="small-box-contact-top-h5">Address</h5>
	              					<p class="small-box-contact-top-p text-left"><?= nl2br($content->address) ?></p>
	              				</div>
	              			</div>
	              			<div class="row mb-4" data-aos="fade-right" data-aos-delay="100">
	              				<div class="col-lg-4 text-right">
	              					<i class="bx bx-phone-call small-box-contact-top-i"></i>
	              				</div>
	              				<div class="col-lg-8 pt-2">
	              					<h5 class="small-box-contact-top-h5">Let's Talk</h5>
	              					<p class="small-box-contact-top-p text-left"><?= $content->phone ?></p>
	              				</div>
	              			</div>
	              			<div class="row mb-4" data-aos="fade-right" data-aos-delay="100">
	              				<div class="col-lg-4 text-right">
	              					<i class="bx bx-envelope small-box-contact-top-i"></i>
	              				</div>
	              				<div class="col-lg-8 pt-2">
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


<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
            	<h3 class="get-in-touch-title">Get in touch</h3>
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="form-row">
                        <div class="col form-group">
                            <input type="text" name="name" class="form-control kava-input" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validate"></div>
                        </div>
                        <div class="col form-group">
                            <input type="email" class="form-control kava-input" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control kava-input" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control kava-input" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-theme btn-main-color">Send Message</button></div>
                </form>
            </div>
            <div class="col-lg-6 ">
                <iframe class="mb-4 mb-lg-0" src="<?= $content->map ?>" frameborder="0" style="border:0; width: 100%; height: 450px;" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Section -->

@stop