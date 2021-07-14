@extends('web.layouts.main')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<!-- ======= Hero Section ======= -->
<!-- <section id="hero" class="d-flex align-items-center">
	
</section> -->
<!-- End Hero -->
<section id="team contact-top" class="team section-bg" style="margin-top: 102px;">
    <div class="container-fluid" data-aos="zoom-out" data-aos-delay="100" style="padding:0;">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach($sliders as $k => $slider){ ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $k ?>" class="<?= $k==0?'active':'' ?>"></li>
                <?php } ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach($sliders as $k => $slider){ ?>
                    <div class="carousel-item <?= $k==0?'active':'' ?>">
                        <img class="d-block w-100" src="<?= URL::asset("public/uploads/home/".$slider->image) ?>" alt="First slide">
                    </div>
                <?php } ?>    
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
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

<section id="team contact-top" class="team section-bg-white" style="background: url('<?= URL::asset("public/uploads/home/".$steps->banner) ?>') top left; background-size: cover;">
    <div class="container-fluid" data-aos="fade-up">
        <div class="container">
        	<div class="row" style="padding-left: 8%;margin-top: 2%;margin-bottom: 2%;">
        		<div class="col-lg-4 no-gutters">
        			<img src="<?= URL::asset("public/web/asset/img/ring_1.png") ?>" class="img img-100">
        			<p class="p-of-home-blocks">
        				<?= App\Http\Controllers\BaseController::strLimit($steps->step1,245) ?>
        			</p>
        			<span class="num-of-home-blocks-01">01</span>
        		</div>
        		<div class="col-lg-4 no-gutters">
        			<img src="<?= URL::asset("public/web/asset/img/ring_2.png") ?>" class="img img-100">
        			<p class="p-of-home-blocks">
        				<?= App\Http\Controllers\BaseController::strLimit($steps->step2,245) ?>
        			</p>
        			<span class="num-of-home-blocks-02">02</span>
        		</div>
        		<div class="col-lg-4 no-gutters">
        			<img src="<?= URL::asset("public/web/asset/img/ring_3.png") ?>" class="img img-100">
        			<p class="p-of-home-blocks">
        				<?= App\Http\Controllers\BaseController::strLimit($steps->step3,245) ?>
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
        	<div class="col-lg-12 slider">
                <?php foreach($reviews as $revKey => $revVal){ ?>
                    <?php if(isset($revVal[0])){ ?>
                        <div class="slide">
                            <img src="<?= URL::asset("public/web/asset/img/review_1.png") ?>" class="img img-100">
                            <div class="review1 text-center">
                                <?= App\Http\Controllers\BaseController::ratingPrint($revVal[0]->rating) ?>
                                <p class="review-text">"<?= App\Http\Controllers\BaseController::strLimit($revVal[0]->review,74) ?>"</p>
                            </div>
                        </div>
                    <?php } ?> 
                    <?php if(isset($revVal[1])){ ?>
                        <div class="slide">
                            <img src="<?= URL::asset("public/web/asset/img/review_2.png") ?>" class="img img-100">
                            <div class="review2 text-center">
                                <?= App\Http\Controllers\BaseController::ratingPrint($revVal[1]->rating) ?>
                                <p class="review-text">"<?= App\Http\Controllers\BaseController::strLimit($revVal[1]->review,74) ?>"</p>
                            </div>
                        </div>
                    <?php } ?> 
                    <?php if(isset($revVal[2])){ ?>
                        <div class="slide">
                            <img src="<?= URL::asset("public/web/asset/img/review_3.png") ?>" class="img img-100">
                            <div class="review2 text-center">
                                <?= App\Http\Controllers\BaseController::ratingPrint($revVal[2]->rating) ?>
                                <p class="review-text">"<?= App\Http\Controllers\BaseController::strLimit($revVal[2]->review,74) ?>"</p>
                            </div>
                        </div>
                    <?php } ?>   
                <?php } ?>
            </div>
            <div class="col-lg-12 text-center" style="margin-top:40px;">
                <button class="btn btn-theme btn-main-color" data-toggle="modal" data-target="#addReviewModal">Add Review</button>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="savereview" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background: #f6f7f9;">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: #1d262d;">Review Us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-star-rating">
                          <input type="radio" id="5-stars" name="rating" value="5" />
                          <label for="5-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                          <input type="radio" id="4-stars" name="rating" value="4" />
                          <label for="4-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                          <input type="radio" id="3-stars" name="rating" value="3" />
                          <label for="3-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                          <input type="radio" id="2-stars" name="rating" value="2" />
                          <label for="2-stars" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                          <input type="radio" id="1-star" name="rating" value="1" />
                          <label for="1-star" class="star"><i class="active fa fa-star" aria-hidden="true"></i></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <textarea name="desc" rows="5" class="form-control" placeholder="Write Review Here" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-theme btn-main-color">Publish</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(e) {
        $('.slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [
                {
                  breakpoint: 991,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                  }
                },
                {
                    breakpoint: 575,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                    }
                }
            ]
        });
    })
</script>

<style type="text/css">
    .star-block-of-review span i{
        color: #ccc !important;
        text-shadow: 1px 1px #000000;
    }
    .star-block-of-review span .active{
        color: #FDD922 !important;
    }
</style>
@stop