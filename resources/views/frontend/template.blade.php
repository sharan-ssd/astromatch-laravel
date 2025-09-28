<!doctype html>
<html lang="en">

<head>
    <!--required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />

    <!--meta-->
    <meta name="description" content="Astrology Website">
    <meta name="author" content="JesperApps">

    <!--favicon icon-->
    <link rel="icon" href="{{asset('assets/img/favicon.png')}}" type="image/png" sizes="16x16">

    <!--title-->
    <title>Astro Match Online - Find Your Perfect Cosmic Connection</title>

    <!--build:css-->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    <link href="{{asset('assets/fonts/style.css')}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- endbuild -->

    <!--custom css start-->
    <link rel="stylesheet" href="{{asset('assets/css/customs.css')}}">
    <!--custom css end-->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

</head>

<body>

    <div class="main-wrapper bg-soft-blue">
        @include('frontend.layouts.header')
    </div>

    @yield('content')


    <script>
        function addError(currentInput, label) {
        var errorElement = `<span class="error text-red">${label??' Invalid Input'}</span>`
        currentInput.parent().append(errorElement);
    }


    </script>

</body>
@include('frontend.layouts.footer')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(Session::has('success'))
    <script>
        $(document).ready(function() {
            toastr.success("{{ Session::get('success') }}");
        });
    </script>
@endif

@if(Session::has('error'))
    <script>
        $(document).ready(function() {
            toastr.error("{{ Session::get('error') }}");
        });
    </script>
    
@endif