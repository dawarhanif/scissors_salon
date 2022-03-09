<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
<link href="{{asset('front/css/all.css')}}" rel="stylesheet">

<!-- <link rel="stylesheet" href="css/switcher.css"> -->
<link rel="stylesheet" href="{{asset('front/rs-plugin/css/settings.css')}}">
<!-- Jquery Fancybox CSS -->
<link rel="stylesheet" type="text/css')}}" href="{{asset('front/css/jquery.fancybox.min.css')}}" media="screen" />
<link href="{{asset('front/css/style.css')}}" rel="stylesheet"  id="colors">


@yield('beforeHeadClose')

</head>
<body>
    @include('front.layout.header')

    @yield('content')

    @include('front.layout.footer')
    <!-- Js --> 
<script src="{{asset('front/js/jquery.min.js')}}"></script> 
<script src="{{asset('front/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('front/js/popper.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('front/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('front/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script> 
<!-- Jquery Fancybox --> 
<script src="{{asset('front/js/jquery.fancybox.min.js')}}"></script> 
<!-- general script file --> 
<script src="{{asset('front/js/owl.carousel.js')}}"></script> 
<script src="{{asset('front/js/script.js')}}"></script>
    @yield('beforeBodyClose')
</body>
</html>