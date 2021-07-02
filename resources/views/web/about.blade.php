@extends('web.layouts.main')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background: url('<?= URL::asset("public/web/asset/img/about.png") ?>') top left; background-size: cover;">
	<div class="container" data-aos="zoom-out" data-aos-delay="100">
			<h1>About us</h1>
	</div>
</section>
<!-- End Hero -->

<!-- ======= Team Section ======= -->
<section id="team contact-top" class="team section-bg-white">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h3>TITLE </h3>
            <div class="title-border"></div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
</section>
<!-- End Team Section -->

<section id="team contact-top" class="team section-bg p-0">
    <div class="row" data-aos="fade-up">
        <div class="col">
        	<img src="<?= URL::asset("public/web/asset/img/about-us-banner-small.png") ?>" style="width:100%;">
        </div>
        <div class="col">

        	<div class="section-title" style="margin-top: 228px;">
	            <h3>TITLE </h3>
	            <div class="title-border"></div>
	            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	        </div>

        </div>
    </div>
</section>

<!-- ======= Clients Section ======= -->
<section id="clients" class="clients section-bg-white">
    <div class="container" data-aos="zoom-in">
    	<div class="section-title">
            <h3>Our partners</h3>
            <div class="title-border"></div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="<?= URL::asset("public/web/asset/img/clients/client-1.png") ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="<?= URL::asset("public/web/asset/img/clients/client-2.png") ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="<?= URL::asset("public/web/asset/img/clients/client-3.png") ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="<?= URL::asset("public/web/asset/img/clients/client-4.png") ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="<?= URL::asset("public/web/asset/img/clients/client-5.png") ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                <img src="<?= URL::asset("public/web/asset/img/clients/client-6.png") ?>" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row" style="margin-top: 20px;margin-bottom: 20px;">
        	<div class="col-lg-12">
        		<a href="#" class="our-partner-slider-btn">
        			<i class="fa fa-arrow-left"></i>
        		</a>
        		<a href="#" class="our-partner-slider-btn">
        			<i class="fa fa-arrow-right"></i>
        		</a>
        	</div>
        </div>
    </div>
</section>
<!-- End Clients Section -->

<!-- ======= Founder section ======= -->
<section id="team contact-top" class="team section-bg">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up" data-aos-delay="100" style="margin-bottom: 200px; margin-top: 200px;">

        	<div class="col-4 col_bg">
        		<div class="section-title-founder info-box-squre overlap_col overlap_col-left">
					<h4 class="heading_founder">Meet Our Co-founder</h4>
					<h6 class="founder_desc">Lipsome</h6>
					<p class="founder_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
				</div>
        	</div>

        	<div class="col-4 col_bg">
					
			</div>
			<div class="col-4 col_bg">
				<img src="<?= URL::asset("public/web/asset/img/person.png") ?>" style="right: 12%;" class="founder-image" data-aos="fade-left" data-aos-delay="100">
			</div>	
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
        	<div class="col-4 col_bg">
				<img src="<?= URL::asset("public/web/asset/img/team.png") ?>" style="left: 12%;" class="founder-image" data-aos="fade-left" data-aos-delay="100">
			</div>	
			<div class="col-4 col_bg">
					
			</div>
        	<div class="col-4 col_bg">
        		<div class="section-title-founder info-box-squre overlap_col overlap_col-right">
					<h4 class="heading_founder">Meet Our Team</h4>
					<h6 class="founder_desc">Lipsome</h6>
					<p class="founder_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
				</div>
        	</div>

        	
			
        </div>

        <div class="row text-center" style="margin-top: 20px;margin-bottom: 20px;">
        	<div class="col-lg-12">
        		<a href="#" class="our-partner-slider-btn">
        			<i class="fa fa-arrow-left"></i>
        		</a>
        		<a href="#" class="our-partner-slider-btn">
        			<i class="fa fa-arrow-right"></i>
        		</a>
        	</div>
        </div>
    </div>
</section>
<!-- End Founder section -->

<div class="footer-newsletter" style="background: url('<?= URL::asset("public/web/asset/img/enquiry.png") ?>') top left; background-size: cover;">
  	<div class="container">
    	<div class="row justify-content-center">
      		<div class="col-lg-6">
        		<h4>Get your college listed now!!</h4>
        		<a href="#" class="btn btn-theme btn-main-color">Enquiry</a>
      		</div>
    	</div>
  	</div>
</div>

@stop