@extends('layouts.app')

@section('title', $service->meta_title ?? $service->title . ' - Tiefing Sangare')
@section('meta_description', $service->meta_description ?? Str::limit(strip_tags($service->description), 160))
@section('og_type', 'website')
@section('og_title', $service->title)
@section('og_description', Str::limit(strip_tags($service->description), 160))
@section('og_image', $service->image ? asset('storage/' . $service->image) : asset('images/og-image.jpg'))

@php
    $jsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service->title,
        'description' => Str::limit(strip_tags($service->description), 160),
        'provider' => [
            '@type' => 'Person',
            'name' => 'Tiefing Sangare',
            'url' => 'https://tiefingsangare.com',
        ],
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Mali',
        ],
        'url' => url()->current(),
    ];
@endphp

@push('head')
<script type="application/ld+json">
{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@push('styles')
<style>
    /* ═══════════════════════════════════════════════
       ANTI-CONFLIT & BASE
    ═══════════════════════════════════════════════ */
    .service-wrapper, .service-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }

    /* ═══════════════════════════════════════════════
       HERO SECTION
    ═══════════════════════════════════════════════ */
    .service-hero {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.88) 0%, rgba(15, 23, 42, 0.75) 100%), url('{{ asset('images/t1.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 120px 20px 100px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .service-hero .icon-wrapper {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        border-radius: 24px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        color: white;
        margin-bottom: 25px;
        box-shadow: 0 15px 35px rgba(255, 108, 0, 0.35);
        transform: rotate(-5deg);
        transition: transform 0.3s ease;
    }
    .service-hero .icon-wrapper:hover {
        transform: rotate(0deg) scale(1.05);
    }
    .service-hero h1 {
        color: white !important;
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: -1px;
        line-height: 1.1;
    }
    .service-hero p.subtitle {
        color: rgba(255, 255, 255, 0.85);
        font-size: 1.25rem;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ═══════════════════════════════════════════════
       CONTENU PRINCIPAL
    ═══════════════════════════════════════════════ */
    .service-content-section {
        background: #fff;
        padding: 80px 20px;
    }
    .service-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 60px;
    }
    @media (max-width: 992px) {
        .service-container { grid-template-columns: 1fr; gap: 40px; }
    }

    /* Colonne gauche : texte */
    .service-badge {
        display: inline-block;
        background: #fff7ed;
        color: #ff6c00 !important;
        font-size: 12px;
        font-weight: 700;
        padding: 6px 16px;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
    }
    .service-main-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 25px;
        line-height: 1.2;
        letter-spacing: -0.5px;
    }
    .service-text-content {
        font-size: 1.125rem;
        line-height: 1.8;
        color: #334155;
        margin-bottom: 35px;
    }
    .service-text-content p { margin-bottom: 1.5rem; }

    .service-cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #ff6c00;
        color: white !important;
        padding: 16px 35px;
        border-radius: 40px;
        font-weight: 700;
        text-decoration: none !important;
        transition: all 0.3s;
        box-shadow: 0 10px 25px rgba(255, 108, 0, 0.3);
    }
    .service-cta-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(255, 108, 0, 0.4);
    }

    /* Colonne droite : image + features + contact */
    .service-image-box img {
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        display: block;
    }

    .features-box {
        background: #f8fafc;
        border-radius: 20px;
        padding: 30px;
        border-left: 4px solid #ff6c00;
        margin-bottom: 30px;
    }
    .features-box h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0f172a !important;
        margin-bottom: 20px;
    }
    .features-box ul {
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    .features-box li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        color: #475569;
        font-size: 15px;
        line-height: 1.5;
    }
    .features-box li:last-child {
        border-bottom: none;
    }
    .features-box svg {
        width: 20px;
        height: 20px;
        color: #ff6c00;
        flex-shrink: 0;
        margin-top: 2px;
    }

    /* Carte contact */
    .contact-card {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        border-radius: 20px;
        padding: 35px 25px;
        text-align: center;
        color: white;
    }
    .contact-card h3 {
        color: white !important;
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 12px;
    }
    .contact-card p {
        color: #94a3b8;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 25px;
    }
    .contact-card .btn-group {
        display: flex;
        gap: 10px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .contact-card .btn-main {
        background: #ff6c00;
        color: white !important;
        padding: 10px 22px;
        border-radius: 30px;
        text-decoration: none !important;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s;
    }
    .contact-card .btn-main:hover { transform: scale(1.05); }
    .contact-card .btn-wa {
        background: #25D366;
        color: white !important;
        padding: 10px 22px;
        border-radius: 30px;
        text-decoration: none !important;
        font-weight: 600;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
    }
    .contact-card .btn-wa:hover { transform: scale(1.05); }

    /* ═══════════════════════════════════════════════
       SECTION AUTRES SERVICES
    ═══════════════════════════════════════════════ */
    .related-services {
        background: #f8fafc;
        padding: 80px 20px;
    }
    .related-services h2 {
        text-align: center;
        font-size: 2.2rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 50px;
    }
    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }
    .related-card {
        background: white;
        border-radius: 16px;
        padding: 35px 25px;
        text-align: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
        border-bottom: 4px solid transparent;
        display: flex;
        flex-direction: column;
    }
    .related-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(255, 108, 0, 0.15);
        border-bottom-color: #ff6c00;
    }
    .related-card .icon {
        font-size: 40px;
        margin-bottom: 20px;
    }
    .related-card h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #0f172a !important;
        margin-bottom: 12px;
    }
    .related-card p {
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 20px;
        flex: 1;
    }
    .related-card a {
        color: #ff6c00 !important;
        font-weight: 600;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        justify-content: center;
        transition: gap 0.2s;
    }
    .related-card a:hover { gap: 10px; }

    /* ═══════════════════════════════════════════════
       CTA FINAL
    ═══════════════════════════════════════════════ */
    .final-cta {
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        padding: 80px 20px;
        text-align: center;
    }
    .final-cta h2 {
        color: white !important;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
    }
    .final-cta p {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto 35px;
    }
    .final-cta a {
        background: white;
        color: #ff6c00 !important;
        padding: 16px 40px;
        border-radius: 40px;
        text-decoration: none !important;
        font-weight: 700;
        display: inline-block;
        transition: all 0.3s;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    .final-cta a:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.25);
    }
