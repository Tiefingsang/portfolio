@extends('layouts.app')

@section('title', 'Tiefing Sangare | Développeur Full Stack & Expert SEO au Mali')
@section('meta_description', 'Portfolio officiel de Tiefing Sangare, développeur web Full Stack et fondateur de Masadigitale à Bamako, Mali. Création de sites web, applications, solutions IA et référencement SEO.')

@section('content')

<!-- HERO SECTION -->
<section class="relative min-h-screen flex items-center overflow-hidden bg-black text-white">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 overflow-hidden">

        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-orange-500/20 rounded-full blur-3xl animate-pulse"></div>

        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-blue-500/20 rounded-full blur-3xl animate-pulse"></div>

        <div class="absolute inset-0 bg-[url('/images/grid.svg')] opacity-10"></div>

    </div>

    <div class="container mx-auto px-6 relative z-10">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- LEFT -->
            <div data-aos="fade-right">

                <!-- Badge -->
                <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full border border-orange-500/30 bg-orange-500/10 mb-8 backdrop-blur">

                    <span class="w-3 h-3 bg-green-400 rounded-full animate-ping"></span>

                    <span class="text-orange-300 text-sm font-medium">
                        Disponible pour projets & collaborations
                    </span>

                </div>

                <!-- TITLE -->
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6">

                    Tiefing
                    <span class="text-orange-500">
                        Sangare
                    </span>

                </h1>

                <!-- SUBTITLE -->
                <h2 class="text-2xl md:text-3xl font-semibold text-gray-300 mb-6 leading-relaxed">

                    Développeur Full Stack,
                    Expert SEO &
                    Fondateur de
                    <span class="text-orange-500">
                        Masadigitale
                    </span>

                </h2>

                <!-- DESCRIPTION -->
                <p class="text-lg text-gray-400 leading-relaxed max-w-2xl mb-10">

                    Je développe des solutions digitales modernes,
                    rapides et intelligentes pour entreprises,
                    startups et organisations.

                    Mon objectif est d’aider les entreprises à améliorer
                    leur présence digitale grâce à des plateformes performantes,
                    un référencement SEO avancé et des solutions technologiques innovantes.

                </p>

                <!-- BUTTONS -->
                <div class="flex flex-wrap gap-4 mb-12">

                    <a href="{{ route('projects') }}"
                       class="px-8 py-4 rounded-xl bg-orange-500 hover:bg-orange-600 transition-all duration-300 font-semibold shadow-lg shadow-orange-500/30 hover:scale-105">

                        Voir mes réalisations

                    </a>

                    <a href="{{ route('contact') }}"
                       class="px-8 py-4 rounded-xl border border-gray-700 hover:border-orange-500 hover:bg-orange-500/10 transition-all duration-300 font-semibold">

                        Me contacter

                    </a>

                </div>

                <!-- STATS -->
                <div class="grid grid-cols-3 gap-8 max-w-xl">

                    <div class="group">

                        <div class="text-4xl font-bold text-orange-500 mb-2 group-hover:scale-110 transition">
                            {{ $stats['projects_count'] }}+
                        </div>

                        <div class="text-gray-400">
                            Projets réalisés
                        </div>

                    </div>

                    <div class="group">

                        <div class="text-4xl font-bold text-orange-500 mb-2 group-hover:scale-110 transition">
                            {{ $stats['clients_count'] }}+
                        </div>

                        <div class="text-gray-400">
                            Clients satisfaits
                        </div>

                    </div>

                    <div class="group">

                        <div class="text-4xl font-bold text-orange-500 mb-2 group-hover:scale-110 transition">
                            100%
                        </div>

                        <div class="text-gray-400">
                            SEO optimisé
                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="relative flex justify-center" data-aos="fade-left">

                <!-- Floating tech badges -->
                <div class="absolute -top-8 left-0 px-4 py-2 rounded-xl bg-gray-900 border border-gray-800 shadow-lg animate-bounce">
                    Laravel
                </div>

                <div class="absolute top-1/3 -right-8 px-4 py-2 rounded-xl bg-gray-900 border border-gray-800 shadow-lg animate-pulse">
                    SEO
                </div>

                <div class="absolute bottom-0 left-10 px-4 py-2 rounded-xl bg-gray-900 border border-gray-800 shadow-lg animate-bounce">
                    IA
                </div>

                <!-- IMAGE -->
                <div class="relative">

                    <div class="absolute inset-0 bg-orange-500/20 blur-3xl rounded-full"></div>

                    <img
                        src="{{ asset('images/tiefing.png') }}"
                        alt="Tiefing Sangare"
                        class="relative w-[420px] rounded-3xl border border-gray-800 shadow-2xl hover:scale-105 transition duration-500"
                    >

                </div>

            </div>

        </div>

    </div>

</section>

