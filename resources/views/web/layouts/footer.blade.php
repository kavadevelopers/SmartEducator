	<?php $sLinks = DB::table('cms_social_links')->orderby('sort','asc')->get(); ?>
	<footer id="footer">
	    <div class="footer-top">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-3 col-md-6 footer-links">
	                    <h4>CONTENT</h4>
	                    <ul>
	                    	<?php foreach(DB::Table('cms_footer_links_a')->where('parent','1')->get() as $ll){  ?>
	                        	<li><a href="<?= App\Http\Controllers\BaseController::linksCheck($ll->link) ?>"><?= $ll->name ?></a></li>
	                        <?php } ?>
	                    </ul>
	                </div>
	                <div class="col-lg-3 col-md-6 footer-links">
	                    <h4>INFORMATION</h4>
	                    <ul>
	                       	<?php foreach(DB::Table('cms_footer_links_a')->where('parent','2')->get() as $ll){  ?>
	                        	<li><a href="<?= App\Http\Controllers\BaseController::linksCheck($ll->link) ?>"><?= $ll->name ?></a></li>
	                        <?php } ?>
	                    </ul>
	                </div>
	                <div class="col-lg-3 col-md-6 footer-links">
	                    <h4>LEGAL</h4>
	                    <ul>
	                        <?php foreach(DB::Table('cms_footer_links_a')->where('parent','3')->get() as $ll){  ?>
	                        	<li><a href="<?= App\Http\Controllers\BaseController::linksCheck($ll->link) ?>"><?= $ll->name ?></a></li>
	                        <?php } ?>
	                    </ul>
	                </div>
	                <div class="col-lg-3 col-md-6 footer-links">
	                    <h4>SOCIAL MEDIA</h4>
	                    <div class="social-links">
	                    	<?php foreach ($sLinks as $sLinksKey => $sLink) { ?>
	                        	<a href="<?= $sLink->link ?>" class="twitter"><i class="<?= $sLink->icon ?>"></i></a>
	                        <?php } ?>
	                    </div>
	                    <p><?= nl2br(App\Http\Controllers\admin\BaseController::getSetting()->footer_desc) ?></p>
	                    <!-- <a href="#" class="btn btn-theme btn-main-color">Sign up</a> -->
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-lg-6 col-md-6 footer-contact">
	                    <a href="home" class="logo mr-auto"><img src="<?= url('public/uploads/settings/'.App\Http\Controllers\admin\BaseController::getSetting()->logo) ?>" style="max-height: 90px;" alt=""></a>
	                </div>
	                <div class="col-lg-6 col-md-6 footer-links">
	                    <h4>HELP</h4>
	                    <ul>
	                        <?php foreach(DB::Table('cms_footer_links_a')->where('parent','4')->get() as $ll){  ?>
	                        	<li><a href="<?= App\Http\Controllers\BaseController::linksCheck($ll->link) ?>"><?= $ll->name ?></a></li>
	                        <?php } ?>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="container py-4">
	        <div class="copyright text-center col-md-12">
	            &copy; 2021 | Design and Developed by Sapco IOT Pvt Ltd.
	        </div>
	    </div>
	</footer>
	