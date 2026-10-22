<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />

    {{-- SEO --}}
    <title>@yield('title', 'Tiefing Sangare - Développeur Full Stack & Expert SEO au Mali | Masadigitale')</title>
    <meta name="description" content="@yield('meta_description', 'Tiefing Sangare (Masasugu) - Développeur web Full Stack et fondateur de Masadigitale à Bamako, Mali. Expert en création de sites web, applications mobiles, IA WhatsApp et SEO.')">
    <meta name="keywords" content="@yield('keywords', 'Tiefing, Tiefing Sangare, Masasugu, Masadigitale, développeur web Mali, création site web Bamako, full stack Mali, freelance Mali, SEO Mali, application mobile Mali, IA WhatsApp Mali, entrepreneur digital Mali')">
    <meta name="author" content="Tiefing Sangare">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Robots --}}
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large">
    <meta name="googlebot" content="index, follow">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', View::yieldContent('title', 'Tiefing Sangare - Développeur Web Full Stack & Entrepreneur au Mali'))">
    <meta property="og:description" content="@yield('og_description', View::yieldContent('meta_description', 'Découvrez le portfolio de Tiefing Sangare (Masasugu), développeur web full stack et fondateur de Masadigitale à Bamako, Mali.'))">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Tiefing Sangare - Développeur Web Mali">
    <meta property="og:site_name" content="Tiefing Sangare Portfolio | Masadigitale">
    <meta property="og:locale" content="fr_FR">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@tiefingsangare">
    <meta name="twitter:creator" content="@tiefingsangare">
    <meta name="twitter:title" content="@yield('og_title', View::yieldContent('title', 'Tiefing Sangare - Développeur Web Mali'))">
    <meta name="twitter:description" content="@yield('og_description', View::yieldContent('meta_description', 'Portfolio de Tiefing Sangare, développeur web à Bamako, Mali'))">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-image.jpg'))">

    {{-- Viewport --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700%7CMontserrat:400,700%7CEczar:400,500,600,700,800&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/basic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blogs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/t1.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/t1.jpg') }}">
    <meta name="theme-color" content="#ff6c00">

    {{-- ═══════════════════════════════════════════════
         SCHEMA.ORG — encadré par @verbatim (sinon Blade
         interprète les @context et @type comme des directives)
    ═══════════════════════════════════════════════ --}}
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Tiefing Sangare",
        "alternateName": ["Tiefing", "Sangare", "Masasugu"],
        "jobTitle": "Développeur Web Full Stack & Entrepreneur Digital",
        "description": "Développeur web passionné et entrepreneur digital basé à Bamako, Mali.",
        "image": "https://tiefingsangare.com/images/tiefing-profile.jpg",
        "url": "https://tiefingsangare.com",
        "email": "tiefingsangare86@gmail.com",
        "telephone": "+22366894475",
        "worksFor": {
            "@type": "Organization",
            "name": "Masadigitale"
        },
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Bamako",
            "addressCountry": "ML"
        },
        "sameAs": [
            "https://github.com/tiefingsang",
            "https://www.linkedin.com/in/tiefing-sangare",
            "https://x.com/TiefingSang",
            "https://www.facebook.com/profile.php?id=61590223301110"
        ]
    }
    </script>
    @endverbatim

    {{-- Extensions par page --}}
    @stack('head')
    @stack('styles')

</head>

<body>

    <div class="page">

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

        <div class="container">
            @yield('content')
            @include('partials.footer')
        </div>

    </div>

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
    <script src="{{ asset('js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
