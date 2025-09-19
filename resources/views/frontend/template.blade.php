<!doctype html>
<html lang="en">
<head>
    <!--required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    
    <!--meta-->
    <meta name="description" content="Astrology Website">
    <meta name="author" content="JesperApps">

    <!--favicon icon-->
    <link rel="icon" href="assets/img/favicon.png" type="image/png" sizes="16x16">

    <!--title-->
    <title>Astro Match Online - Find Your Perfect Cosmic Connection</title>

    <!--build:css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link href="assets/fonts/style.css" rel="stylesheet" />	
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- endbuild -->

    <!--custom css start-->
    <link rel="stylesheet" href="assets/css/customs.css">
    <!--custom css end-->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

</head>
<body>
    
<div class="main-wrapper bg-soft-blue">
    @include('frontend.layouts.header')
</div>

@yield('content')


@include('frontend.layouts.footer')