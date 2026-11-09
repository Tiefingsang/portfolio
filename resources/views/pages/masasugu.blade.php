@extends('layouts.app')

@section('title', 'Masasugu - Marketplace E-commerce au Mali | Notre entreprise')
@section('meta_description', 'Découvrez Masasugu, la marketplace e-commerce qui connecte vendeurs et acheteurs au Mali et en Afrique. Une entreprise fondée par Tiefing Sangare à Bamako.')

@push('styles')
<style>
    .masasugu-wrapper, .masasugu-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }
    .masasugu-wrapper svg { flex-shrink: 0; }

    /* ═══ HERO ═══ */
    .ms-hero {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.82) 100%);
        padding: 80px 20px 100px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .ms-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 700px;
        height: 700px;
        background: radial-gradient(circle, rgba(255, 108, 0, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        animation: rotateGlow 30s linear infinite;
    }
    @keyframes rotateGlow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .ms-hero-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
        position: relative;
        z-index: 1;
    }
    @media (max-width: 992px) {
        .ms-hero-content { grid-template-columns: 1fr; gap: 40px; }
    }

    .ms-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 108, 0, 0.2);
        border: 1px solid rgba(255, 108, 0, 0.4);
        color: #ff6c00;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 20px;
    }

    .ms-logo-big {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }
    .ms-logo-big svg {
        width: 48px;
        height: 48px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .ms-logo-big h2 {
        font-size: 2rem;
        font-weight: 800;
        color: white !important;
        margin: 0;
        letter-spacing: -0.5px;
    }
    .ms-logo-big .tagline {
        display: block;
        font-size: 12px;
        color: #ff6c00;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-top: 2px;
    }

    .ms-hero h1 {
        font-size: 2.8rem;
        font-weight: 800;
        color: white !important;
        line-height: 1.15;
        letter-spacing: -1px;
        margin-bottom: 20px;
    }
    @media (max-width: 768px) { .ms-hero h1 { font-size: 2rem; } }
    .ms-hero h1 span { color: #ff6c00; }
    .ms-hero p {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.85);
        line-height: 1.7;
        margin-bottom: 30px;
    }

    .ms-hero-actions {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    .btn-orange-solid {
        background: #ff6c00;
        color: white !important;
        padding: 14px 30px;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
        box-shadow: 0 10px 25px rgba(255, 108, 0, 0.3);
    }
    .btn-orange-solid:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(255, 108, 0, 0.5);
    }
    .btn-outline-white {
        background: transparent;
        color: white !important;
        border: 2px solid rgba(255, 255, 255, 0.3);
        padding: 14px 30px;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
    }
    .btn-outline-white:hover {
        background: white;
        color: #0f172a !important;
        border-color: white;
        transform: translateY(-3px);
    }

    .ms-hero-visual {
        position: relative;
        display: flex;
        justify-content: center;
    }
    .ms-hero-visual img {
        width: 100%;
        max-width: 500px;
        border-radius: 20px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
    }

    /* ═══ BARRE DE FEATURES ═══ */
    .ms-features-bar {
        background: white;
        padding: 30px 20px;
        border-bottom: 1px solid #e2e8f0;
    }
    .ms-features-inner {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }
    @media (max-width: 768px) {
        .ms-features-inner { grid-template-columns: repeat(2, 1fr); }
    }
    .ms-feature-item {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .ms-feature-item svg {
        width: 32px;
        height: 32px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        flex-shrink: 0;
    }
    .ms-feature-item .info h4 {
        font-size: 14px;
        font-weight: 800;
        color: #0f172a !important;
        margin: 0 0 2px;
    }
    .ms-feature-item .info p {
        font-size: 12px;
        color: #64748b;
        margin: 0;
    }

    /* ═══ SECTION GÉNÉRIQUE ═══ */
    .ms-section {
        padding: 80px 20px;
        background: white;
    }
    .ms-section.gray { background: #f8fafc; }
    .ms-container { max-width: 1200px; margin: 0 auto; }

    .ms-section-label {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #ff6c00;
        font-size: 13px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 15px;
    }
    .ms-section-label::before {
        content: '';
        width: 20px;
        height: 2px;
        background: #ff6c00;
        border-radius: 2px;
    }
    .ms-section h2 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 20px;
        letter-spacing: -1px;
        line-height: 1.2;
    }
    @media (max-width: 768px) { .ms-section h2 { font-size: 1.8rem; } }
    .ms-section p {
        font-size: 1.05rem;
        color: #475569;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    /* ═══ SECTION NOTRE HISTOIRE ═══ */
    .ms-about-grid {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 50px;
        align-items: start;
    }
    @media (max-width: 992px) {
        .ms-about-grid { grid-template-columns: 1fr; gap: 30px; }
    }
    .ms-objective-box {
        background: #fff7ed;
        border-radius: 20px;
        padding: 30px;
        border-left: 4px solid #ff6c00;
    }
    .ms-objective-box .icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #ff6c00;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        box-shadow: 0 10px 20px rgba(255, 108, 0, 0.3);
    }
    .ms-objective-box .icon svg {
        width: 24px;
        height: 24px;
        stroke: white;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .ms-objective-box h3 {
        font-size: 1.2rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 10px;
    }
    .ms-objective-box p {
        font-size: 14px;
        color: #475569;
        line-height: 1.6;
        margin: 0;
    }

    /* ═══ FONCTIONNALITÉS ═══ */
    .ms-features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }
    .ms-feature-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 25px;
        transition: all 0.3s;
    }
    .ms-feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px -5px rgba(255, 108, 0, 0.15);
        border-color: #ffedd5;
    }
    .ms-feature-card .card-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #fff7ed;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }
    .ms-feature-card .card-icon svg {
        width: 22px;
        height: 22px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .ms-feature-card h3 {
        font-size: 1rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 8px;
    }
    .ms-feature-card p {
        font-size: 13px;
        color: #64748b;
        margin: 0;
        line-height: 1.5;
    }

    /* ═══ CHIFFRES CLÉS ═══ */
    .ms-numbers-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 25px;
        margin-top: 40px;
    }
    .ms-number-card {
        text-align: center;
        padding: 35px 20px;
        background: linear-gradient(135deg, #fff7ed, #ffffff);
        border-radius: 20px;
        border: 1px solid #ffedd5;
        transition: all 0.3s;
    }
    .ms-number-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px -5px rgba(255, 108, 0, 0.2);
    }
    .ms-number-card .num {
        font-size: 3rem;
        font-weight: 800;
        color: #ff6c00;
        line-height: 1;
        letter-spacing: -2px;
    }
    .ms-number-card .label {
        font-size: 13px;
        color: #64748b;
        margin-top: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* ═══ ÉQUIPE ═══ */
    .ms-team-card {
        background: linear-gradient(135deg, #fff7ed, #ffffff);
        border: 2px solid #ffedd5;
        border-radius: 24px;
        padding: 40px;
        display: flex;
        align-items: center;
        gap: 30px;
        max-width: 700px;
        margin: 40px auto 0;
    }
    @media (max-width: 768px) {
        .ms-team-card { flex-direction: column; text-align: center; padding: 30px; }
    }
    .ms-team-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid #ff6c00;
        object-fit: cover;
        box-shadow: 0 15px 30px rgba(255, 108, 0, 0.3);
        flex-shrink: 0;
    }
    .ms-team-info h3 {
        font-size: 1.5rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 6px;
    }
    .ms-team-info .role {
        color: #ff6c00;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 12px;
    }
    .ms-team-info p {
        color: #475569;
        font-size: 14px;
        line-height: 1.7;
        margin: 0;
    }

    /* ═══ APERÇU PLATEFORME ═══ */
    .ms-preview-grid {
        display: grid;
        grid-template-columns: 1.3fr 1fr;
        gap: 40px;
        align-items: start;
        margin-top: 40px;
    }
    @media (max-width: 992px) {
        .ms-preview-grid { grid-template-columns: 1fr; }
    }
    .ms-preview-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    .ms-preview-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .ms-info-card {
        background: #f8fafc;
        border-radius: 16px;
        padding: 25px;
        margin-bottom: 20px;
        border: 1px solid #e2e8f0;
    }
    .ms-info-card .label {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        font-weight: 800;
        color: #0f172a;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 12px;
    }
    .ms-info-card .label svg {
        width: 20px;
        height: 20px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .ms-info-card .content {
        font-size: 14px;
        color: #475569;
        line-height: 1.6;
    }

    .ms-tech-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .ms-tech-tag {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        color: white;
        display: inline-flex;
        align-items: center;
    }
    .ms-tech-tag.laravel { background: #FF2D20; }
    .ms-tech-tag.flutter { background: #02569B; }
    .ms-tech-tag.mysql { background: #00758F; }
    .ms-tech-tag.ionic { background: #3880FF; }
    .ms-tech-tag.tailwind { background: #06B6D4; }
    .ms-tech-tag.vps { background: #333; }

    /* ═══ CTA FINAL ═══ */
    .ms-cta-final {
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        padding: 60px 20px;
        color: white;
    }
    .ms-cta-final-inner {
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
    }
    .ms-cta-final h2 {
        font-size: 2rem;
        font-weight: 800;
        color: white !important;
        margin-bottom: 12px;
    }
    .ms-cta-final p {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 600px;
        margin: 0 auto 30px;
    }
    .ms-cta-final-btns {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .btn-cta-white {
        background: white;
        color: #ff6c00 !important;
        padding: 14px 30px;
        border-radius: 50px;
        font-weight: 800;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    .btn-cta-white:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
    }
    .btn-cta-white svg {
        width: 20px;
        height: 20px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .btn-cta-outline {
        background: transparent;
        color: white !important;
        border: 2px solid rgba(255, 255, 255, 0.4);
        padding: 14px 30px;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
    }
    .btn-cta-outline:hover {
        background: white;
        color: #ff6c00 !important;
        border-color: white;
    }
    .btn-cta-outline svg {
        width: 18px;
        height: 18px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
</style>
@endpush

@section('content')
<div class="masasugu-wrapper">

    {{-- ═══ HERO ═══ --}}
    <section class="ms-hero">
        <div class="ms-hero-content">

            <div>
                <span class="ms-hero-badge">🏢 Notre entreprise</span>

                <div class="ms-logo-big">
                    <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    <div>
                        <h2>Masasugu</h2>
                        <span class="tagline">Client est roi</span>
                    </div>
                </div>

                <h1>Masasugu, la marketplace qui rapproche vendeurs et acheteurs au <span>Mali et en Afrique</span></h1>

                <p>
                    Une plateforme e-commerce complète (web et mobile) pour acheter, vendre et distribuer des produits et services, avec livraison partout au Mali.
                </p>

                <div class="ms-hero-actions">
                    <a href="https://masasugu.com" target="_blank" rel="noopener" class="btn-orange-solid">
                        <svg viewBox="0 0 24 24" style="width:18px; height:18px; stroke: white; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                        Visiter masasugu.com
                    </a>
                    <a href="{{ route('contact') }}" class="btn-outline-white">
                        <svg viewBox="0 0 24 24" style="width:18px; height:18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        Nous contacter
                    </a>
                </div>
            </div>

            <div class="ms-hero-visual">
                <img src="{{ asset('images/projects/masasugu-hero.png') }}" alt="Masasugu - Marketplace e-commerce au Mali">
            </div>

        </div>
    </section>

    {{-- ═══ BARRE DE FEATURES ═══ --}}
    <section class="ms-features-bar">
        <div class="ms-features-inner">
            <div class="ms-feature-item">
                <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <div class="info">
                    <h4>Marketplace</h4>
                    <p>Multi-vendeurs</p>
                </div>
            </div>
            <div class="ms-feature-item">
                <svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                <div class="info">
                    <h4>Livraison</h4>
                    <p>Partout au Mali</p>
                </div>
            </div>
            <div class="ms-feature-item">
                <svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                <div class="info">
                    <h4>Paiement flexible</h4>
                    <p>Orange Money, Moov, WAVE</p>
                </div>
            </div>
            <div class="ms-feature-item">
                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                <div class="info">
                    <h4>Écosystème local</h4>
                    <p>Vendeurs, distributeurs, fabricants</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ NOTRE HISTOIRE ═══ --}}
    <section class="ms-section">
        <div class="ms-container">
            <div class="ms-about-grid">
                <div>
                    <div class="ms-section-label">Notre histoire</div>
                    <h2>Qui est Masasugu ?</h2>
                    <p>
                        <strong>Masasugu</strong> est une entreprise malienne qui développe une plateforme e-commerce et une marketplace pour faciliter le commerce en ligne au Mali et en Afrique.
                    </p>
                    <p>
                        Nous permettons aux particuliers, commerçants, entreprises et fabricants de proposer leurs produits, de gérer leurs commandes et de toucher des clients partout au Mali.
                    </p>
                </div>

                <div class="ms-objective-box">
                    <div class="icon">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                    </div>
                    <h3>Notre mission</h3>
                    <p>
                        Créer un marché numérique local, fiable et accessible, qui stimule l'entrepreneuriat, la distribution et la consommation des produits adaptés au contexte malien.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ CE QUE NOUS FAISONS ═══ --}}
    <section class="ms-section gray">
        <div class="ms-container">
            <div class="ms-section-label">Ce que nous faisons</div>
            <h2>Nos services & fonctionnalités</h2>

            <div class="ms-features-grid">
                <div class="ms-feature-card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    </div>
                    <h3>Achat en ligne</h3>
                    <p>Découvrez et commandez des produits facilement.</p>
                </div>

                <div class="ms-feature-card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    </div>
                    <h3>Boutiques vendeurs</h3>
                    <p>Créez votre boutique et gérez vos produits.</p>
                </div>

                <div class="ms-feature-card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <h3>Distribution & livraison</h3>
                    <p>Un réseau de partenaires pour la livraison partout au Mali.</p>
                </div>

                <div class="ms-feature-card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                    </div>
                    <h3>Paiement local</h3>
                    <p>Orange Money, Moov Money et WAVE.</p>
                </div>

                <div class="ms-feature-card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                    <h3>Suivi des commandes</h3>
                    <p>Suivez vos achats et ventes en temps réel.</p>
                </div>

                <div class="ms-feature-card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    </div>
                    <h3>Promotions</h3>
                    <p>Mettez en avant vos offres et réductions.</p>
                </div>

                <div class="ms-feature-card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <h3>Réseau de distributeurs</h3>
                    <p>Des partenaires formés pour couvrir les villes et zones rurales.</p>
                </div>

                <div class="ms-feature-card">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <h3>Sécurité & confiance</h3>
                    <p>Comptes vérifiés et gestion fiable des transactions.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ CHIFFRES CLÉS ═══ --}}
    <section class="ms-section">
        <div class="ms-container">
            <div class="ms-section-label">En chiffres</div>
            <h2>Masasugu aujourd'hui</h2>

            <div class="ms-numbers-grid">
                <div class="ms-number-card">
                    <div class="num">4+</div>
                    <div class="label">Années d'activité</div>
                </div>
                <div class="ms-number-card">
                    <div class="num">20</div>
                    <div class="label">Vendeurs actifs</div>
                </div>
                <div class="ms-number-card">
                    <div class="num">100+</div>
                    <div class="label">Produits en ligne</div>
                </div>
                <div class="ms-number-card">
                    <div class="num">7</div>
                    <div class="label">Régions couvertes</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ APERÇU PLATEFORME ═══ --}}
    <section class="ms-section gray">
        <div class="ms-container">
            <div class="ms-section-label">Notre plateforme</div>
            <h2>Un design pensé pour convertir</h2>

            <div class="ms-preview-grid">
                <div class="ms-preview-image">
                    <img src="{{ asset('images/projects/masasugu-preview.png') }}" alt="Aperçu de Masasugu">
                </div>

                <div>
                    <div class="ms-info-card">
                        <div class="label">
                            <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                            Disponible sur
                        </div>
                        <div class="ms-tech-tags">
                            <span class="ms-tech-tag" style="background: #16a34a;">Application mobile (Android/iOS)</span>
                            <span class="ms-tech-tag" style="background: #3b82f6;">Site web</span>
                        </div>
                    </div>

                    

                    <div class="ms-info-card">
                        <div class="label">
                            <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            Siège social
                        </div>
                        <div class="content">Bamako, Mali — opérations dans tout le pays.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ L'ÉQUIPE ═══ --}}
    <section class="ms-section">
        <div class="ms-container">
            <div class="ms-section-label">L'équipe</div>
            <h2>Les personnes derrière Masasugu</h2>

            <div class="ms-team-card">
                <img src="{{ asset('images/t1.jpg') }}" alt="Tiefing Sangare" class="ms-team-avatar">
                <div class="ms-team-info">
                    <h3>Tiefing Sangare</h3>
                    <div class="role">Fondateur & Directeur technique</div>
                    <p>
                        Développeur Full Stack et entrepreneur digital, Tiefing a fondé Masasugu avec une vision : digitaliser le commerce africain.
                        Il pilote la conception, le développement et la stratégie technique de la plateforme.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ CTA FINAL ═══ --}}
    <section class="ms-cta-final">
        <div class="ms-cta-final-inner">
            <h2>Rejoignez Masasugu</h2>
            <p>Vous êtes vendeur, distributeur ou partenaire ? Découvrez comment travailler avec nous.</p>
            <div class="ms-cta-final-btns">
                <a href="https://masasugu.com" target="_blank" rel="noopener" class="btn-cta-white">
                    <svg viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                    Visiter masasugu.com
                </a>
                <a href="{{ route('contact') }}" class="btn-cta-outline">
                    <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    Nous contacter
                </a>
            </div>
        </div>
    </section>

</div>
@endsection