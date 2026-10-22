@extends('layouts.app')

@section('title', 'Tiefing Sangare | Développeur Full Stack & Expert SEO au Mali')
@section('meta_description', 'Portfolio officiel de Tiefing Sangare, développeur web Full Stack et fondateur de Masadigitale à Bamako, Mali. Création de sites web, applications, solutions IA et référencement SEO.')

@push('styles')
<style>
    /* ═══════════════════════════════════════════════
       ANTI-CONFLIT & BASE
    ═══════════════════════════════════════════════ */
    .home-wrapper, .home-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }

    /* ═══════════════════════════════════════════════
       HERO SECTION
    ═══════════════════════════════════════════════ */
    .hero-section {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.88) 0%, rgba(15, 23, 42, 0.75) 100%), url('{{ asset('images/t1.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
        padding: 100px 20px;
    }
    .hero-content {
        max-width: 800px;
        z-index: 2;
    }
    .hero-content .typed-container {
        font-size: 2rem;
        font-weight: 600;
        color: #ff6c00;
        margin-bottom: 20px;
        min-height: 60px;
        letter-spacing: 1px;
    }
    .hero-content .typed-title {
        border-right: 3px solid #ff6c00;
        padding-right: 5px;
    }
    .hero-content h1 {
        color: white !important;
        font-size: 4.5rem;
        font-weight: 800;
        line-height: 1.1;
        letter-spacing: -2px;
        margin-bottom: 30px;
    }
    .hero-content h1 span {
        color: #ff6c00;
    }
    .hero-content p {
        color: rgba(255, 255, 255, 0.85);
        font-size: 1.25rem;
        line-height: 1.6;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    .hero-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .btn-primary {
        background: #ff6c00;
        color: white !important;
        padding: 16px 35px;
        border-radius: 40px;
        font-weight: 700;
        text-decoration: none !important;
        transition: all 0.3s;
        box-shadow: 0 10px 25px rgba(255, 108, 0, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }
    .btn-primary:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px rgba(255, 108, 0, 0.4);
    }
    .btn-outline {
        background: transparent;
        color: white !important;
        border: 2px solid rgba(255, 255, 255, 0.3);
        padding: 16px 35px;
        border-radius: 40px;
        font-weight: 700;
        text-decoration: none !important;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }
    .btn-outline:hover {
        background: white;
        color: #0f172a !important;
        border-color: white;
        transform: translateY(-4px);
    }

    /* ═══════════════════════════════════════════════
       SECTION À PROPOS
    ═══════════════════════════════════════════════ */
    .about-section {
        background: #fff;
        padding: 100px 20px;
    }
    .about-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 60px;
        align-items: center;
    }
    @media (max-width: 992px) {
        .about-container { grid-template-columns: 1fr; gap: 40px; }
        .hero-content h1 { font-size: 3rem; }
    }

    .about-avatar {
        position: relative;
        text-align: center;
    }
    .about-avatar img {
        width: 100%;
        max-width: 450px;
        border-radius: 30px;
        box-shadow: 0 30px 60px rgba(15, 23, 42, 0.15);
        display: block;
        margin: 0 auto;
    }
    .about-avatar .badge-icon {
        position: absolute;
        bottom: 30px;
        right: 30px;
        width: 80px;
        height: 80px;
        background: #ff6c00;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 36px;
        box-shadow: 0 15px 30px rgba(255, 108, 0, 0.4);
        transform: rotate(10deg);
        transition: transform 0.3s;
    }
    .about-avatar .badge-icon:hover { transform: rotate(0deg) scale(1.1); }

    .about-text .subtitle {
        display: inline-block;
        background: #fff7ed;
        color: #ff6c00 !important;
        font-size: 12px;
        font-weight: 700;
        padding: 8px 20px;
        border-radius: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
    }
    .about-text h2 {
        font-size: 3rem;
        font-weight: 800;
        color: #0f172a !important;
        line-height: 1.2;
        margin-bottom: 25px;
        letter-spacing: -1px;
    }
    .about-text h2 span { color: #ff6c00; }
    .about-text p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #475569;
        margin-bottom: 20px;
    }
    .about-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 35px;
    }

    /* ═══════════════════════════════════════════════
       SECTION SERVICES
    ═══════════════════════════════════════════════ */
    .services-section {
        background: #f8fafc;
        padding: 100px 20px;
    }
    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }
    .section-header h2 {
        font-size: 2.8rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 15px;
        letter-spacing: -1px;
    }
    .section-header p {
        color: #64748b;
        font-size: 1.15rem;
        max-width: 600px;
        margin: 0 auto;
    }
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }
    .service-card {
        background: white;
        border-radius: 20px;
        padding: 40px 30px;
        text-align: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
        border-bottom: 4px solid transparent;
        display: flex;
        flex-direction: column;
    }
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(255, 108, 0, 0.15);
        border-bottom-color: #ff6c00;
    }
    .service-card .icon-box {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: white;
        margin: 0 auto 25px;
        box-shadow: 0 10px 20px rgba(255, 108, 0, 0.2);
    }
    .service-card h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #0f172a !important;
        margin-bottom: 15px;
    }
    .service-card p {
        color: #64748b;
        line-height: 1.6;
        font-size: 15px;
        flex: 1;
    }

    /* ═══════════════════════════════════════════════
       SECTION PROJETS (SLIDER)
    ═══════════════════════════════════════════════ */
    .projects-section {
        background: white;
        padding: 100px 20px;
        overflow: hidden; /* Empêche le scroll horizontal de casser la page */
    }

    /* En-tête avec boutons de navigation */
    .projects-header {
        max-width: 1200px;
        margin: 0 auto 40px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }
    .projects-header .title-group h2 {
        font-size: 2.8rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 10px;
        letter-spacing: -1px;
    }
    .projects-header .title-group p {
        color: #64748b;
        font-size: 1.15rem;
        margin: 0;
    }
    .slider-controls {
        display: flex;
        gap: 10px;
    }
    .slider-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #0f172a;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
    }
    .slider-btn:hover {
        background: #ff6c00;
        color: white;
        border-color: #ff6c00;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(255, 108, 0, 0.2);
    }

    /* Le conteneur du slider */
    .projects-slider {
        display: flex;
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        padding-bottom: 30px; /* Espace pour la scrollbar */

        /* Masquer la scrollbar tout en gardant le scroll */
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE/Edge */
    }
    .projects-slider::-webkit-scrollbar {
        display: none; /* Chrome/Safari */
    }

    /* Les cartes de projet */
    .project-slide {
        flex: 0 0 85%; /* Prend 85% de la largeur du conteneur */
        max-width: 800px;
        height: 400px;
        scroll-snap-align: center;
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        background: #0f172a;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        cursor: pointer;
    }
    .project-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease, opacity 0.6s;
        opacity: 0.85;
    }
    .project-slide:hover img {
        transform: scale(1.05);
        opacity: 1;
    }
    .project-slide-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 50px 40px 40px;
        background: linear-gradient(to top, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.7) 40%, rgba(15, 23, 42, 0) 100%);
        color: white;
    }
    .project-slide-info .category {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #ff6c00;
        margin-bottom: 10px;
    }
    .project-slide-info h3 {
        font-size: 2rem;
        font-weight: 800;
        color: white !important;
        margin: 0;
        line-height: 1.2;
    }

    @media (max-width: 768px) {
        .project-slide { flex: 0 0 95%; height: 300px; }
        .projects-header { flex-direction: column; align-items: flex-start; gap: 20px; }
    }

    /* ═══════════════════════════════════════════════
       SECTION BLOG
    ═══════════════════════════════════════════════ */
    .blog-section {
        background: #f8fafc;
        padding: 100px 20px;
    }
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }
    .blog-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
        display: flex;
        flex-direction: column;
    }
    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);
    }
    .blog-card-img {
        height: 220px;
        overflow: hidden;
    }
    .blog-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }
    .blog-card:hover .blog-card-img img { transform: scale(1.05); }
    .blog-card-content { padding: 30px; flex: 1; display: flex; flex-direction: column; }
    .blog-card-content h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #0f172a !important;
        margin-bottom: 12px;
        line-height: 1.4;
    }
    .blog-card-content h3 a { color: inherit !important; text-decoration: none !important; }
    .blog-card-content p {
        color: #64748b;
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 20px;
        flex: 1;
    }
    .blog-meta {
        font-size: 13px;
        color: #94a3b8;
        border-top: 1px solid #f1f5f9;
        padding-top: 15px;
        display: flex;
        justify-content: space-between;
    }

    /* ═══════════════════════════════════════════════
       SECTION CONTACT (Style Pro)
    ═══════════════════════════════════════════════ */
    .contact-section {
        background: #0f172a;
        padding: 100px 20px;
    }
    .contact-container {
        max-width: 1000px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: flex-start;
    }
    @media (max-width: 768px) { .contact-container { grid-template-columns: 1fr; } }

    .contact-info h2 {
        color: white !important;
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 20px;
        line-height: 1.2;
    }
    .contact-info p {
        color: #94a3b8;
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 40px;
    }

    .contact-form-box {
        background: white;
        padding: 40px;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group input, .form-group textarea {
        width: 100%;
        padding: 15px 20px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        background: #f8fafc;
        transition: all 0.2s;
        color: #0f172a;
    }
    .form-group input:focus, .form-group textarea:focus {
        background: white;
        border-color: #ff6c00;
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 108, 0, 0.15);
    }
    .form-group textarea { resize: vertical; min-height: 120px; }
    .btn-submit {
        width: 100%;
        background: #ff6c00;
        color: white;
        border: none;
        padding: 16px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s;
    }
    .btn-submit:hover { background: #e05a00; transform: translateY(-2px); }

</style>
@endpush

@section('content')
<div class="home-wrapper">

    <!-- ═══════════════ HERO ═══════════════ -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="typed-container">
                <span class="typed-title"></span>
            </div>
            <h1>Je suis <span>{{ $user->name ?? 'Tiefing Sangare' }}</span></h1>
            <p>{{ $user->bio ?? 'Développeur Full Stack et Expert SEO basé à Bamako, Mali. Je crée des solutions digitales performantes et sur mesure pour les entreprises.' }}</p>
            <div class="hero-actions">
                <a href="{{ route('contact') }}" class="btn-primary">
                    <i class="icon ion-ios-chatbubble"></i> Démarrer un projet
                </a>
                <a href="#about-section" class="btn-outline">
                    Découvrir mon profil <i class="icon ion-ios-arrow-down"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- ═══════════════ À PROPOS ═══════════════ -->
    <div class="about-section" id="about-section">
        <div class="about-container">
            <div class="about-avatar">
                <img src="{{ $user->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Tiefing Sangare') . '&background=ff6c00&color=fff&size=600' }}" alt="{{ $user->name }}">
                <div class="badge-icon"><i class="icon ion-ios-code"></i></div>
            </div>
            <div class="about-text">
                <div class="subtitle">{{ $user->title ?? 'Développeur Full Stack & Expert SEO' }}</div>
                <h2>Créateur d'expériences <span>digitales</span> sur mesure.</h2>
                <p>
                    {{ $user->about ?? 'Passionné par le développement web et les nouvelles technologies, je crée des solutions digitales performantes et innovantes pour les entreprises au Mali et à l\'international. Fondateur de Masadigitale, j\'accompagne mes clients dans leur transformation digitale avec des applications sur mesure, un design soigné et un référencement optimal.' }}
                </p>
                <div class="about-buttons">
                    @if($user->cv_url || $user->resume_url)
                        <a href="{{ $user->cv_url ?? $user->resume_url }}" target="_blank" class="btn-primary" style="background: #0f172a; box-shadow: none;">
                            <i class="icon ion-ios-download"></i> Télécharger mon CV
                        </a>
                    @endif
                    <a href="https://wa.me/22366894475" target="_blank" class="btn-outline" style="border-color: #cbd5e1; color: #0f172a !important;">
                        <i class="icon ion-logo-whatsapp" style="color: #25D366; font-size: 20px;"></i> WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════ SERVICES ═══════════════ -->
    <div class="services-section" id="services-section">
        <div class="section-header">
            <h2>Ce que je fais</h2>
            <p>Des solutions complètes pour votre transformation digitale.</p>
        </div>
        <div class="services-grid">
            @forelse($services as $service)
            <div class="service-card">
                <div class="icon-box"><i class="{{ $service->icon_class ?? 'icon ion-ios-browsers-outline' }}"></i></div>
                <h3>{{ $service->title }}</h3>
                <p>{{ $service->description }}</p>
            </div>
            @empty
            <div class="service-card">
                <div class="icon-box"><i class="icon ion-ios-browsers-outline"></i></div>
                <h3>Création de sites web</h3>
                <p>Création de sites vitrine, e-commerce et applications web sur mesure avec Laravel et React.</p>
            </div>
            <div class="service-card">
                <div class="icon-box"><i class="icon ion-social-android-outline"></i></div>
                <h3>Applications mobiles</h3>
                <p>Développement d'applications iOS et Android avec Flutter et React Native.</p>
            </div>
            <div class="service-card">
                <div class="icon-box"><i class="icon ion-ios-chatbubble-outline"></i></div>
                <h3>Agent IA WhatsApp</h3>
                <p>Chatbot intelligent pour automatiser vos conversations 24h/24 et 7j/7.</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- ═══════════════ PROJETS (SLIDER) ═══════════════ -->
    <div class="projects-section" id="works-section">

        <!-- En-tête -->
        <div class="projects-header">
            <div class="title-group">
                <h2>Projets récents</h2>
                <p>Un aperçu de mes dernières réalisations.</p>
            </div>
            <div class="slider-controls">
                <button class="slider-btn" onclick="document.getElementById('projects-track').scrollBy({left: -800, behavior: 'smooth'})">
                    <i class="icon ion-ios-arrow-back"></i>
                </button>
                <button class="slider-btn" onclick="document.getElementById('projects-track').scrollBy({left: 800, behavior: 'smooth'})">
                    <i class="icon ion-ios-arrow-forward"></i>
                </button>
            </div>
        </div>

        <!-- Piste du slider -->
        <div class="projects-slider" id="projects-track">
            @forelse($projects as $project)
                <a href="#popup-{{ $project->id }}" class="project-slide has-popup">
                    @if($project->image)
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                    @else
                        <img src="{{ asset('images/t1.jpg') }}" alt="{{ $project->title }}">
                    @endif

                    <div class="project-slide-info">
                        <div class="category">{{ $project->category ?? 'Projet' }}</div>
                        <h3>{{ $project->title }}</h3>
                    </div>
                </a>

                <!-- Popup pour le projet -->
                <div id="popup-{{ $project->id }}" class="popup-box mfp-fade mfp-hide">
                    <div class="content">
                        <div class="image">
                            @if($project->image)
                                <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                            @endif
                        </div>
                        <div class="desc">
                            <div class="category">{{ $project->category ?? 'Projet' }}</div>
                            <h4>{{ $project->title }}</h4>
                            <p>{{ $project->description }}</p>
                            @if($project->technologies)
                                <p><strong>Technologies :</strong> {{ $project->technologies }}</p>
                            @endif
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" class="btn">Voir le projet</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p style="text-align: center; color: #64748b; width: 100%;">Aucun projet pour le moment.</p>
            @endforelse
        </div>

    </div>

    <!-- ═══════════════ BLOG ═══════════════ -->
    <div class="blog-section" id="blog-section">
        <div class="section-header">
            <h2>Derniers articles</h2>
            <p>Mes réflexions sur le développement, le SEO et l'entrepreneuriat.</p>
        </div>
        <div class="blog-grid">
            @forelse($posts as $post)
            <div class="blog-card">
                <div class="blog-card-img">
                    <a href="{{ route('blog.show', $post->slug) }}">
                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                    </a>
                </div>
                <div class="blog-card-content">
                    <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
                    <p>{{ Str::limit($post->excerpt, 100) }}</p>
                    <div class="blog-meta">
                        <span><i class="icon ion-ios-person"></i> {{ $post->author }}</span>
                        <span>{{ $post->published_at ? $post->published_at->format('d M Y') : '' }}</span>
                    </div>
                </div>
            </div>
            @empty
            <p style="text-align: center; color: #64748b; grid-column: 1/-1;">Aucun article pour le moment.</p>
            @endforelse
        </div>
        <div style="text-align: center; margin-top: 50px;">
            <a href="{{ route('blog') }}" class="btn-primary" style="background: white; color: #ff6c00 !important; border: 2px solid #ff6c00; box-shadow: none;">Voir tous les articles</a>
        </div>
    </div>

    <!-- ═══════════════ CONTACT ═══════════════ -->
    <div class="contact-section" id="contact-section">
        <div class="contact-container">
            <div class="contact-info">
                <h2>Travaillons ensemble.</h2>
                <p>Vous avez un projet en tête ? Une idée à concrétiser ? Remplissez le formulaire et je vous répondrai sous 24h.</p>

                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px; color: white;">
                    <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-ios-email" style="font-size: 24px; color: #ff6c00;"></i>
                    </div>
                    <div>
                        <div style="font-size: 13px; color: #94a3b8;">Email</div>
                        <div style="font-weight: 600;">tiefingsangare86@gmail.com</div>
                    </div>
                </div>

                <div style="display: flex; align-items: center; gap: 15px; color: white;">
                    <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-ios-location" style="font-size: 24px; color: #ff6c00;"></i>
                    </div>
                    <div>
                        <div style="font-size: 13px; color: #94a3b8;">Localisation</div>
                        <div style="font-weight: 600;">Bamako, Mali</div>
                    </div>
                </div>
            </div>

            <div class="contact-form-box">
                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    @if(session('success'))
                        <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <input type="text" name="name" placeholder="Votre nom complet *" required value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Votre adresse email *" required value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Sujet de votre message *" required value="{{ old('subject') }}">
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Votre message *" required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn-submit">Envoyer le message</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Vérifier que Typed.js est chargé
        if(typeof Typed !== 'undefined' && document.querySelector('.typed-title')) {
            new Typed('.typed-title', {
                strings: [
                    'Développement Full Stack',
                    'Expert SEO & Référencement',
                    'Applications Mobiles',
                    'Solutions IA & Chatbots',
                    'UI/UX Design'
                ],
                typeSpeed: 50,
                backSpeed: 30,
                loop: true,
                backDelay: 1500
            });
        }
    });
</script>
@endpush
