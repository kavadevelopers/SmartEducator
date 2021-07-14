@extends('web.layouts.main')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="background: url('<?= URL::asset("public/uploads/blog/".$blog->banner) ?>') top left; background-size: cover;">
	<div class="container" data-aos="zoom-out" data-aos-delay="100">
		<h1><?= $_title ?></h1>
	</div>
</section>
<!-- End Hero -->

<!-- ======= Team Section ======= -->

<section id="team contact-top" class="team section-bg-white" style="">
    <div class="container" data-aos="fade-up">
	    <div class="section-title">
	        <h3><?= $blog->sub ?></h3>
	        <div class="title-border"></div>
	    </div>
        <div style="color: #222222"><?= $blog->content ?></div>
    </div>
</section>


<!-- End Team Section -->


@stop