</style>
@endpush

@section('content')
<div class="service-wrapper">

    <!-- HERO -->
    <div class="service-hero">
        <div class="fw">
            @if($service->icon)
                <div class="icon-wrapper">
                    {!! $service->icon !!}
                </div>
            @endif
            <h1>{{ $service->title }}</h1>
            <p class="subtitle">{{ $service->description }}</p>
        </div>
    </div>

    <!-- CONTENU -->
    <div class="service-content-section">
        <div class="service-container">

            <!-- Colonne de gauche : Description -->
            <div>
                <div class="service-badge">Service</div>
                <h2 class="service-main-title">{{ $service->title }}</h2>

                <div class="service-text-content">
                    @if($service->full_description)
                        {!! nl2br(e($service->full_description)) !!}
                    @else
                        {{ $service->description }}
                    @endif
                </div>

                @if($service->button_link)
                    <a href="{{ $service->button_link }}" class="service-cta-btn">
                        {{ $service->button_text ?? 'En savoir plus' }}
                        <svg viewBox="0 0 24 24" style="width:18px; height:18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                @endif
            </div>

            <!-- Colonne de droite : Image, features, contact -->
            <div>
                <!-- Image -->
                @if($service->image)
                <div class="service-image-box">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                </div>
                @endif

                <!-- Features -->
                @php
                    $features = $service->features;
                    if (is_string($features)) {
                        $features = json_decode($features, true);
                    }
                    if (!is_array($features)) {
                        $features = [];
                    }
                @endphp

                @if(!empty($features) && count($features) > 0)
                <div class="features-box">
                    <h3>✨ Ce qui est inclus</h3>
                    <ul>
                        @foreach($features as $feature)
                        <li>
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Contact Card -->
                <div class="contact-card">
                    <h3>💬 Discutons de votre projet</h3>
                    <p>Vous avez besoin de plus d'informations ou d'un devis ?</p>
                    <div class="btn-group">
                        <a href="{{ route('contact') }}" class="btn-main">Me contacter</a>
                        <a href="https://wa.me/22366894475?text=Bonjour%20Tiefing%2C%20je%20suis%20int%C3%A9ress%C3%A9%20par%20le%20service%20{{ urlencode($service->title) }}"
                           target="_blank" class="btn-wa">
                            <svg viewBox="0 0 24 24" style="width:16px; height:16px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;">
                                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                            </svg>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AUTRES SERVICES -->
    @if($relatedServices->count() > 0)
    <div class="related-services">
        <div class="fw">
            <h2>Découvrez aussi</h2>
            <div class="related-grid">
                @foreach($relatedServices as $related)
                <div class="related-card">
                    @if($related->icon)
                        <div class="icon">{!! $related->icon !!}</div>
                    @endif
                    <h3>{{ $related->title }}</h3>
                    <p>{{ Str::limit($related->description, 90) }}</p>
                    <a href="{{ route('services.show', $related->slug) }}">
                        En savoir plus
                        <svg viewBox="0 0 24 24" style="width:16px; height:16px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- CTA FINAL -->
    <div class="final-cta">
        <div class="fw">
            <h2>Prêt à démarrer ?</h2>
            <p>Discutons de vos idées et je vous propose une solution sur mesure.</p>
            <a href="{{ route('contact') }}">Démarrer un projet</a>
        </div>
    </div>

</div>
@endsection
