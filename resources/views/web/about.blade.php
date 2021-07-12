@extends('web.layouts.main')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background: url('<?= URL::asset("public/uploads/about/".$content->banner) ?>') top left; background-size: cover;">
	<div class="container" data-aos="zoom-out" data-aos-delay="100">
			<h1>About us</h1>
	</div>
</section>
<!-- End Hero -->

<!-- ======= Team Section ======= -->
<section id="team contact-top" class="team section-bg-white">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h3><?= $content->title ?></h3>
            <div class="title-border"></div>
            <p><?= $content->content ?></p>
        </div>
    </div>
</section>
<!-- End Team Section -->

<section id="team contact-top" class="team section-bg p-0">
    <div class="row" data-aos="fade-up">
        <div class="col">
        	<img src="<?= URL::asset("public/uploads/about/".$content->image) ?>" style="width:100%;">
        </div>
        <div class="col">
        	<div class="section-title" style="margin-top: 228px;">
	            <h3><?= $content->title2 ?></h3>
	            <div class="title-border"></div>
	            <p><?= $content->content2 ?></p>
	        </div>

        </div>
    </div>
</section>

<!-- ======= Clients Section ======= -->
<section class="section-bg-white">
    <div class="container" data-aos="zoom-in">
    	<div class="section-title">
            <h3>Our partners</h3>
            <div class="title-border"></div>
        </div>
        <div class="row">
            <section class="customer-logos slider">
                <?php foreach($sliders as $slider){ ?>
                    <div class="slide"><img src="<?= URL::asset("public/uploads/about/".$slider->image) ?>"></div>
                <?php } ?>
            </section>
        </div>
        <!-- <div class="row" style="margin-top: 20px;margin-bottom: 20px;">
        	<div class="col-lg-12 text-center">
        		<a href="#" class="our-partner-slider-btn">
        			<i class="fa fa-arrow-left"></i>
        		</a>
        		<a href="#" class="our-partner-slider-btn">
        			<i class="fa fa-arrow-right"></i>
        		</a>
        	</div>
        </div> -->
    </div>
</section>
<!-- End Clients Section -->

<!-- ======= Founder section ======= -->
<section id="team contact-top" class="team section-bg">
    <div class="container">
        <div class="row"style="margin-bottom: 200px; margin-top: 200px;">

        	<div class="col-4 col_bg">
        		<div class="section-title-founder info-box-squre overlap_col overlap_col-left">
					<h4 class="heading_founder"><?= App\Http\Controllers\BaseController::strLimit($content->cotitle,22) ?></h4>
					<h6 class="founder_desc"><?= App\Http\Controllers\BaseController::strLimit($content->cosubtitle,30) ?></h6>
					<p class="founder_desc"><?= App\Http\Controllers\BaseController::strLimit($content->cocontent,467) ?></p>
				</div>
        	</div>

        	<div class="col-4 col_bg">
					
			</div>
			<div class="col-4 col_bg">
				<img src="<?= URL::asset("public/uploads/about/".$content->coimage) ?>" style="right: 12%;" class="founder-image">
			</div>	
        </div>

        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" style="overflow: visible;">
                    <?php foreach($teams as $ky => $vl){ ?>
                        <?php if ($ky % 2 == 0){ ?>
                            <div class="carousel-item <?= $ky == 0?'active':''; ?>">
                                <div class="row">
                                    <div class="col-4 col_bg">
                                        <img src="<?= URL::asset("public/uploads/about/".$vl->banner) ?>" style="left: 12%;" class="founder-image">
                                    </div>  
                                    <div class="col-4 col_bg">
                                            
                                    </div>
                                    <div class="col-4 col_bg">
                                        <div class="section-title-founder info-box-squre overlap_col overlap_col-right">
                                            <h4 class="heading_founder"><?= App\Http\Controllers\BaseController::strLimit($vl->title,22) ?></h4>
                                            <h6 class="founder_desc"><?= App\Http\Controllers\BaseController::strLimit($vl->sub,30) ?></h6>
                                            <p class="founder_desc"><?= App\Http\Controllers\BaseController::strLimit($vl->content,467) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="carousel-item <?= $ky == 0?'active':''; ?>">
                                <div class="row">
                                    <div class="col-4 col_bg">
                                        <div class="section-title-founder info-box-squre overlap_col overlap_col-left">
                                            <h4 class="heading_founder"><?= App\Http\Controllers\BaseController::strLimit($vl->title,22) ?></h4>
                                            <h6 class="founder_desc"><?= App\Http\Controllers\BaseController::strLimit($vl->sub,30) ?></h6>
                                            <p class="founder_desc"><?= App\Http\Controllers\BaseController::strLimit($vl->content,467) ?></p>
                                        </div>
                                    </div>

                                    <div class="col-4 col_bg">
                                            
                                    </div>
                                    <div class="col-4 col_bg">
                                        <img src="<?= URL::asset("public/uploads/about/".$vl->banner) ?>" style="right: 12%;" class="founder-image">
                                    </div>  
                                </div>
                            </div>
                        <?php  } ?>
                    <?php } ?>  
                </div>
            </div>
        </div>

        <div class="row text-center" style="margin-top: 20px;margin-bottom: 20px;">
        	<div class="col-lg-12">
        		<a href="#" class="our-partner-slider-btn team-slider-prev">
        			<i class="fa fa-arrow-left"></i>
        		</a>
        		<a href="#" class="our-partner-slider-btn team-slider-next">
        			<i class="fa fa-arrow-right"></i>
        		</a>
        	</div>
        </div>
    </div>
</section>
<!-- End Founder section -->

<div class="footer-newsletter" style="background: url('<?= URL::asset("public/uploads/about/".$content->bbanner) ?>') top left; background-size: cover;">
  	<div class="container">
    	<div class="row justify-content-center">
      		<div class="col-lg-6">
        		<h4><?= $content->btitle ?></h4>
        		<a href="#" class="btn btn-theme btn-main-color">Enquiry</a>
      		</div>
    	</div>
  	</div>
</div>


<script type="text/javascript">
    $(function(e) {
        $('.team-slider-next').click(function(e) {
            e.preventDefault();
            $('.carousel').carousel('next');
        })
        $('.team-slider-prev').click(function(e) {
            e.preventDefault();
            $('.carousel').carousel('prev');
        })
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    })
</script>

@stop