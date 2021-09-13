@extends('web.layouts.main')

@section('content')

<section id="team contact-top" class="team section-bg-white" style="margin-top: 150px;">
    <div class="container" data-aos="fade-up">
	    <div class="section-title">
	        <h3><?= $_title ?></h3>
	        <div class="title-border"></div>
	    </div>
        <div class="row"  style="color: #222222">
        	<div class="col-lg-12" style="margin-top: 30px;">
        		<h4 class="heading_founder">Duration of <?= $item->fname ?></h4>
        		<p><?= $item->duration ?></p>
        	</div>
        	<div class="col-lg-12" style="margin-top: 30px;">
        		<h4 class="heading_founder">About the program of <?= $item->fname ?></h4>
        		<p><?= $item->about ?></p>
        	</div>
        	<div class="col-lg-12" style="margin-top: 30px;">
        		<h4 class="heading_founder">Specialization of <?= $item->fname ?></h4>
        		<p><?= $item->specialization ?></p>
        	</div>
        	<div class="col-lg-12" style="margin-top: 30px;">
        		<h4 class="heading_founder">Eligibility Criteria of <?= $item->fname ?></h4>
        		<p><?= $item->eligibility ?></p>
        	</div>

        	<div class="col-lg-12" style="margin-top: 30px;">
        		<h4 class="heading_founder">Job role of <?= $item->fname ?></h4>
        		<p><?= $item->job_role ?></p>
        	</div>
        	<div class="col-lg-12" style="margin-top: 30px;">
        		<h4 class="heading_founder">Admission Process of <?= $item->fname ?></h4>
        		<p><?= $item->process ?></p>
        	</div>
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
        	<form action="<?= url('savecontact') ?>" method="post" role="form">
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