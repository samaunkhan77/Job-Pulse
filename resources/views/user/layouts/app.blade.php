<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job Pulse </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="#">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('web/img')}}/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('web/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('web/css')}}/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('web/css')}}/flaticon.css">
    <link rel="stylesheet" href="{{asset('web/css')}}/price_rangs.css">
    <link rel="stylesheet" href="{{asset('web/css')}}/slicknav.css">
    <link rel="stylesheet" href="{{asset('web/css')}}/animate.min.css">
    <link rel="stylesheet" href="{{asset('web/css')}}/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('web/css')}}/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('web/css')}}/themify-icons.css">
    <link rel="stylesheet" href="{{asset('web/css')}}/slick.css">
    <link rel="stylesheet" href="{{asset('web/css')}}/nice-select.css">
    <link rel="stylesheet" href="{{asset('web/css')}}/style.css">

    <link href="{{asset('assets/css/toastify.min.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/toastify-js.js')}}"></script>
    <script src="{{asset('assets/js/axios.min.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
</head>

<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{asset('web/img')}}/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
@include('user.components.header')
<main>

    @yield('user_content')
    <!-- Blog Area End -->

</main>

@include('user.components.footer')

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="{{asset('web/js')}}/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('web/js')}}/vendor/jquery-1.12.4.min.js"></script>
<script src="{{asset('web/js')}}/popper.min.js"></script>
<script src="{{asset('web/js')}}/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="{{asset('web/js')}}/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('web/js')}}/owl.carousel.min.js"></script>
<script src="{{asset('web/js')}}/slick.min.js"></script>
<script src="{{asset('web/js')}}/price_rangs.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="{{asset('web/js')}}/wow.min.js"></script>
<script src="{{asset('web/js')}}/animated.headline.js"></script>
<script src="{{asset('web/js')}}/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{asset('web/js')}}/jquery.scrollUp.min.js"></script>
<script src="{{asset('web/js')}}/jquery.nice-select.min.js"></script>
<script src="{{asset('web/js')}}/jquery.sticky.js"></script>

<!-- contact js -->
<script src="{{asset('web/js')}}/contact.js"></script>
<script src="{{asset('web/js')}}/jquery.form.js"></script>
<script src="{{asset('web/js')}}/jquery.validate.min.js"></script>
<script src="{{asset('web/js')}}/mail-script.js"></script>
<script src="{{asset('web/js')}}/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{asset('web/js')}}/plugins.js"></script>
<script src="{{asset('web/js')}}/main.js"></script>

</body>
</html>
