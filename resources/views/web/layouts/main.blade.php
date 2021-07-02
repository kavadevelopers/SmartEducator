<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">

		<title><?php if(isset($_title)){ echo $_title.' | '; } ?><?= App\Http\Controllers\BaseController::getSetting()->name; ?></title>
		<meta content="" name="description">
		<meta content="" name="keywords">

		<!-- Favicons -->
		<link href="{{ URL::asset('public/web/asset/img/favicon.png') }}" rel="icon">
		<link href="{{ URL::asset('public/web/asset/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

		<!-- Vendor CSS Files -->
		<link href="{{ URL::asset('public/web/asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/web/asset/vendor/font-awesome/css/font-awesome.min.css') }}">
		<link href="{{ URL::asset('public/web/asset/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('public/web/asset/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('public/web/asset/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('public/web/asset/vendor/venobox/venobox.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('public/web/asset/vendor/aos/aos.css') }}" rel="stylesheet">

		<!-- Template Main CSS File -->
		<link href="{{ URL::asset('public/web/asset/css/style.css') }}" rel="stylesheet">
		<script src="{{ URL::asset('public/web/asset/vendor/jquery/jquery.min.js') }}"></script>
		<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

		<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
		@stack('css')
	</head>
	<body>
		<div id="preloader"></div>

		<!-- Wrapper -->
		<div class="wrapper">

			<!-- Sidebar -->
			@include('web.layouts.sidebar')
			<!-- End sidebar -->

			<!-- Content -->
		    <div class="content">

		    	<!-- ======= Header ======= -->
		    	@include('web.layouts.header')
		    	<!-- End Header -->

		    	<main id="main">


		    		@yield('content')


		    	</main>

		    	<!-- Footer -->
		    	@include('web.layouts.footer')
		    	<!-- End Footer -->

		    </div>
		    <!-- End content -->

		</div>
		<!-- End wrapper -->


		<script src="{{ URL::asset('public/web/asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ URL::asset('public/web/asset/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
		<script src="{{ URL::asset('public/web/asset/vendor/php-email-form/validate.js') }}"></script>
		<script src="{{ URL::asset('public/web/asset/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
		<script src="{{ URL::asset('public/web/asset/vendor/counterup/counterup.min.js') }}"></script>
		<script src="{{ URL::asset('public/web/asset/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
		<script src="{{ URL::asset('public/web/asset/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
		<script src="{{ URL::asset('public/web/asset/vendor/venobox/venobox.min.js') }}"></script>
		<script src="{{ URL::asset('public/web/asset/vendor/aos/aos.js') }}"></script>
		<script src="{{ URL::asset('public/web/asset/js/main.js') }}"></script>
		@stack('js')
	</body>
</html>