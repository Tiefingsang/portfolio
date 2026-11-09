@extends('layouts.app')

@section('title', $project->title . ' - Étude de cas | Tiefing Sangare')
@section('meta_description', Str::limit(strip_tags($project->description), 160))
@section('og_type', 'article')
@section('og_title', $project->title)
@section('og_description', Str::limit(strip_tags($project->description), 160))
@section('og_image', $project->image_url)

@php
    $jsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'CreativeWork',
        'name' => $project->title,
        'description' => Str::limit(strip_tags($project->description), 160),
        'image' => $project->image_url,
        'author' => [
            '@type' => 'Person',
            'name' => 'Tiefing Sangare',
            'url' => 'https://tiefingsangare.com',
        ],
        'dateCreated' => $project->created_at->toIso8601String(),
    ];
@endphp

@push('head')
<script type="application/ld+json">
{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@push('styles')
<style>
    .cs-wrapper, .cs-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }

    /* HERO */
    .cs-hero {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.88) 0%, rgba(15, 23, 42, 0.75) 100%), url('{{ $project->image_url }}');
        background-size: cover;
        background-position: center;
        padding: 140px 20px 80px;
        text-align: center;
        color: white;
    }
    .cs-badge {
        display: inline-block;
        background: rgba(255, 108, 0, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 108, 0, 0.4);
        color: #ff6c00;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 25px;
    }
    .cs-hero h1 {
        color: white !important;
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: -1px;
        line-height: 1.1;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }
    .cs-hero p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.25rem;
        max-width: 700px;
        margin: 0 auto;
    }

    /* MÉTA CLIENT */
    .cs-client-bar {
        background: white;
        padding: 30px 20px;
        border-bottom: 1px solid #e2e8f0;
    }
    .cs-client-grid {
        max-width: 900px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        text-align: center;
    }
    .cs-client-grid .label {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #64748b;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }
    .cs-client-grid .label svg {
        width: 14px;
        height: 14px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .cs-client-grid .value {
        font-size: 1rem;
        font-weight: 600;
        color: #0f172a;
    }

    /* CONTENU */
    .cs-content {
        background: #f8fafc;
        padding: 80px 20px;
    }
    .cs-container { max-width: 900px; margin: 0 auto; }

    .cs-section {
        background: white;
        border-radius: 24px;
        padding: 50px;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.05);
        border: 1px solid #f1f5f9;
    }
    @media (max-width: 768px) {
        .cs-section { padding: 30px; }
    }

    .cs-section-num {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        border-radius: 14px;
        margin-bottom: 20px;
        box-shadow: 0 8px 20px rgba(255, 108, 0, 0.3);
    }
    .cs-section-num svg {
        width: 24px;
        height: 24px;
        stroke: white;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .cs-section h2 {
        font-size: 2rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 20px;
        letter-spacing: -0.5px;
    }
    .cs-section p {
        color: #475569;
        font-size: 1.05rem;
        line-height: 1.8;
        margin-bottom: 15px;
    }

    /* MÉTRIQUES */
    .cs-metrics {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }
    .cs-metric {
        background: linear-gradient(135deg, #f8fafc, #fff);
        border: 2px solid #ffedd5;
        border-radius: 16px;
        padding: 25px;
        text-align: center;
        transition: all 0.3s;
    }
    .cs-metric:hover {
        transform: translateY(-4px);
        border-color: #ff6c00;
        box-shadow: 0 15px 30px rgba(255, 108, 0, 0.15);
    }
    .cs-metric-icon {
        width: 40px;
        height: 40px;
        background: #fff7ed;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
    }
    .cs-metric-icon svg {
        width: 20px;
        height: 20px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .cs-metric-value {
        font-size: 2.5rem;
        font-weight: 800;
        color: #ff6c00 !important;
        line-height: 1;
        margin-bottom: 8px;
        letter-spacing: -1px;
    }
    .cs-metric-label {
        font-size: 13px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* TÉMOIGNAGE */
    .cs-testimonial {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        border-radius: 24px;
        padding: 50px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .cs-testimonial-quote-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background: rgba(255,108,0,0.15);
        border: 1px solid rgba(255,108,0,0.3);
        border-radius: 16px;
        margin-bottom: 30px;
    }
    .cs-testimonial-quote-icon svg {
        width: 30px;
        height: 30px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .cs-testimonial p {
        color: white !important;
        font-size: 1.4rem;
        font-style: italic;
        line-height: 1.7;
        margin-bottom: 30px;
        font-weight: 500;
    }
    .cs-testimonial-author {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #ff6c00 !important;
        font-weight: 700;
        font-size: 1rem;
    }
    .cs-testimonial-author svg {
        width: 18px;
        height: 18px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
    }

    /* TECHNOLOGIES */
    .cs-tech {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 25px;
    }
    .cs-tech-tag {
        background: #f1f5f9;
        color: #475569;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        border: 1px solid #e2e8f0;
    }

    /* CTA */
    .cs-cta {
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        border-radius: 24px;
        padding: 60px 40px;
        text-align: center;
        color: white;
        margin-bottom: 30px;
    }
    .cs-cta h2 {
        color: white !important;
        font-size: 2.2rem;
        font-weight: 800;
        margin-bottom: 15px;
    }
    .cs-cta p {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1.15rem;
        max-width: 500px;
        margin: 0 auto 30px;
    }
    .cs-cta a {
        background: white;
        color: #ff6c00 !important;
        padding: 16px 40px;
        border-radius: 40px;
        text-decoration: none !important;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }
    .cs-cta a:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.3);
    }
    .cs-cta a svg {
        width: 18px;
        height: 18px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* RETOUR */
    .cs-back {
        text-align: center;
        padding: 30px 0;
    }
    .cs-back a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #64748b !important;
        text-decoration: none !important;
        font-weight: 600;
    }
    .cs-back a:hover { color: #ff6c00 !important; }
    .cs-back a svg {
        width: 16px;
        height: 16px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
</style>
@endpush

@section('content')
<div class="cs-wrapper">

    <!-- HERO -->
    <header class="cs-hero">
        <span class="cs-badge">{{ $project->category ?? 'Projet' }}</span>
        <h1>{{ $project->title }}</h1>
        <p>{{ Str::limit(strip_tags($project->description), 200) }}</p>
    </header>

    <!-- MÉTA CLIENT -->
    <div class="cs-client-bar">
        <div class="cs-client-grid">
            @if($project->client_name)
            <div>
                <div class="label">
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    Client
                </div>
                <div class="value">{{ $project->client_name }}</div>
            </div>
            @endif
            @if($project->client_industry)
            <div>
                <div class="label">
                    <svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                    Secteur
                </div>
                <div class="value">{{ $project->client_industry }}</div>
            </div>
            @endif
            <div>
                <div class="label">
                    <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    Livré le
                </div>
                <div class="value">{{ $project->created_at->translatedFormat('d F Y') }}</div>
            </div>
            @if($project->project_url)
            <div>
                <div class="label">
                    <svg viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                    Lien
                </div>
                <div class="value">
                    <a href="{{ $project->project_url }}" target="_blank" style="color: #ff6c00; text-decoration: none;">
                        Voir le projet →
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- CONTENU -->
    <div class="cs-content">
        <div class="cs-container">

            <!-- PROBLÈME -->
            @if($project->problem)
            <div class="cs-section">
                <div class="cs-section-num">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                </div>
                <h2>Le défi du client</h2>
                <p>{!! nl2br(e($project->problem)) !!}</p>
            </div>
            @endif

            <!-- PROCESSUS -->
            @if($project->process)
            <div class="cs-section">
                <div class="cs-section-num">
                    <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                </div>
                <h2>Mon approche</h2>
                <p>{!! nl2br(e($project->process)) !!}</p>

                @if($project->technologies)
                <div class="cs-tech">
                    @foreach(explode(',', $project->technologies) as $tech)
                    <span class="cs-tech-tag">{{ trim($tech) }}</span>
                    @endforeach
                </div>
                @endif
            </div>
            @endif

            <!-- SOLUTION -->
            @if($project->solution)
            <div class="cs-section">
                <div class="cs-section-num">
                    <svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"></path><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                </div>
                <h2>La solution livrée</h2>
                <p>{!! nl2br(e($project->solution)) !!}</p>

                @if($project->case_study_image)
                <img src="{{ Storage::url($project->case_study_image) }}"
                     alt="{{ $project->title }}"
                     style="width: 100%; border-radius: 16px; margin-top: 30px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                @endif
            </div>
            @endif

            <!-- RÉSULTATS -->
            @if($project->results || ($project->metrics && count($project->metrics) > 0))
            <div class="cs-section">
                <div class="cs-section-num">
                    <svg viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                </div>
                <h2>Les résultats</h2>
                @if($project->results)
                <p>{!! nl2br(e($project->results)) !!}</p>
                @endif

                @if($project->metrics && is_array($project->metrics) && count($project->metrics) > 0)
                <div class="cs-metrics">
                    @foreach($project->metrics as $metric)
                    <div class="cs-metric">
                        <div class="cs-metric-icon">
                            <svg viewBox="0 0 24 24"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                        </div>
                        <div class="cs-metric-value">{{ $metric['value'] ?? '' }}</div>
                        <div class="cs-metric-label">{{ $metric['label'] ?? '' }}</div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endif

            <!-- TÉMOIGNAGE -->
            @if($project->testimonial)
            <div class="cs-testimonial">
                <div class="cs-testimonial-quote-icon">
                    <svg viewBox="0 0 24 24"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path></svg>
                </div>
                <p>{{ $project->testimonial }}</p>
                <div class="cs-testimonial-author">
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    {{ $project->testimonial_author ?? 'Client satisfait' }}
                </div>
            </div>
            @endif

            <!-- CTA -->
            <div class="cs-cta">
                <h2>Un projet similaire en tête ?</h2>
                <p>Discutons de votre besoin et voyons comment je peux vous aider à atteindre les mêmes résultats.</p>
                <a href="{{ route('contact') }}">
                    <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    Démarrer un projet
                </a>
            </div>

            <!-- RETOUR -->
            <div class="cs-back">
                <a href="{{ route('projects') }}">
                    <svg viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    Voir toutes mes réalisations
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
