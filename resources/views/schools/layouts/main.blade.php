<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="MD Khalid Hossain">
    <meta property="og:url"           content="" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="" />
    <meta property="og:description"   content="" />
    <link rel="icon" href="{{ asset('main/dist/images/logo.jpg') }}" type="image/gif" sizes="16x16">
    <title>IHSB Stem Fest |  @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('main/node_modules/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('main/node_modules/font-awesome/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('main/dist/css/school_css.css') }}">
    
    <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">

    

    </head>
  <body>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('main/node_modules/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('main/node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ asset('main/node_modules/@fortawesome/fontawesome-free/js/fontawesome.js') }}"></script>

    @yield('java_script')    
    
  </body>
</html>