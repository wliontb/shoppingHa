<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/favicon.ico')}}">
    <!-- Place favicon.ico in the root directory -->
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- all css here -->
    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
        }
    </style>
    <!-- style css -->
    <link rel="stylesheet" href="https://preview.hasthemes.com/writer-preview/writer/style.css">
    @yield('css')
    <!-- modernizr css -->
    <script src="{{asset('frontend/js/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
@include('components.header')
@yield('content')
<!-- Footer Area Start -->
@include('components.footer')
<!-- Footer Area End -->
<!-- all js here -->
<!-- jquery latest version -->
<script src="{{asset('frontend/js/jquery-1.12.0.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- owl.carousel js -->
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<!-- jquery-ui js -->
<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
<!-- jquery Counterup js -->
<script src="{{asset('frontend/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
<!-- jquery countdown js -->
<script src="{{asset('frontend/js/jquery.countdown.min.js')}}"></script>
<!-- jquery countdown js -->
<script type="text/javascript" src="{{asset('frontend/js/venobox.min.js')}}"></script>
<!-- jquery Meanmenu js -->
<script src="{{asset('frontend/js/jquery.meanmenu.js')}}"></script>
<!-- wow js -->
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>
<!-- scrollUp JS -->
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<!-- plugins js -->
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<!-- Nivo slider js -->
<script src="{{asset('frontend/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/home.js')}}" type="text/javascript"></script>
<!-- main js -->
<script src="{{asset('frontend/js/main.js')}}"></script>
@yield('js')
</body>

</html>
