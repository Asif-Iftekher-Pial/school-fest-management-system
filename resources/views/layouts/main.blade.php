<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="York Group">
    <link rel="icon" href="{{ asset('main/dist/images/logo.jpg') }}" type="image/gif" sizes="16x16">
    <title>IHSB Stem Fest |  @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('main/node_modules/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('main/node_modules/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('main/dist/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('main/dist/css/style.css') }}">
    <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">

    <style type="text/css" media="screen">
        video {
          width: 100%    !important;
          height: auto   !important;
        }
        .card .carousel-item {
          height: 200px;
        }
        .card .carousel-caption {
          padding: 0;
          right: 0;
          left: 0;
          color: #3d3d3d;
        }
        .card .carousel-caption h3 {
          color: #3d3d3d;
        }
        .card .carousel-caption p {
          line-height: 30px;
        }
        .card .carousel-caption .col-sm-3 {
          display: flex;
          align-items: center;
        }
        .card .carousel-caption .col-sm-9 {
          text-align: left;
        }
        .navi a {
            text-decoration:none;
        }
        a > .ico {
            background-color: grey;
            padding: 10px;
            
        }
        a:hover > .ico {
            background-color: #666;
        }

    </style>
  </head>
  <body>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('main/node_modules/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('main/node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ asset('main/node_modules/@fortawesome/fontawesome-free/js/fontawesome.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script> --}}
    
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $('#myCarousel').carousel({
    interval: 3000,
    })
    </script>
    <script>
    AOS.init();
    </script>

    @yield('java_script')
  </body>
</html>