<!-- SERVICES -->
<section class="py-24 bg-gray-950 text-white">

    <div class="container mx-auto px-6">

        <div class="text-center mb-20" data-aos="fade-up">

            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Mes Services
            </h2>

            <p class="text-gray-400 max-w-3xl mx-auto text-lg">
                Des solutions digitales modernes conçues pour accélérer
                la croissance des entreprises et améliorer leur présence digitale.
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($services as $service)

            <div
                class="group relative bg-black border border-gray-800 rounded-3xl p-8 hover:border-orange-500 transition duration-500 overflow-hidden"
                data-aos="zoom-in"
            >

                <!-- Glow -->
                <div class="absolute inset-0 bg-orange-500/0 group-hover:bg-orange-500/5 transition"></div>

                <div class="relative z-10">

                    <div class="text-5xl mb-6">
                        {{ $service->icon }}
                    </div>

                    <h3 class="text-2xl font-bold mb-4 group-hover:text-orange-500 transition">
                        {{ $service->title }}
                    </h3>

                    <p class="text-gray-400 leading-relaxed">
                        {{ $service->description }}
                    </p>

                    <div class="mt-6">

                        <a href="{{ route('services') }}"
                           class="inline-flex items-center gap-2 text-orange-500 font-semibold hover:gap-4 transition-all">

                            Découvrir

                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M17 8l4 4m0 0l-4 4m4-4H3"></path>

                            </svg>

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

<!-- WHY CHOOSE ME -->
<section class="py-24 bg-black text-white">

    <div class="container mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- LEFT -->
            <div data-aos="fade-right">

                <h2 class="text-4xl md:text-5xl font-bold mb-8 leading-tight">

                    Pourquoi travailler
                    avec moi ?

                </h2>

                <p class="text-gray-400 text-lg leading-relaxed mb-8">

                    Je combine expertise technique,
                    stratégie digitale et optimisation SEO
                    afin de créer des plateformes performantes
                    capables de générer de vrais résultats.

                </p>

                <div class="space-y-6">

                    <div class="flex gap-4">

                        <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-500 text-xl">
                            ⚡
                        </div>

                        <div>
                            <h3 class="font-bold text-xl mb-2">
                                Performance & Rapidité
                            </h3>

                            <p class="text-gray-400">
                                Des plateformes rapides, optimisées et modernes.
                            </p>
                        </div>

                    </div>

                    <div class="flex gap-4">

                        <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-500 text-xl">
                            🚀
                        </div>

                        <div>
                            <h3 class="font-bold text-xl mb-2">
                                Référencement SEO
                            </h3>

                            <p class="text-gray-400">
                                Des solutions conçues pour être visibles sur Google.
                            </p>
                        </div>

                    </div>

                    <div class="flex gap-4">

                        <div class="w-12 h-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-500 text-xl">
                            🤖
                        </div>

                        <div>
                            <h3 class="font-bold text-xl mb-2">
                                Solutions Innovantes
                            </h3>

                            <p class="text-gray-400">
                                IA, automatisation et technologies modernes.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="relative" data-aos="fade-left">

                <div class="bg-gray-950 border border-gray-800 rounded-3xl p-10 shadow-2xl">

                    <div class="space-y-8">

                        <div>
                            <div class="flex justify-between mb-2">
                                <span>Laravel</span>
                                <span>95%</span>
                            </div>

                            <div class="w-full h-3 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-orange-500 rounded-full w-[95%]"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-2">
                                <span>SEO</span>
                                <span>90%</span>
                            </div>

                            <div class="w-full h-3 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-orange-500 rounded-full w-[90%]"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-2">
                                <span>UI/UX</span>
                                <span>85%</span>
                            </div>

                            <div class="w-full h-3 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-orange-500 rounded-full w-[85%]"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-2">
                                <span>IA & Automatisation</span>
                                <span>88%</span>
                            </div>

                            <div class="w-full h-3 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-orange-500 rounded-full w-[88%]"></div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- FINAL CTA -->
<section class="relative py-28 overflow-hidden bg-gradient-to-r from-orange-500 to-orange-600 text-white">

    <div class="absolute inset-0 bg-black/20"></div>

    <div class="container mx-auto px-6 relative z-10 text-center">

        <h2 class="text-4xl md:text-6xl font-extrabold mb-6">

            Donnons vie à votre projet digital

        </h2>

        <p class="text-xl text-white/90 max-w-3xl mx-auto mb-10 leading-relaxed">

            Besoin d’un site web moderne,
            d’une application ou d’une solution digitale performante ?
            Discutons ensemble de votre projet.

        </p>

        <div class="flex flex-wrap justify-center gap-5">

            <a href="{{ route('contact') }}"
               class="px-10 py-5 rounded-2xl bg-black hover:bg-gray-900 transition font-bold text-lg shadow-2xl">

                Commencer un projet

            </a>

            <a href="https://wa.me/223XXXXXXXX"
               target="_blank"
               class="px-10 py-5 rounded-2xl border border-white/30 hover:bg-white/10 transition font-bold text-lg">

                WhatsApp

            </a>

        </div>

    </div>

</section>

@endsection
