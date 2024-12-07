<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue with Laravel</title>


	<link rel="shortcut icon" href="{{asset('user/assets/images/favicon.png') }}" type="image/png">
	<link rel="stylesheet" href="{{asset('user/assets/css/animate.css') }}">
	<link rel="stylesheet" href="{{asset('user/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{asset('user/assets/css/icofont.min.css') }}">
	<link rel="stylesheet" href="{{asset('user/assets/css/lightcase.css') }}">
	<link rel="stylesheet" href="{{asset('user/assets/css/swiper.min.css') }}">
	<link rel="stylesheet" href="{{asset('user/assets/css/style.css') }}">


    @vite(['resources/js/user.js', 'resources/css/user.css'])
</head>
<body>
    <div id="user"></div>


    <script src="{{asset('user/assets/js/jquery.js') }}"></script>
	<script src="{{asset('user/assets/js/waypoints.min.js') }}"></script>
	<script src="{{asset('user/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{asset('user/assets/js/isotope.pkgd.min.js') }}"></script>
	<script src="{{asset('user/assets/js/wow.min.js') }}"></script>
	<script src="{{asset('user/assets/js/swiper.min.js') }}"></script>
	<script src="{{asset('user/assets/js/lightcase.js') }}"></script>
	<script src="{{asset('user/assets/js/jquery.counterup.min.js') }}"></script>
	<script src="{{asset('user/assets/js/functions.js') }}"></script>

	{{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}

	<script>
		var swiper = new Swiper(".featured-swiper", {
			slidesPerView: 1,
			spaceBetween: 30,
			centeredSlides: false,
			loop: true,
			autoplay: {
				delay: 1200,
				disableOnInteraction: false,
			},
			pagination: {
				el: ".featured-swiper-pagination",
				clickable: true,
			},
		});
	</script>
</body>
</html>