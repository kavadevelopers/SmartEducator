
	<nav class="sidebar">
	    <!-- close sidebar menu -->
	    <div class="dismiss mobile-hide">
	        <i class="fa fa-times"></i>
	    </div>
	 
	    <div class="logo">
	        <h3>
	        	<a href="<?= url('home') ?>">
	        		<img src="<?= url('public/uploads/settings/'.App\Http\Controllers\admin\BaseController::getSetting()->logo) ?>" class="sidebar-logo" alt="">
	        	</a>
	        </h3>
	    </div>
	 
	    <ul class="list-unstyled menu-elements">
	        <li class="active">
	            <a class="scroll-link" href="<?= url('home') ?>"><span class="iconify sidebar-icons" data-icon="mdi:home-outline" data-inline="false"></span> Home</a>
	        </li>
	        <?php if(Session::has('WebId')){ ?>
	        	<li>
		            <a class="scroll-link" href="<?= url('dashboard') ?>"><i class="fa fa-tachometer"></i> Dashboard</a>
		        </li>
		    <?php }?>
	        <li>
	            <a class="scroll-link" href="<?= url('about-us') ?>"><i class="fa fa-info-circle"></i> About</a>
	        </li>
	        <li>
	            <a class="scroll-link" href="<?= url('blog') ?>"><i class="fa fa-rss"></i> Blog</a>
	        </li>
	        <li>
	            <a class="scroll-link" href="<?= url('courses') ?>"><i class="fa fa-university"></i> Courses</a>
	        </li>
	        <li>
	            <a class="scroll-link" href="<?= url('contact-us') ?>"><i class="fa fa-volume-control-phone"></i> Contact us</a>
	        </li>

	        <?php foreach (DB::table('pages')->get() as $key => $value) { ?>
				<li>
		            <a class="scroll-link" href="<?= url(''.$value->slug) ?>"><i class="<?= $value->icon ?>"></i> <?= $value->name ?></a>
		        </li>	        	
	        <?php } ?>
	        <?php if(Session::has('WebId')){ ?>
	        	<li>
		            <a class="scroll-link" href="<?= url('logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
		        </li>
		    <?php }else{ ?>
		        <li>
		            <a class="scroll-link" href="<?= url('login') ?>"><i class="fa fa-user"></i> Login</a>
		        </li>
		    <?php } ?>
	        <!-- <li>
	            <a href="#otherSections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections">
	                <i class="fas fa-sync"></i>Other sections
	            </a>
	            <ul class="collapse list-unstyled" id="otherSections">
	                <li>
	                    <a class="scroll-link" href="#section-3">Our projects</a>
	                </li>
	                <li>
	                    <a class="scroll-link" href="#section-4">We think that...</a>
	                </li>
	            </ul>
	        </li> -->

	        <!-- <li class="copyrights">
	        	Copyright ?? 2021 Smart Educator. All Rights Reserved.
	        </li> -->
	    </ul>
	 
	</nav>
	
	
	<!-- Dark overlay -->
	<div class="sidebar-overlay"></div>