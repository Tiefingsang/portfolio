@extends('layouts.app')

@section('title', 'Mes Réalisations - Tiefing Sangare | Développeur Full Stack')
@section('meta_description', 'Découvrez les projets et réalisations de Tiefing Sangare : sites web, applications mobiles, solutions IA, e-commerce et plus encore.')

@push('styles')
<style>
    /* ═══════════════════════════════════════════════
       ANTI-CONFLIT & BASE
    ═══════════════════════════════════════════════ */
    .works-wrapper, .works-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }

    /* ═══════════════════════════════════════════════
       HERO SECTION
    ═══════════════════════════════════════════════ */
    .works-hero {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.88) 0%, rgba(15, 23, 42, 0.75) 100%), url('{{ asset('images/works_bg.jpg') }}');
        background-size: cover;
        background-position: center;
        padding: 120px 20px 80px;
        text-align: center;
        color: white;
    }
    .works-hero h1 {
        color: white !important;
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 15px;
        letter-spacing: -1px;
    }
    .works-hero p {
        color: rgba(255, 255, 255, 0.85);
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto;
    }

    /* ═══════════════════════════════════════════════
       SECTION PROJETS
    ═══════════════════════════════════════════════ */
    .works-section {
        background: #f8fafc;
        padding: 60px 20px 100px;
    }
    .works-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Filtres modernes */
    .works-filters {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 12px;
        margin-bottom: 50px;
    }
    .filter-btn {
        background: white;
        border: 1px solid #e2e8f0;
        color: #64748b;
        padding: 10px 24px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }
    .filter-btn:hover,
    .filter-btn.active {
        background: #ff6c00;
        color: white !important;
        border-color: #ff6c00;
        box-shadow: 0 10px 20px rgba(255, 108, 0, 0.2);
    }

    /* Grille de projets */
    .works-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
    }

    /* Carte Projet */
    .project-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
        border: 1px solid #f1f5f9;
        position: relative;
    }
    .project-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    .project-img {
        height: 240px;
        overflow: hidden;
        position: relative;
        display: block;
    }
    .project-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .project-card:hover .project-img img {
        transform: scale(1.08);
    }
    .project-img::after {
        content: 'Voir le projet';
        position: absolute;
        inset: 0;
        background: rgba(15, 23, 42, 0.7);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1.1rem;
        opacity: 0;
        transition: opacity 0.3s;
        backdrop-filter: blur(4px);
    }
    .project-card:hover .project-img::after {
        opacity: 1;
    }

    .project-info {
        padding: 25px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .project-category {
        font-size: 12px;
        font-weight: 700;
        color: #ff6c00;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }
    .project-title {
        font-size: 1.4rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 12px;
        line-height: 1.3;
    }
    .project-desc {
        color: #64748b;
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 20px;
        flex: 1;
    }

    /* ═══════════════════════════════════════════════
       OVERRIDE MAGNIFIC POPUP (Agrandissement & Croix Fixe)
    ═══════════════════════════════════════════════ */

    .mfp-bg {
        background: rgba(15, 23, 42, 0.9) !important;
        backdrop-filter: blur(8px);
        opacity: 1 !important;
    }

    /* Autorise la croix à sortir du cadre */
    .mfp-wrap {
        overflow: visible !important;
    }

    /* Conteneur de la popup */
    .mfp-content .popup-box {
        background: white;
        border-radius: 24px;
        overflow: visible !important;
        width: 95%;
        max-width: 1100px;
        margin: 0 auto;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        position: relative;
    }

    /* Image de la popup */
    .mfp-content .popup-box .image {
        overflow: hidden;
        border-radius: 24px 24px 0 0;
    }
    .mfp-content .popup-box .image img {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        display: block;
    }

    /* Contenu texte */
    .mfp-content .popup-box .desc {
        padding: 40px 50px;
    }

    .mfp-content .popup-box .desc h4 {
        font-size: 2.2rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .mfp-content .popup-box .desc p {
        color: #475569;
        font-size: 16px;
        line-height: 1.7;
        margin-bottom: 15px;
    }

    .mfp-content .popup-box .desc .btn {
        display: inline-block;
        background: #ff6c00;
        color: white !important;
        padding: 12px 30px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        margin-top: 20px;
        transition: all 0.3s;
    }
    .mfp-content .popup-box .desc .btn:hover {
        background: #e05a00;
        transform: translateY(-2px);
    }

    /* ═══════════════════════════════════════════════
       BOUTON FERMER (LA CROIX) - VISIBLE EN HAUT À DROITE
    ═══════════════════════════════════════════════ */

    .mfp-close {
        color: #ffffff !important;
        opacity: 1 !important;
        font-size: 28px !important;
        font-family: Arial, sans-serif !important;
        width: 44px !important;
        height: 44px !important;
        line-height: 44px !important;
        padding: 0 !important;
        top: 20px !important;       /* Fixé en haut à droite de l'écran */
        right: 20px !important;
        left: auto !important;
        bottom: auto !important;
        background: rgba(0, 0, 0, 0.6) !important;   /* Fond sombre pour bien ressortir */
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        border-radius: 50% !important;
        transition: all 0.3s ease !important;
        text-shadow: none !important;
        text-decoration: none !important;
        z-index: 99999 !important;   /* Au-dessus de tout */
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        position: fixed !important;  /* Reste visible même si on scrolle dans la popup */
    }

    .mfp-close:hover,
    .mfp-close:focus {
        background: #ff6c00 !important;
        transform: rotate(90deg);
        border-color: #ff6c00 !important;
        opacity: 1 !important;
    }

    /* Ajustement mobile */
    @media (max-width: 768px) {
        .mfp-close {
            top: 10px !important;
            right: 10px !important;
            width: 40px !important;
            height: 40px !important;
            line-height: 40px !important;
            font-size: 24px !important;
        }
        .mfp-content .popup-box .desc {
            padding: 25px;
        }
        .mfp-content .popup-box .desc h4 {
            font-size: 1.6rem;
        }
    }
</style>
@endpush

@section('content')
<div class="works-wrapper">

    <!-- ═══════════════ HERO ═══════════════ -->
    <div class="works-hero">
        <div class="fw">
            <h1>Mes Réalisations</h1>
            <p>Découvrez une sélection de mes projets récents, du site vitrine à l'application mobile complexe.</p>
        </div>
    </div>

    <!-- ═══════════════ PROJETS ═══════════════ -->
    <div class="works-section" id="works-section">
        <div class="works-container">

            <!-- Filtres -->
            <div class="works-filters">
                <button class="filter-btn active" data-filter="all">Tous</button>
                @php
                    $categories = $projects->pluck('category')->unique()->filter();
                @endphp
                @foreach($categories as $cat)
                    <button class="filter-btn" data-filter="f-{{ Str::slug($cat) }}">{{ $cat }}</button>
                @endforeach
            </div>

            <!-- Grille -->
            <div class="works-grid" id="projects-grid">
                @forelse($projects as $project)
                    <div class="project-card" data-category="f-{{ Str::slug($project->category ?? 'projet') }}">
                        <a href="#popup-{{ $project->id }}" class="has-popup project-img">
                            @if($project->image)
                                <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                            @else
                                <img src="{{ asset('images/t1.jpg') }}" alt="{{ $project->title }}">
                            @endif
                        </a>
                        <div class="project-info">
                            <div class="project-category">{{ $project->category ?? 'Projet' }}</div>
                            <a href="#popup-{{ $project->id }}" class="has-popup" style="text-decoration:none;">
                                <h3 class="project-title">{{ $project->title }}</h3>
                            </a>
                            <p class="project-desc">{{ Str::limit($project->description, 100) }}</p>
                        </div>
                    </div>

                    <!-- POPUP pour Magnific -->
                    <div id="popup-{{ $project->id }}" class="popup-box mfp-fade mfp-hide">
                        <div class="content">
                            <div class="image">
                                @if($project->image)
                                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                                @endif
                            </div>
                            <div class="desc">
                                <div class="category" style="color: #ff6c00; font-weight: 700; text-transform: uppercase; font-size: 12px; margin-bottom: 10px;">{{ $project->category ?? 'Projet' }}</div>
                                <h4>{{ $project->title }}</h4>
                                <p>{{ $project->description }}</p>
                                @if($project->technologies)
                                    <p><strong>Technologies :</strong> {{ $project->technologies }}</p>
                                @endif
                                @if($project->project_url)
                                    <a href="{{ $project->project_url }}" target="_blank" class="btn">Voir le projet en ligne</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 80px 20px; background: white; border-radius: 20px;">
                        <h3 style="color: #0f172a; margin-bottom: 10px;">Aucun projet pour le moment</h3>
                        <p style="color: #64748b;">De nouvelles réalisations arrivent bientôt.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ── GESTION DES FILTRES (Vanilla JS) ──
        const filterBtns = document.querySelectorAll('.filter-btn');
        const projectCards = document.querySelectorAll('.project-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Retirer la classe active de tous les boutons
                filterBtns.forEach(b => b.classList.remove('active'));
                // Ajouter la classe active au bouton cliqué
                btn.classList.add('active');

                const filterValue = btn.getAttribute('data-filter');

                projectCards.forEach(card => {
                    if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                        card.style.display = 'flex';
                        // Petite animation d'apparition
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                            card.style.transition = 'all 0.4s ease';
                        }, 50);
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush
