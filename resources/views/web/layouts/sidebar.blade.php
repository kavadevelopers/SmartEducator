
	<nav class="sidebar">
	    <!-- close sidebar menu -->
	    <div class="dismiss">
	        <i class="fa fa-times"></i>
	    </div>
	 
	    <div class="logo">
	        <h3>
	        	<a href="home">
	        		<img src="{{ URL::asset('public/web/asset/img/logo.png') }}" class="sidebar-logo" alt="">
	        	</a>
	        </h3>
	    </div>
	 
	    <ul class="list-unstyled menu-elements">
	        <li class="active">
	            <a class="scroll-link" href="home"><span class="iconify sidebar-icons" data-icon="mdi:home-outline" data-inline="false"></span> Home</a>
	        </li>
	        <li>
	            <a class="scroll-link" href="about-us"><i class="fa fa-info-circle"></i> About</a>
	        </li>
	        <li>
	            <a class="scroll-link" href="blog"><i class="fa fa-rss"></i> Blog</a>
	        </li>
	        <li>
	            <a class="scroll-link" href="listing"><i class="fa fa-university"></i> Courses and Univercities</a>
	        </li>
	        <li>
	            <a class="scroll-link" href="contact-us"><i class="fa fa-volume-control-phone"></i> Contact us</a>
	        </li>

	        <?php foreach (DB::table('pages')->get() as $key => $value) { ?>
				<li>
		            <a class="scroll-link" href="<?= $value->slug ?>"><i class="<?= $value->icon ?>"></i> <?= $value->name ?></a>
		        </li>	        	
	        <?php } ?>

	        <li>
	            <a class="scroll-link" href="dashboard"><i class="fa fa-user"></i> Login</a>
	        </li>
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
	    </ul>
	 
	</nav>
	
	
	<!-- Dark overlay -->
	<div class="sidebar-overlay"></div>