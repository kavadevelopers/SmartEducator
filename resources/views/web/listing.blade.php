@extends('web.layouts.main')

@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background: url('<?= URL::asset("public/uploads/listing/".$content->banner) ?>') top left; background-size: cover;">
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
        </div>
        <div class="row">
        	<?php if (count($list) > 0){ ?>
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
        	<?php }else{ ?>
        		<div class="col-lg-12">
        			<h3 class="text-center" style="margin-top:40px;margin-bottom: 20px;">No Courses found</h3>
        		</div>
        	<?php } ?>
        </div>
    </div>
</section>
<!-- End Team Section -->

<!-- <section id="team contact-top" class="team section-bg-white p-0">
    <div class="row" data-aos="fade-up" style="padding-bottom: 70px;">
        <div class="col-3">
        	<div class="col-12 p-5">
        		<div class="form-group">
            		<label for="" class="col-form-label">Search</label>
				    <input type="text" class="form-control kava-input" placeholder="Search">
				    <a href="#" class="btn-search-of-listing"><i class="fa fa-search"></i></a>
	            </div>
	            <div class="form-group" style="margin-top: 30px;">
            		<label for="" class="col-form-label">Filter</label>
				    <div class="form-check mar-tb">
					  	<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
					  	<label class="checkbox-label" for="flexCheckDefault">
					   		By Zip Code
					  	</label>
					</div>
					<div class="form-check mar-tb">
					  	<input class="form-check-input" type="checkbox" value="" id="flexCheckDefaul2">
					  	<label class="checkbox-label" for="flexCheckDefaul2">
					   		By Ranking
					  	</label>
					</div>
					<div class="form-check mar-tb">
					  	<input class="form-check-input" type="checkbox" value="" id="flexCheckDefaul3">
					  	<label class="checkbox-label" for="flexCheckDefaul3">
					   		Pupular
					  	</label>
					</div>
					<div class="form-check mar-tb">
					  	<input class="form-check-input" type="checkbox" value="" id="flexCheckDefaul4">
					  	<label class="checkbox-label" for="flexCheckDefaul4">
					   		Price Low To High
					  	</label>
					</div>
					<div class="form-check mar-tb">
					  	<input class="form-check-input" type="checkbox" value="" id="flexCheckDefaul5">
					  	<label class="checkbox-label" for="flexCheckDefaul5">
					   		Price High To Low
					  	</label>
					</div>
					<div class="form-check mar-tb">
					  	<input class="form-check-input" type="checkbox" value="" id="flexCheckDefaul6">
					  	<label class="checkbox-label" for="flexCheckDefaul6">
					   		Newly Added
					  	</label>
					</div>
	            </div>
        	</div>

        </div>
        <div class="col-9">
        	<div class="section-title">
	            <p style="    font-size: 18px; margin-top: 70px;"><?= $content->stitle ?></p>
	        </div>
	        <div class="row">
	        	<div class="col-lg-6">
	        		<h6 class="listing-result-title">COURSES</h6>
	        		<div class="box-filter" style="margin-top: 20px;">
	        			<p>Lorium Ipsum</p>
	        		</div>
	        		<div class="box-filter" style="margin-top: 20px;">
	        			<p>Lorium Ipsum</p>
	        		</div>
	        		<div class="box-filter" style="margin-top: 20px;">
	        			<p>Lorium Ipsum</p>
	        		</div>
	        		<div class="box-filter" style="margin-top: 20px;">
	        			<p>Lorium Ipsum</p>
	        		</div>
	        		<div class="box-filter" style="margin-top: 20px;">
	        			<p>Lorium Ipsum</p>
	        		</div>
	        	</div>
	        	<div class="col-lg-6">
	        		<h6 class="listing-result-title">COLLEGES</h6>
	        		<div class="box-filter" style="margin-top: 20px;">
	        			<p>Lorium Ipsum</p>
	        		</div>
	        		<div class="box-filter" style="margin-top: 20px;">
	        			<p>Lorium Ipsum</p>
	        		</div>
	        		<div class="box-filter" style="margin-top: 20px;">
	        			<p>Lorium Ipsum</p>
	        		</div>
	        		<div class="box-filter" style="margin-top: 20px;">
	        			<p>Lorium Ipsum</p>
	        		</div>
	        		<div class="box-filter" style="margin-top: 20px;">
	        			<p>Lorium Ipsum</p>
	        		</div>
	        	</div>
	        </div>
	        <div class="col-lg-12 text-center" style="margin-top:70px; margin-bottom:10px;">
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
    </div>
</section> -->


	<!-- <div class="footer-newsletter" style="background: url('<?= URL::asset("public/uploads/listing/".$content->banner2) ?>') top left; background-size: cover;padding: 160px 0;">
      	<div class="container">
        	<div class="row justify-content-center">
          		<div class="col-lg-6">
            		<p><?= $content->con_banner ?></p>
          		</div>

        	</div>
      	</div>
    </div> -->

    <section id="team contact-top" class="team section-bg">
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
	                        <img class="d-block w-100" src="<?= URL::asset("public/uploads/listing/".$slider->image) ?>" alt="First slide">
	                        <!-- <div class="carousel-caption">
	                            <h3><?= $slider->title ?></h3>
	                            <p><?= $slider->body ?></p>
	                        </div> -->
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
			        			<?php $courses = DB::table('courses')->where('df','')->get(); ?>
			        			<select class="form-control kava-input" name="subject" required>
		                        	<option value="">-- Select Course --</option>
		                        	<?php foreach ($courses as $key => $value): ?>
		                        		<option value="<?=  $value->name ?>"><?=  $value->name ?></option>
		                        	<?php endforeach ?>
		                        </select>
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