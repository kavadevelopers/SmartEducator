<!-- ======= Top Bar ======= -->
	<?php $sLinks = DB::table('cms_social_links')->orderby('sort','asc')->get(); ?>
  	<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    	<div class="container d-flex">
	      	<div class="contact-info mr-auto">
	        	<i class="icofont-envelope"></i> <a href="mailto:<?= App\Http\Controllers\BaseController::getSetting()->email; ?>"><?= App\Http\Controllers\BaseController::getSetting()->email; ?></a>
	        	<i class="icofont-phone"></i> <?= App\Http\Controllers\BaseController::getSetting()->phone; ?>
	      	</div>
	      	<div class="social-links">
	      		<?php foreach ($sLinks as $sLinksKey => $sLink) { ?>
	      			<a href="<?= $sLink->link ?>" class="twitter"><i class="<?= $sLink->icon ?>"></i></a>	
	      		<?php } ?>
	      	</div>
    	</div>
  	</div>

  	
	<header id="header" class="fixed-top">
	   <div class="container d-flex align-items-center">
		   	<div class="col-lg-12 no-gutters">
		   		<div class="row">
					<div class="col-md-3">
			      		<a href="<?= url('home') ?>" class="logo mr-auto"><img src="<?= url('public/uploads/settings/'.App\Http\Controllers\admin\BaseController::getSetting()->logo) ?>" data-aos="zoom-out" data-aos-delay="100" alt=""></a>
					</div>
					<div class="col-md-6">
						<form action="#" method="post" class="header-search">
              				<input type="text" name="email"><input type="submit" value="GO">
            			</form>
					</div>
					<div class="col-md-3 text-right">
						<a href="#" class="menu-logo open-menu" id="menu-toggle"><img src="{{ URL::asset('public/web/asset/img/menu.png') }}" data-aos="fade-left" data-aos-delay="100" alt=""></a>
					</div>
				</div>
			</div>
	   </div>
	</header>
	

	