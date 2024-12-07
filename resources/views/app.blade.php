<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue with Laravel</title>

    <link type="image/png" href="{{ asset('user/assets/images/favicon.png') }}" rel="shortcut icon">
    <link href="{{ asset('user/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/lightcase.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/style.css') }}" rel="stylesheet">

    @vite(['resources/js/user.js', 'resources/css/user.css'])
</head>

<body>
    <div id="user"></div>

    <script src="{{ asset('user/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('user/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/lightcase.js') }}"></script>
    <script src="{{ asset('user/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/functions.js') }}"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}

    <script>
        
        document.addEventListener("DOMContentLoaded", function() {
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
        });
    </script>
</body>

</html>
