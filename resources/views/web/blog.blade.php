@extends('web.layouts.main')

@section('content')

	
	<!-- ======= Hero Section ======= -->
  	<section id="hero" class="d-flex align-items-center" style="background: url('<?= URL::asset("public/web/asset/img/blog.png") ?>') top left; background-size: cover;">
    	<div class="container" data-aos="zoom-out" data-aos-delay="100">
      		<h1>Blog</h1>
    	</div>
  	</section>
  	<!-- End Hero -->

  	<!-- ======= Team Section ======= -->
	<section id="team" class="team section-bg">
	    <div class="container" data-aos="fade-up">
	        <div class="section-title">
	            <h3>LATEST ARTICLES</h3>
	            <div class="title-border"></div>
	        </div>
	        <div class="row">

	        	@for ($i = 11; $i >= 0; $i--)
	        	<div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
	                <div class="member">
	                    <div class="member-img">
	                        <img src="<?= URL::asset("public/web/asset/img/team-1.png") ?>" class="img-fluid" alt="">
	                        <div class="social">
	                            <a href=""><i class="icofont-twitter"></i></a>
	                            <a href=""><i class="icofont-facebook"></i></a>
	                            <a href=""><i class="icofont-instagram"></i></a>
	                            <a href=""><i class="icofont-linkedin"></i></a>
	                        </div>
	                    </div>
	                    <div class="member-info">
	                        <h4>Walter White</h4>
	                        <span>Chief Executive Officer</span>
	                    </div>
	                </div>
	            </div>
	            @endfor

	        </div>
	        <div class="col-lg-12 text-center" style="margin-top:30px; margin-bottom:10px;">
	        	<div id="pagination">
				    <a href="#" class="blocks"><i class="fa fa-arrow-left"></i> Previous</a>
				    <a href="#" class="blocks active">1</a>
				    <a href="#" class="blocks">2</a>
				    <a href="#" class="blocks">3</a>
				    <a href="#" class="blocks">4</a>
				    <a href="#" class="blocks">5</a>
				    <a href="#" class="blocks">6</a>
				    <a href="#" class="blocks">7</a>
				    <a href="#" class="blocks">8</a>
				    <a href="#" class="blocks">9</a>
				    <a href="#" class="blocks">Next <i class="fa fa-arrow-right"></i></a>
				</div>
	        </div>
	    </div>
	</section>


@stop