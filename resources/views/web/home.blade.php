@extends('web.layouts.main')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background: url('<?= URL::asset("public/web/asset/img/hero-bg.png") ?>') top left; background-size: cover;">
	<div class="container" data-aos="zoom-out" data-aos-delay="100">
			<!-- <h1>Colleges and Univercities</h1> -->
	</div>
</section>
<!-- End Hero -->

<!-- ======= Team Section ======= -->
<section id="team contact-top" class="team section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h3>CHOSE FROM A VARIETY OF COURCES AND UNIVERCITIES </h3>
            <div class="title-border"></div>
        </div>
        <div class="row" style="margin-top: 5%;">
        	<div class="col-lg-6 col-md-6 home-info-box" data-aos="fade-up" data-aos-delay="100">
                <div class="info-box home-info-box-shadow">
                	<h4 class="home-box-title">Cources</h4>
                    <div class="member-img" style="margin-top:50px; margin-bottom:80px;">
                        
                        <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_kq5rGs.json"  background="transparent"  speed="1"  style="width: 90%; height: auto; margin: 0 auto;"  loop autoplay></lottie-player>
                    </div>
                    <div class="member-info">
                        
                        <span>12540</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 home-info-box" data-aos="fade-up" data-aos-delay="100">
                <div class="info-box home-info-box-shadow">
                	<h4 class="home-box-title">Univercities</h4>
                    <div class="member-img" style="margin-top:50px; margin-bottom:80px;">
                        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_dT1E1P.json"  background="transparent"  speed="1"  style="width: 78%; height: auto; margin: 0 auto;"  loop autoplay></lottie-player>
                    </div>
                    <div class="member-info">
                        
                        <span>12540</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center" style="margin-top: 5%;">
        	<div class="col-lg-12 text-center">
        		<a href="#" class="btn-view-all">View All</a>
        	</div>
        </div>
    </div>
</section>
<!-- End Team Section -->

<section id="team contact-top" class="team section-bg-white" style="background: url('<?= URL::asset("public/web/asset/img/map.png") ?>') top left; background-size: cover;">
    <div class="container-fluid" data-aos="fade-up">
        <div class="container">
        	<div class="row" style="padding-left: 8%;margin-top: 2%;margin-bottom: 2%;">
        		<div class="col-lg-4 no-gutters">
        			<img src="<?= URL::asset("public/web/asset/img/ring_1.png") ?>" class="img img-100">
        			<p class="p-of-home-blocks">
        				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
        			</p>
        			<span class="num-of-home-blocks-01">01</span>
        		</div>
        		<div class="col-lg-4 no-gutters">
        			<img src="<?= URL::asset("public/web/asset/img/ring_2.png") ?>" class="img img-100">
        			<p class="p-of-home-blocks">
        				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
        			</p>
        			<span class="num-of-home-blocks-02">02</span>
        		</div>
        		<div class="col-lg-4 no-gutters">
        			<img src="<?= URL::asset("public/web/asset/img/ring_3.png") ?>" class="img img-100">
        			<p class="p-of-home-blocks">
        				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
        			</p>
        			<span class="num-of-home-blocks-03">03</span>
        		</div>
        	</div>
        </div>
    </div>
</section>

<section id="team contact-top" class="team section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h3>STUDENT REVIEWS</h3>
            <div class="title-border"></div>
        </div>
        <div class="row" style="margin-top: 5%;">
        	<div class="col-lg-4">
    			<img src="<?= URL::asset("public/web/asset/img/review_1.png") ?>" class="img img-100">
    			<div class="review1 text-center">
    				<p class="star-block-of-review">
    					<span>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			            </span>
			        </p>
			        <p class="review-text">"Lorem Ipsum is simply dummy text of the printing and typesetting industry."</p>
    			</div>
    		</div>

    		<div class="col-lg-4">
    			<img src="<?= URL::asset("public/web/asset/img/review_2.png") ?>" class="img img-100">
    			<div class="review2 text-center">
    				<p class="star-block-of-review">
    					<span>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			            </span>
			        </p>
			        <p class="review-text">"Lorem Ipsum is simply dummy text of the printing and typesetting industry."</p>
    			</div>
    		</div>

    		<div class="col-lg-4">
    			<img src="<?= URL::asset("public/web/asset/img/review_3.png") ?>" class="img img-100">
    			<div class="review2 text-center">
    				<p class="star-block-of-review">
    					<span>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			                <i class="fa fa-star" aria-hidden="true"></i>
			            </span>
			        </p>
			        <p class="review-text">"Lorem Ipsum is simply dummy text of the printing and typesetting industry."</p>
    			</div>
    		</div>
        </div>
    </div>
</section>

@stop