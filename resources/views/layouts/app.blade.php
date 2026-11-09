<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />

    {{-- ═══════════════════════════════════════════════
         SEO PRINCIPAL
    ═══════════════════════════════════════════════ --}}
    <title>@yield('title', 'Tiefing Sangare — Code Your Life | Développeur Full Stack & Expert SEO au Mali')</title>
    <meta name="description" content="@yield('meta_description', 'Tiefing Sangare, développeur web Full Stack et fondateur de Masasugu, Masadigitale et Reversible à Bamako, Mali. Expert en création de sites web, applications mobiles, IA WhatsApp et SEO.')">
    <meta name="keywords" content="@yield('keywords', 'Tiefing, Tiefing Sangare, Masasugu, Masadigitale, Reversible, Code Your Life, développeur web Mali, création site web Bamako, full stack Mali, freelance Mali, SEO Mali, application mobile Mali, IA WhatsApp Mali, entrepreneur digital Mali, marketplace Mali')">
    <meta name="author" content="Tiefing Sangare">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Robots --}}
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    <meta name="bingbot" content="index, follow">

    {{-- Language --}}
    <meta http-equiv="content-language" content="fr">
    <meta name="language" content="French">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Alternate --}}
    <link rel="alternate" hreflang="fr" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">

    {{-- ═══════════════════════════════════════════════
         OPEN GRAPH (Facebook, LinkedIn, WhatsApp)
    ═══════════════════════════════════════════════ --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', View::yieldContent('title', 'Tiefing Sangare — Code Your Life | Développeur Full Stack au Mali'))">
    <meta property="og:description" content="@yield('og_description', View::yieldContent('meta_description', 'Portfolio de Tiefing Sangare, développeur web Full Stack, fondateur de Masasugu, Masadigitale et Reversible à Bamako, Mali.'))">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Tiefing Sangare — Développeur Web Full Stack au Mali">
    <meta property="og:site_name" content="Tiefing Sangare — Code Your Life">
    <meta property="og:locale" content="fr_FR">

    {{-- ═══════════════════════════════════════════════
         TWITTER CARD
    ═══════════════════════════════════════════════ --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@tiefingsangare">
    <meta name="twitter:creator" content="@tiefingsangare">
    <meta name="twitter:title" content="@yield('og_title', View::yieldContent('title', 'Tiefing Sangare — Code Your Life'))">
    <meta name="twitter:description" content="@yield('og_description', View::yieldContent('meta_description', 'Développeur Full Stack et fondateur de Masasugu, Masadigitale et Reversible.'))">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-image.jpg'))">

    {{-- ═══════════════════════════════════════════════
         VIEWPORT
    ═══════════════════════════════════════════════ --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">

    {{-- ═══════════════════════════════════════════════
         PERFORMANCE (preload / preconnect)
    ═══════════════════════════════════════════════ --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

    {{-- Fonts --}}
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
         SCHEMA.ORG — PERSON (Tiefing Sangare)
    ═══════════════════════════════════════════════ --}}
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Tiefing Sangare",
        "alternateName": ["Tiefing", "Sangare", "Masasugu", "Code Your Life"],
        "jobTitle": "Développeur Web Full Stack & Entrepreneur Digital",
        "description": "Développeur web Full Stack et entrepreneur digital basé à Bamako, Mali. Fondateur de Masasugu, Masadigitale et Reversible.",
        "image": "https://tiefingsangare.com/images/tiefing-profile.jpg",
        "url": "https://tiefingsangare.com",
        "email": "tiefingsangare86@gmail.com",
        "telephone": "+22366894475",
        "worksFor": [
            {
                "@type": "Organization",
                "name": "Masadigitale",
                "url": "https://tiefingsangare.com/masadigitale"
            },
            {
                "@type": "Organization",
                "name": "Masasugu",
                "url": "https://tiefingsangare.com/masasugu"
            },
            {
                "@type": "Organization",
                "name": "Reversible",
                "url": "https://tiefingsangare.com/reversible"
            }
        ],
        "founder": [
            { "@type": "Organization", "name": "Masasugu" },
            { "@type": "Organization", "name": "Masadigitale" },
            { "@type": "Organization", "name": "Reversible" }
        ],
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Bamako",
            "addressCountry": "ML"
        },
        "knowsAbout": [
            "Laravel", "PHP", "React", "Next.js", "MySQL", "Node.js",
            "Développement Web", "Développement Mobile", "E-commerce",
            "SEO", "Intelligence Artificielle", "Chatbots WhatsApp",
            "UI/UX Design", "Hébergement Web", "Marketing Digital"
        ],
        "sameAs": [
            "https://github.com/tiefingsang",
            "https://www.linkedin.com/in/tiefing-sangare",
            "https://x.com/TiefingSang",
            "https://www.facebook.com/profile.php?id=61590223301110",
            "https://www.instagram.com/tiefing_sangare_ts",
            "https://www.youtube.com/@Tiefingsangare-y4u"
        ]
    }
    </script>
    @endverbatim

    {{-- ═══════════════════════════════════════════════
         SCHEMA.ORG — ORGANISATIONS (3 entités)
    ═══════════════════════════════════════════════ --}}
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Organization",
                "name": "Masasugu",
                "alternateName": "Masasugu Marketplace",
                "url": "https://tiefingsangare.com/masasugu",
                "description": "Masasugu est une plateforme e-commerce et une marketplace qui facilite l'achat, la vente et la distribution de produits et services au Mali et en Afrique.",
                "founder": {
                    "@type": "Person",
                    "name": "Tiefing Sangare",
                    "url": "https://tiefingsangare.com/a-propos"
                },
                "foundingLocation": {
                    "@type": "Place",
                    "name": "Bamako, Mali"
                },
                "areaServed": {
                    "@type": "Country",
                    "name": "Mali"
                },
                "knowsAbout": ["E-commerce", "Marketplace", "B2B", "B2C", "Commerce en ligne"]
            },
            {
                "@type": "Organization",
                "name": "Masadigitale",
                "url": "https://tiefingsangare.com/masadigitale",
                "description": "Masadigitale est une agence digitale basée à Bamako, Mali, spécialisée en développement web, applications mobiles et SEO.",
                "founder": {
                    "@type": "Person",
                    "name": "Tiefing Sangare",
                    "url": "https://tiefingsangare.com/a-propos"
                },
                "foundingLocation": {
                    "@type": "Place",
                    "name": "Bamako, Mali"
                },
                "areaServed": {
                    "@type": "Country",
                    "name": "Mali"
                },
                "knowsAbout": ["Développement Web", "Applications Mobiles", "SEO", "Design", "Marketing Digital"]
            },
            {
                "@type": "Organization",
                "name": "Reversible",
                "url": "https://tiefingsangare.com/reversible",
                "description": "Reversible est un projet digital fondé par Tiefing Sangare à Bamako, Mali.",
                "founder": {
                    "@type": "Person",
                    "name": "Tiefing Sangare",
                    "url": "https://tiefingsangare.com/a-propos"
                },
                "foundingLocation": {
                    "@type": "Place",
                    "name": "Bamako, Mali"
                },
                "areaServed": {
                    "@type": "Country",
                    "name": "Mali"
                }
            }
        ]
    }
    </script>
    @endverbatim

    {{-- ═══════════════════════════════════════════════
         SCHEMA.ORG — WEBSITE + SEARCH ACTION
    ═══════════════════════════════════════════════ --}}
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Tiefing Sangare — Code Your Life",
        "url": "https://tiefingsangare.com",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://tiefingsangare.com/blog?q={search_term_string}",
            "query-input": "required name=search_term_string"
        },
        "publisher": {
            "@type": "Person",
            "name": "Tiefing Sangare"
        }
    }
    </script>
    @endverbatim

    {{-- ═══════════════════════════════════════════════
         EXTENSIONS PAR PAGE
    ═══════════════════════════════════════════════ --}}
    @stack('head')
    @stack('styles')

</head>

<body>

    <div class="page">

        {{-- Preloader --}}
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

    {{-- Scripts (ordre critique : jQuery en premier) --}}
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
