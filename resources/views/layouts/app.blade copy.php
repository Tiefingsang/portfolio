<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Basic -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', 'Tiefing Sangare - Développeur Full Stack & Expert SEO au Mali')</title>
    <meta name="description" content="@yield('meta_description', 'Portfolio officiel de Tiefing Sangare, développeur web Full Stack et fondateur de Masadigitale à Bamako, Mali.')">
    <meta name="keywords" content="@yield('keywords', 'développeur web Mali, full stack, SEO, Laravel, React, Bamako, Tiefing Sangare')">
    <meta name="author" content="Tiefing Sangare">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'Tiefing Sangare - Développeur Full Stack Mali')">
    <meta property="og:description" content="@yield('og_description', 'Portfolio de Tiefing Sangare, développeur web à Bamako, Mali')">
    <meta property="og:image" content="{{ asset('images/t1.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Load Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700%7CMontserrat:400,700%7CEczar:400,500,600,700,800" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/basic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blogs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/t1.jpg') }}">

    @stack('styles')
</head>

<body>

    <!-- Page -->
    <div class="page">

        <!-- Preloader -->
        <div class="preloader">
            <div class="centrize full-width">
                <div class="vertical-center">
                    <div class="spinner">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                        <div class="double-bounce1"></div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.header')

        <!-- Container -->
        <div class="container">

            @yield('content')

            <!-- Footer -->
            @include('partials.footer')

        </div>

    </div>

    <!-- jQuery Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/masonry.pkgd.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.js') }}"></script>
    <script src="{{ asset('js/masonry-filter.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.js') }}"></script>
    <script src="{{ asset('js/scrollreveal.js') }}"></script>
    <script src="{{ asset('js/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ asset('js/particles.js') }}"></script>
    <script src="{{ asset('js/typed.js') }}"></script>

    <!-- Main Scripts -->
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
