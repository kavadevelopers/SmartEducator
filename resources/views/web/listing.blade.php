@extends('web.layouts.main')

@section('content')


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background: url('<?= URL::asset("public/web/asset/img/listing.png") ?>') top left; background-size: cover;">
	<div class="container" data-aos="zoom-out" data-aos-delay="100">
			<h1>Courses and Univercities</h1>
	</div>
</section><!-- End Hero -->

<!-- ======= Team Section ======= -->
<section id="team contact-top" class="team section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h3>CHOSE FROM YOUR DESIRED COLLEGES COURSES </h3>
            <div class="title-border"></div>
            
        </div>
    </div>
</section>
<!-- End Team Section -->s

<section id="team contact-top" class="team section-bg-white p-0">
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
	            <p style="    font-size: 18px; margin-top: 70px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
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
</section>


<div class="footer-newsletter" style="background: url('<?= URL::asset("public/web/asset/img/listing-bottom.png") ?>') top left; background-size: cover;padding: 160px 0;">
      	<div class="container">
        	<div class="row justify-content-center">
          		<div class="col-lg-6">
            		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
          		</div>
        	</div>
      	</div>
    </div>

    <section id="team contact-top" class="team section-bg">
	    <div class="container" data-aos="fade-up">
	        <div class="section-title">
	            <h3>CONTACT US</h3>
	            <div class="title-border"></div>
	        </div>
	        <div class="col-lg-12" data-aos="fade-up">
	        	<div class="row">
	        		<div class="col" style="padding-right: 30px;">
	        			<div class="form-group">
		        			<input type="text" class="form-control kava-input" placeholder="Name">
		        		</div>
		        		<div class="form-group">
		        			<input type="text" class="form-control kava-input" placeholder="Email">
		        		</div>
		        		<div class="form-group">
		        			<input type="text" class="form-control kava-input" placeholder="Phone">
		        		</div>
		        	</div>
		        	<div class="col" style="padding-left: 30px;">
		        		<div class="form-group">
		        			<textarea type="text" class="form-control kava-input" rows="3" placeholder="Message"></textarea>
		        		</div>
		        		<div class="form-group text-center">
		        			<button type="submit" class="btn btn-theme btn-main-color" style="margin-top:10px;">Send</button>
		        		</div>
		        	</div>
	        	</div>
	        </div>
	    </div>
	</section>
@stop