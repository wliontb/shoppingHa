<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="/eshopper/css/bootstrap.min.css" rel="stylesheet">
    <link href="/eshopper/css/font-awesome.min.css" rel="stylesheet">
    <link href="/eshopper/css/prettyPhoto.css" rel="stylesheet">
    <link href="/eshopper/css/price-range.css" rel="stylesheet">
    <link href="/eshopper/css/animate.css" rel="stylesheet">
    <link href="/eshopper/css/main.css" rel="stylesheet">
    @yield('css')
</head>
<body>
@include('components.header')

@yield('content')

@include('components.footer')
<script src="/eshopper/js/jquery.js"></script>
<script src="/eshopper/js/bootstrap.min.js"></script>
<script src="/eshopper/js/jquery.scrollUp.min.js"></script>
<script src="/eshopper/js/price-range.js"></script>
<script src="/eshopper/js/jquery.prettyPhoto.js"></script>
<script src="/eshopper/js/main.js"></script>
@yield('js')
</body>
</html>
