@extends('web.layouts.main')

@section('content')
	<script type="text/javascript" src="<?= URL::asset("public/web/asset/vendor/simplePagination/script.js") ?>"></script>
	<link type="text/css" rel="stylesheet" href="<?= URL::asset("public/web/asset/vendor/simplePagination/style.css") ?>"/> 
	
	<!-- ======= Hero Section ======= -->
  	<section id="hero" class="d-flex align-items-center" style="background: url('<?= URL::asset("public/uploads/blog/".$content->banner) ?>') top left; background-size: cover;">
    	<div class="container" data-aos="zoom-out" data-aos-delay="100">
      		<h1><?= $content->title ?></h1>
    	</div>
  	</section>
  	<!-- End Hero -->

  	<!-- ======= Team Section ======= -->
	<section id="team" class="team section-bg">
	    <div class="container" data-aos="fade-up">
	        <div class="section-title">
	            <h3><?= $content->title2 ?></h3>
	            <div class="title-border"></div>
	        </div>
	        <div class="row">

	        	<?php foreach ($list as $key => $value) { ?>
	        		<div class="col-lg-3 col-md-6 align-items-stretch page-item" data-aos="fade-up" data-aos-delay="100">
		                <div class="member">
		                    <div class="member-img">
		                        <img src="<?= URL::asset("public/uploads/blog/".$value->thumb) ?>" class="img-fluid" alt="">
		                        <div class="social">
		                            <a href="<?= $value->fb ?>"><i class="icofont-twitter"></i></a>
		                            <a href="<?= $value->ins ?>"><i class="icofont-facebook"></i></a>
		                            <a href="<?= $value->twi ?>"><i class="icofont-instagram"></i></a>
		                        </div>
		                    </div>
		                    <div class="member-info">
		                        <h4><?= App\Http\Controllers\BaseController::strLimit($value->title,22) ?></h4>
		                        <span><?= App\Http\Controllers\BaseController::strLimit($value->sub,30) ?></span>
		                        <span class="blog-list-time"><?= date('d M Y h:i A',strtotime($value->cat)) ?></span>
		                    </div>
		                </div>
		            </div>	
	        	<?php } ?>

	        </div>
	        <div class="col-lg-12 text-center" style="margin-top:30px; margin-bottom:10px;">
	        	<div id="pagination" class=" pagination-container">

				</div>
	        </div>
	    </div>
	</section>

	<script type="text/javascript">
		$(function() {
			var items = $(".page-item");
			var numItems = items.length;
			var perPage = 12;
			items.slice(perPage).hide();
		    $('.pagination-container').pagination({
		        items: '<?= $count ?>',
		        itemsOnPage: perPage,
		        cssStyle: 'light-theme',
		        prevText:'<i class="fa fa-arrow-left"></i> Previous',
		        nextText:'Next <i class="fa fa-arrow-right"></i>',
		        onPageClick: function(pageNumber) {
            		var showFrom = perPage * (pageNumber - 1);
            		var showTo = showFrom + perPage;
            		items.hide().slice(showFrom, showTo).show();
        		}
		    });
		});
	</script>

@stop