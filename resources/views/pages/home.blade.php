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
    .home-wrapper svg { flex-shrink: 0; }

    /* ═══ HERO ═══ */
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
    .hero-content { max-width: 800px; z-index: 2; }
    .hero-content .typed-container {
        font-size: 2rem;
        font-weight: 600;
        color: #ff6c00;
        margin-bottom: 20px;
        min-height: 60px;
        letter-spacing: 1px;
    }
    .hero-content .typed-title { border-right: 3px solid #ff6c00; padding-right: 5px; }
    .hero-content h1 {
        color: white !important;
        font-size: 4.5rem;
        font-weight: 800;
        line-height: 1.1;
        letter-spacing: -2px;
        margin-bottom: 30px;
    }
    .hero-content h1 span { color: #ff6c00; }
    .hero-content p {
        color: rgba(255, 255, 255, 0.85);
        font-size: 1.25rem;
        line-height: 1.6;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    .hero-actions { display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; }
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
    .btn-primary svg { width: 18px; height: 18px; stroke: white; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .btn-primary:hover { transform: translateY(-4px); box-shadow: 0 15px 35px rgba(255, 108, 0, 0.4); }
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
    .btn-outline svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .btn-outline:hover { background: white; color: #0f172a !important; border-color: white; transform: translateY(-4px); }

    /* ═══ À PROPOS ═══ */
    .about-section { background: #fff; padding: 100px 20px; }
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
        .hero-content .typed-container { font-size: 1.5rem; }
    }
    .about-avatar { position: relative; text-align: center; }
    .about-avatar img {
        width: 100%; max-width: 450px;
        border-radius: 30px;
        box-shadow: 0 30px 60px rgba(15, 23, 42, 0.15);
        display: block; margin: 0 auto;
    }
    .about-avatar .badge-icon {
        position: absolute; bottom: 30px; right: 30px;
        width: 80px; height: 80px;
        background: #ff6c00;
        border-radius: 20px;
        display: flex; align-items: center; justify-content: center;
        color: white;
        box-shadow: 0 15px 30px rgba(255, 108, 0, 0.4);
        transform: rotate(10deg);
        transition: transform 0.3s;
    }
    .about-avatar .badge-icon svg { width: 36px; height: 36px; stroke: white; fill: none; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round; }
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
    @media (max-width: 768px) {
        .about-text h2 { font-size: 2rem; }
    }
    .about-text h2 span { color: #ff6c00; }
    .about-text p { font-size: 1.1rem; line-height: 1.8; color: #475569; margin-bottom: 20px; }
    .about-buttons { display: flex; gap: 15px; flex-wrap: wrap; margin-top: 35px; }
    .about-buttons .btn-dark {
        background: #0f172a; color: white !important;
        padding: 14px 28px; border-radius: 40px;
        font-weight: 700; text-decoration: none !important;
        display: inline-flex; align-items: center; gap: 10px;
        transition: all 0.3s;
    }
    .about-buttons .btn-dark svg { width: 18px; height: 18px; stroke: white; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .about-buttons .btn-dark:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(15, 23, 42, 0.2); }
    .about-buttons .btn-wa {
        background: white; color: #0f172a !important;
        border: 2px solid #cbd5e1;
        padding: 14px 28px; border-radius: 40px;
        font-weight: 700; text-decoration: none !important;
        display: inline-flex; align-items: center; gap: 10px;
        transition: all 0.3s;
    }
    .about-buttons .btn-wa svg { width: 20px; height: 20px; stroke: #25D366; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .about-buttons .btn-wa:hover { border-color: #25D366; transform: translateY(-3px); }

    /* ═══ SECTION HEADER ═══ */
    .section-header { text-align: center; margin-bottom: 60px; }
    .section-header h2 {
        font-size: 2.8rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 15px;
        letter-spacing: -1px;
    }
    @media (max-width: 768px) {
        .section-header h2 { font-size: 2rem; }
    }
    .section-header p { color: #64748b; font-size: 1.15rem; max-width: 600px; margin: 0 auto; }

    /* ═══ SERVICES ═══ */
    .services-section { background: #f8fafc; padding: 100px 20px; }
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }
    @media (max-width: 600px) {
        .services-grid { grid-template-columns: 1fr; }
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
    .service-card:hover { transform: translateY(-8px); box-shadow: 0 20px 25px -5px rgba(255, 108, 0, 0.15); border-bottom-color: #ff6c00; }
    .service-card .icon-box {
        width: 70px; height: 70px;
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        border-radius: 18px;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 25px;
        box-shadow: 0 10px 20px rgba(255, 108, 0, 0.2);
    }
    .service-card .icon-box svg { width: 32px; height: 32px; stroke: white; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .service-card h3 { font-size: 1.3rem; font-weight: 700; color: #0f172a !important; margin-bottom: 15px; }
    .service-card p { color: #64748b; line-height: 1.6; font-size: 15px; flex: 1; }

    /* ═══ TÉMOIGNAGES (RESPONSIVE) ═══ */
    .testimonials-section {
        background: white;
        padding: 100px 20px;
    }
    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }
    @media (max-width: 600px) {
        .testimonials-grid { grid-template-columns: 1fr; }
    }

    .testimonial-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 35px;
        display: flex;
        flex-direction: column;
        transition: all 0.3s;
    }
    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px -5px rgba(255, 108, 0, 0.15);
        border-color: #ffedd5;
    }
    .testimonial-quote-icon {
        width: 50px; height: 50px;
        background: #fff7ed;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 20px;
    }
    .testimonial-quote-icon svg { width: 24px; height: 24px; stroke: #ff6c00; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .testimonial-text {
        color: #334155;
        font-size: 1.05rem;
        line-height: 1.7;
        font-style: italic;
        margin-bottom: 25px;
        flex: 1;
    }
    .testimonial-rating { display: flex; gap: 3px; margin-bottom: 20px; }
    .testimonial-rating svg { width: 16px; height: 16px; fill: #fbbf24; stroke: none; }
    .testimonial-rating svg.empty { fill: #e2e8f0; }
    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
    }
    .author-avatar {
        width: 50px; height: 50px;
        border-radius: 50%;
        overflow: hidden;
        flex-shrink: 0;
    }
    .author-avatar img { width: 100%; height: 100%; object-fit: cover; }
    .author-info .author-name { font-weight: 700; color: #0f172a; font-size: 0.95rem; }
    .author-info .author-role { font-size: 0.85rem; color: #64748b; margin-top: 2px; }

    /* ═══ PROJETS ═══ */
    .projects-section { background: #f8fafc; padding: 100px 20px; overflow: hidden; }
    .projects-header {
        max-width: 1200px;
        margin: 0 auto 40px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }
    @media (max-width: 768px) {
        .projects-header { flex-direction: column; align-items: flex-start; gap: 20px; }
    }
    .projects-header .title-group h2 {
        font-size: 2.8rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 10px;
        letter-spacing: -1px;
    }
    @media (max-width: 768px) {
        .projects-header .title-group h2 { font-size: 2rem; }
    }
    .projects-header .title-group p { color: #64748b; font-size: 1.15rem; margin: 0; }
    .slider-controls { display: flex; gap: 10px; }
    .slider-btn {
        width: 50px; height: 50px;
        border-radius: 50%;
        background: white;
        border: 1px solid #e2e8f0;
        color: #0f172a;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
    }
    .slider-btn svg { width: 20px; height: 20px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .slider-btn:hover { background: #ff6c00; color: white; border-color: #ff6c00; transform: translateY(-2px); box-shadow: 0 10px 20px rgba(255, 108, 0, 0.2); }

    .projects-slider {
        display: flex;
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        padding-bottom: 30px;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    .projects-slider::-webkit-scrollbar { display: none; }

    .project-slide {
        flex: 0 0 85%;
        max-width: 800px;
        height: 400px;
        scroll-snap-align: center;
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        background: #0f172a;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        cursor: pointer;
        display: block;
        text-decoration: none !important;
    }
    @media (max-width: 768px) {
        .project-slide { flex: 0 0 90%; height: 280px; }
    }
    .project-slide img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease, opacity 0.6s; opacity: 0.85; }
    .project-slide:hover img { transform: scale(1.05); opacity: 1; }
    .project-slide-info {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        padding: 50px 40px 40px;
        background: linear-gradient(to top, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.7) 40%, rgba(15, 23, 42, 0) 100%);
        color: white;
    }
    @media (max-width: 768px) {
        .project-slide-info { padding: 30px 20px 20px; }
        .project-slide-info h3 { font-size: 1.4rem; }
    }
    .project-slide-info .category { font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; color: #ff6c00; margin-bottom: 10px; }
    .project-slide-info h3 { font-size: 2rem; font-weight: 800; color: white !important; margin: 0 0 15px; line-height: 1.2; }
    .project-slide-info .cta { display: inline-flex; align-items: center; gap: 8px; color: #ff6c00; font-weight: 600; font-size: 14px; transition: gap 0.2s; }
    .project-slide:hover .project-slide-info .cta { gap: 12px; }
    .project-slide-info .cta svg { width: 16px; height: 16px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

    /* ═══ BLOG ═══ */
    .blog-section { background: white; padding: 100px 20px; }
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }
    @media (max-width: 600px) {
        .blog-grid { grid-template-columns: 1fr; }
    }
    .blog-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #f1f5f9;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
        display: flex;
        flex-direction: column;
    }
    .blog-card:hover { transform: translateY(-8px); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); }
    .blog-card-img { height: 220px; overflow: hidden; }
    .blog-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
    .blog-card:hover .blog-card-img img { transform: scale(1.05); }
    .blog-card-content { padding: 30px; flex: 1; display: flex; flex-direction: column; }
    .blog-card-content h3 { font-size: 1.3rem; font-weight: 700; color: #0f172a !important; margin-bottom: 12px; line-height: 1.4; }
    .blog-card-content h3 a { color: inherit !important; text-decoration: none !important; }
    .blog-card-content p { color: #64748b; font-size: 15px; line-height: 1.6; margin-bottom: 20px; flex: 1; }
    .blog-meta {
        font-size: 13px;
        color: #94a3b8;
        border-top: 1px solid #f1f5f9;
        padding-top: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .blog-meta span { display: inline-flex; align-items: center; gap: 6px; }
    .blog-meta svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

    /* ═══ CONTACT ═══ */
    .contact-section { background: #0f172a; padding: 100px 20px; }
    .contact-container {
        max-width: 1000px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: flex-start;
    }
    @media (max-width: 768px) { .contact-container { grid-template-columns: 1fr; } }
    .contact-info h2 { color: white !important; font-size: 2.8rem; font-weight: 800; margin-bottom: 20px; line-height: 1.2; }
    @media (max-width: 768px) {
        .contact-info h2 { font-size: 2rem; }
    }
    .contact-info p { color: #94a3b8; font-size: 1.1rem; line-height: 1.7; margin-bottom: 40px; }
    .contact-info-item { display: flex; align-items: center; gap: 15px; margin-bottom: 20px; color: white; }
    .contact-info-item:last-child { margin-bottom: 0; }
    .contact-info-item .icon-circle {
        width: 50px; height: 50px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .contact-info-item .icon-circle svg { width: 24px; height: 24px; stroke: #ff6c00; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .contact-info-item .label { font-size: 13px; color: #94a3b8; }
    .contact-info-item .value { font-weight: 600; color: white; }

    .contact-form-box { background: white; padding: 40px; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.2); }
    @media (max-width: 768px) {
        .contact-form-box { padding: 25px; }
    }
    .form-group { margin-bottom: 20px; }
    .form-group input, .form-group textarea {
        width: 100%;
        padding: 15px 20px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        background: #f8fafc;
        transition: all 0.2s;
        color: #0f172a;
        font-family: inherit;
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
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    .btn-submit svg { width: 18px; height: 18px; stroke: white; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .btn-submit:hover { background: #e05a00; transform: translateY(-2px); }

</style>
@endpush

@section('content')
<div class="home-wrapper">

    {{-- ═══ HERO ═══ --}}
    <div class="hero-section">
        <div class="hero-content">
            <div class="typed-container">
                <span class="typed-title"></span>
            </div>
            <h1>Je suis <span>{{ $user->name ?? 'Tiefing Sangare' }}</span></h1>
            <p>{{ $user->bio ?? 'Développeur Full Stack et Expert SEO basé à Bamako, Mali. Je crée des solutions digitales performantes et sur mesure pour les entreprises.' }}</p>
            <div class="hero-actions">
                <a href="{{ route('contact') }}" class="btn-primary">
                    <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    Démarrer un projet
                </a>
                <a href="#about-section" class="btn-outline">
                    Découvrir mon profil
                    <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                </a>
            </div>
        </div>
    </div>

    {{-- ═══ À PROPOS ═══ --}}
    <div class="about-section" id="about-section">
        <div class="about-container">
            <div class="about-avatar">
                <img src="{{ $user->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Tiefing Sangare') . '&background=ff6c00&color=fff&size=600' }}" alt="{{ $user->name }}">
                <div class="badge-icon">
                    <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
            </div>
            <div class="about-text">
                <div class="subtitle">{{ $user->title ?? 'Développeur Full Stack & Expert SEO' }}</div>
                <h2>Créateur d'expériences <span>digitales</span> sur mesure.</h2>
                <p>{{ $user->about ?? 'Passionné par le développement web et les nouvelles technologies, je crée des solutions digitales performantes et innovantes pour les entreprises au Mali et à l\'international.' }}</p>
                <div class="about-buttons">
                    @if($user->cv_url || $user->resume_url)
                        <a href="{{ $user->cv_url ?? $user->resume_url }}" target="_blank" class="btn-dark">
                            <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            Télécharger mon CV
                        </a>
                    @endif
                    <a href="https://wa.me/22366894475" target="_blank" class="btn-wa">
                        <svg viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══ SERVICES ═══ --}}
    <div class="services-section" id="services-section">
        <div class="section-header">
            <h2>Ce que je fais</h2>
            <p>Des solutions complètes pour votre transformation digitale.</p>
        </div>
        <div class="services-grid">
            @forelse($services as $service)
            <div class="service-card">
                <div class="icon-box">
                    <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                </div>
                <h3>{{ $service->title }}</h3>
                <p>{{ $service->description }}</p>
            </div>
            @empty
            <div class="service-card">
                <div class="icon-box"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></div>
                <h3>Création de sites web</h3>
                <p>Création de sites vitrine, e-commerce et applications web sur mesure avec Laravel et React.</p>
            </div>
            <div class="service-card">
                <div class="icon-box"><svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg></div>
                <h3>Applications mobiles</h3>
                <p>Développement d'applications iOS et Android avec Flutter et React Native.</p>
            </div>
            <div class="service-card">
                <div class="icon-box"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></div>
                <h3>Agent IA WhatsApp</h3>
                <p>Chatbot intelligent pour automatiser vos conversations 24h/24 et 7j/7.</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- ═══ TÉMOIGNAGES (RESPONSIVE) ═══ --}}
    @if(isset($testimonials) && $testimonials->count() > 0)
    <div class="testimonials-section" id="testimonials-section">
        <div class="section-header">
            <h2>Ils m'ont fait confiance</h2>
            <p>Ce que disent mes clients après avoir travaillé avec moi.</p>
        </div>

        <div class="testimonials-grid">
            @foreach($testimonials as $testimonial)
            <div class="testimonial-card">
                <div class="testimonial-quote-icon">
                    <svg viewBox="0 0 24 24"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path></svg>
                </div>

                <div class="testimonial-rating">
                    @for($i = 1; $i <= 5; $i++)
                        <svg viewBox="0 0 24 24" class="{{ $i <= $testimonial->rating ? '' : 'empty' }}">
                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    @endfor
                </div>

                <p class="testimonial-text">« {{ $testimonial->quote }} »</p>

                <div class="testimonial-author">
                    <div class="author-avatar">
                        <img src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->author_name }}">
                    </div>
                    <div class="author-info">
                        <div class="author-name">{{ $testimonial->author_name }}</div>
                        <div class="author-role">
                            {{ $testimonial->author_role }}{{ $testimonial->company ? ' · ' . $testimonial->company : '' }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- ═══ PROJETS ═══ --}}
    <div class="projects-section" id="works-section">
        <div class="projects-header">
            <div class="title-group">
                <h2>Projets récents</h2>
                <p>Un aperçu de mes dernières réalisations.</p>
            </div>
            <div class="slider-controls">
                <button class="slider-btn" onclick="document.getElementById('projects-track').scrollBy({left: -800, behavior: 'smooth'})">
                    <svg viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </button>
                <button class="slider-btn" onclick="document.getElementById('projects-track').scrollBy({left: 800, behavior: 'smooth'})">
                    <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button>
            </div>
        </div>

        <div class="projects-slider" id="projects-track">
            @forelse($projects as $project)
                <a href="{{ route('project.show', $project->slug) }}" class="project-slide">
                    @if($project->image)
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                    @else
                        <img src="{{ asset('images/t1.jpg') }}" alt="{{ $project->title }}">
                    @endif

                    <div class="project-slide-info">
                        <div class="category">{{ $project->category ?? 'Projet' }}</div>
                        <h3>{{ $project->title }}</h3>
                        <span class="cta">
                            Voir l'étude de cas
                            <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </span>
                    </div>
                </a>
            @empty
                <p style="text-align: center; color: #64748b; width: 100%;">Aucun projet pour le moment.</p>
            @endforelse
        </div>
    </div>

    {{-- ═══ BLOG ═══ --}}
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
                        <span>
                            <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            {{ $post->author }}
                        </span>
                        <span>
                            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            {{ $post->published_at ? $post->published_at->format('d M Y') : '' }}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <p style="text-align: center; color: #64748b; grid-column: 1/-1;">Aucun article pour le moment.</p>
            @endforelse
        </div>
        <div style="text-align: center; margin-top: 50px;">
            <a href="{{ route('blog') }}" class="btn-primary" style="background: white; color: #ff6c00 !important; border: 2px solid #ff6c00; box-shadow: none;">
                <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                Voir tous les articles
            </a>
        </div>
    </div>

    {{-- ═══ CONTACT ═══ --}}
    <div class="contact-section" id="contact-section">
        <div class="contact-container">
            <div class="contact-info">
                <h2>Travaillons ensemble.</h2>
                <p>Vous avez un projet en tête ? Une idée à concrétiser ? Remplissez le formulaire et je vous répondrai sous 24h.</p>

                <div class="contact-info-item">
                    <div class="icon-circle">
                        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <div>
                        <div class="label">Email</div>
                        <div class="value">tiefingsangare86@gmail.com</div>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="icon-circle">
                        <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </div>
                    <div>
                        <div class="label">Localisation</div>
                        <div class="value">Bamako, Mali</div>
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
                    <button type="submit" class="btn-submit">
                        Envoyer le message
                        <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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
