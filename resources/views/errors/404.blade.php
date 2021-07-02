<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<title>404 Page not found | {{env('APP_NAME')}}</title>
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
	<link rel="icon" href="{{ URL::asset('public/img/'.env('FAVICON')) }}" type="image/x-icon">
	

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/assets/error/style404.css') }}">

	
</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<lottie-player src="https://assets8.lottiefiles.com/packages/lf20_F3k8xS.json"  background="transparent"  speed="1"  style="width: 100%;"  loop autoplay></lottie-player>
			</div>
			<h2>Page not found</h2>
			<p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
			<a href="{{ URL::asset('')}}">home page</a>
		</div>
	</div>

</body>

</html>