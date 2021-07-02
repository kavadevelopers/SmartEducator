@extends('web.layouts.main')

@section('content')

<!-- ======= Hero Section ======= -->
<?php if($banner != ""){  ?>
<section id="hero" class="d-flex align-items-center" style="background: url('<?= $banner ?>') top left; background-size: cover;">
	<div class="container" data-aos="zoom-out" data-aos-delay="100">
			<h1><?= $_title ?></h1>
	</div>
</section>
<?php } ?>
<!-- End Hero -->

<!-- ======= Team Section ======= -->

<section id="team contact-top" class="team section-bg-white" style="<?php if($banner == ""){  ?> margin-top: 150px;<?php } ?>">
    <div class="container" data-aos="fade-up">
    	<?php if($banner == ""){  ?>
		    <div class="section-title">
		        <h3><?= $_title ?></h3>
		        <div class="title-border"></div>
		    </div>
        <?php } ?>
        <div style="color: #222222"><?= $content ?></div>
    </div>
</section>


<!-- End Team Section -->


@stop