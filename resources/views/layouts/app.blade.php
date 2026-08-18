<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Basic -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- SEO optimisé pour Tiefing Sangare -->
    <title>@yield('title', 'Tiefing Sangare - Développeur Full Stack & Expert SEO au Mali | Masadigitale')</title>
    <meta name="description" content="@yield('meta_description', 'Tiefing Sangare (Masasugu) - Développeur web Full Stack et fondateur de Masadigitale à Bamako, Mali. Expert en création de sites web, applications mobiles, IA WhatsApp et SEO. Contactez un entrepreneur digital malien passionné.')">
    <meta name="keywords" content="@yield('keywords', 'Tiefing, Tiefing Sangare, Sangare, Masasugu, Masadigitale, entrepreneur malienne, développeur, développeur malienne, développeur web Mali, agence digitale Mali, création site web Bamako, full stack Mali, freelance Mali, web designer Mali, SEO Mali, application mobile Mali, IA WhatsApp Mali, entrepreneur digital Mali, Tiefing Sangare portfolio, Masadigitale Mali')">
    <meta name="author" content="Tiefing Sangare">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Robots et indexation -->
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large">
    <meta name="googlebot" content="index, follow">
    <meta name="language" content="French">
    <meta name="revisit-after" content="7 days">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', 'Tiefing Sangare - Développeur Web Full Stack & Entrepreneur au Mali')">
    <meta property="og:description" content="@yield('og_description', 'Découvrez le portfolio de Tiefing Sangare (Masasugu), développeur web full stack et fondateur de Masadigitale à Bamako, Mali. Création de sites web, applications mobiles, IA WhatsApp et solutions digitales.')">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:image:alt" content="Tiefing Sangare - Développeur Web Mali">
    <meta property="og:site_name" content="Tiefing Sangare Portfolio | Masadigitale">
    <meta property="og:locale" content="fr_FR">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Tiefing Sangare - Développeur Web Mali')">
    <meta name="twitter:description" content="@yield('meta_description', 'Portfolio de Tiefing Sangare, développeur web à Bamako, Mali')">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">
    <meta name="twitter:creator" content="@tiefingsangare">

    <!-- Schema.org Personne (Tiefing Sangare) -->
   @verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Tiefing Sangare",
    "alternateName": ["Tiefing", "Sangare", "Masasugu", "Masasugu Tiefing", "Sangare Tiefing"],
    "jobTitle": "Développeur Web Full Stack & Entrepreneur Digital",
    "description": "Développeur web passionné et entrepreneur digital basé à Bamako, Mali.",
    "image": "{{ asset('images/tiefing-profile.jpg') }}",
    "url": "{{ url('/') }}",
    "email": "tiefingsangare86@gmail.com",
    "telephone": "+22366894475"
}
</script>
@endverbatim

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">

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

    <!-- Theme Color -->
    <meta name="theme-color" content="#ff6c00">

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
