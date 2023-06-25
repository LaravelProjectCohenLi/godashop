<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mỹ Phẩm Goda - @yield('title')</title>
    @yield('keywords')
    @yield('description')
    <link rel="shortcut icon" type="image/x-icon" href="./img/frontend/logo.jpg" />
    <link rel="stylesheet" href="./vendor/fontawesome-free-6.3.0-web/fontawesome-free-6.3.0-web/css/all.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="./vendor/star-rating/css/star-rating.min.css">
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    <livewire:styles />
    @stack('before-styles')
</head>
<body>
@include('frontend/partitions/header')
@include('frontend/partitions/menu')

@stack('slider')
@stack('service')


<main id="maincontent" class="page-main">
    @yield('content')
</main>
@include('frontend/partitions/footer')

@stack('before-scripts')
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="./vendor/jquery.min.js"></script>
<script src="./vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
<script type="text/javascript" src="./vendor/star-rating/js/star-rating.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="./vendor/format/number_format.js"></script>
<script type="text/javascript" src="./js/script.js"></script>
@stack('after-scripts')
<livewire:scripts />
</body>
</html>

