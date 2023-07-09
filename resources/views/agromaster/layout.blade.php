<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!--===== Styles ============================================ -->

    <!--===== Vendor CSS (Bootstrap & Icon Font) =====-->
    <link rel="stylesheet" href="{{ asset('/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/default.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/style.min.css') }}">
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>
    <body>
    <!--====== Header Start ======-->
        @include('agromaster.header')
    <!--====== Header Ends ======-->



    <!--====== Footer Start ======-->
        @include('agromaster.footer')
    <!--====== Footer Ends ======-->

    <!--====== BACK TOP TOP PART START ======-->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!--====== BACK TOP TOP PART ENDS ======-->


        <!--====== Jquery js ======-->
        <script src="{{ asset('/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/modernizr-3.7.1.min.js') }}"></script>

        <!--====== All Plugins js ======-->
        <script src="{{ asset('/js/plugins/popper.min.js') }}"></script>
        <script src="{{ asset('/js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/plugins/slick.min.js') }}"></script>
        <script src="{{ asset('/js/plugins/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('/js/plugins/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('/js/plugins/wow.min.js') }}"></script>
        <script src="{{ asset('/js/plugins/ajax-contact.js') }}"></script>

        <!--====== Main Activation  js ======-->
        <script src="{{ asset('/js/main.js') }}"></script>

    </body>
</html>
