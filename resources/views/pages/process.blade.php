@extends('layouts.app')

@section('title', 'Mon Process - Comment je travaille | Tiefing Sangare')
@section('meta_description', 'Découvrez la méthode de travail de Tiefing Sangare en 5 étapes claires : découverte, proposition, design, développement et lancement. Une collaboration transparente du début à la fin.')

@push('styles')
<style>
    .process-wrapper, .process-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }
    .process-wrapper svg { flex-shrink: 0; }

    /* ═══ BARRE DE PROGRESSION (haut de page) ═══ */
    .progress-bar-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: rgba(255, 108, 0, 0.1);
        z-index: 9999;
    }
    .progress-bar {
        height: 100%;
        background: linear-gradient(90deg, #ff6c00, #e05a00);
        width: 0%;
        transition: width 0.1s ease;
        box-shadow: 0 0 10px rgba(255, 108, 0, 0.5);
    }

    /* ═══ ANIMATIONS AU SCROLL ═══ */
    .reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1),
                    transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }
    .reveal-left {
        opacity: 0;
        transform: translateX(-60px);
        transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1),
                    transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .reveal-left.active {
        opacity: 1;
        transform: translateX(0);
    }
    .reveal-right {
        opacity: 0;
        transform: translateX(60px);
        transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1),
                    transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .reveal-right.active {
        opacity: 1;
        transform: translateX(0);
    }
    .reveal-scale {
        opacity: 0;
        transform: scale(0.8);
        transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1),
                    transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .reveal-scale.active {
        opacity: 1;
        transform: scale(1);
    }

    /* Délais progressifs */
    .delay-1 { transition-delay: 0.1s; }
    .delay-2 { transition-delay: 0.2s; }
    .delay-3 { transition-delay: 0.3s; }
    .delay-4 { transition-delay: 0.4s; }
    .delay-5 { transition-delay: 0.5s; }
    .delay-6 { transition-delay: 0.6s; }

    /* ═══ HERO ═══ */
    .process-hero {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.92) 0%, rgba(15, 23, 42, 0.8) 100%), url('{{ asset('images/t1.jpg') }}');
        background-size: cover;
        background-position: center;
        padding: 140px 20px 100px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }
    /* Effet de particules animées */
    .process-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 108, 0, 0.15) 0%, transparent 70%);
        animation: rotateGlow 20s linear infinite;
        pointer-events: none;
    }
    @keyframes rotateGlow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .process-hero .badge {
        display: inline-block;
        background: rgba(255, 108, 0, 0.2);
        border: 1px solid rgba(255, 108, 0, 0.4);
        color: #ff6c00;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 25px;
        position: relative;
        z-index: 1;
        animation: pulseBadge 2s ease-in-out infinite;
    }
    @keyframes pulseBadge {
        0%, 100% { box-shadow: 0 0 0 0 rgba(255, 108, 0, 0.4); }
        50% { box-shadow: 0 0 0 10px rgba(255, 108, 0, 0); }
    }

    .process-hero h1 {
        color: white !important;
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: -1.5px;
        line-height: 1.1;
        position: relative;
        z-index: 1;
    }
    @media (max-width: 768px) {
        .process-hero h1 { font-size: 2.2rem; }
    }
    .process-hero p {
        color: rgba(255, 255, 255, 0.85);
        font-size: 1.25rem;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
        position: relative;
        z-index: 1;
    }

    /* ═══ INTRO ═══ */
    .process-intro {
        background: white;
        padding: 80px 20px 40px;
        text-align: center;
    }
    .process-intro .container {
        max-width: 800px;
        margin: 0 auto;
    }
    .process-intro h2 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 20px;
        letter-spacing: -1px;
    }
    @media (max-width: 768px) {
        .process-intro h2 { font-size: 2rem; }
    }
    .process-intro p {
        font-size: 1.15rem;
        line-height: 1.8;
        color: #475569;
    }

    /* ═══ STATS BAR ═══ */
    .stats-bar {
        background: #f8fafc;
        padding: 60px 20px;
        border-top: 1px solid #e2e8f0;
        border-bottom: 1px solid #e2e8f0;
    }
    .stats-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        max-width: 1000px;
        margin: 0 auto;
        text-align: center;
    }
    @media (max-width: 768px) {
        .stats-container { grid-template-columns: repeat(2, 1fr); gap: 20px; }
    }
    .stat-item .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #ff6c00;
        line-height: 1;
        margin-bottom: 8px;
    }
    @media (max-width: 768px) {
        .stat-item .stat-number { font-size: 1.8rem; }
    }
    .stat-item .stat-label {
        font-size: 13px;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* ═══ TIMELINE ═══ */
    .process-timeline {
        background: white;
        padding: 60px 20px 100px;
        position: relative;
    }
    .timeline-container {
        max-width: 1000px;
        margin: 0 auto;
        position: relative;
    }
    .timeline-container::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e2e8f0;
        transform: translateX(-50%);
    }
    @media (max-width: 768px) {
        .timeline-container::before { left: 30px; }
    }

    .timeline-step {
        display: flex;
        align-items: flex-start;
        margin-bottom: 80px;
        position: relative;
        gap: 40px;
    }
    .timeline-step:nth-child(even) {
        flex-direction: row-reverse;
    }
    .timeline-step:nth-child(even) .step-content {
        text-align: right;
    }
    @media (max-width: 768px) {
        .timeline-step,
        .timeline-step:nth-child(even) {
            flex-direction: row;
            gap: 20px;
            margin-bottom: 50px;
        }
        .timeline-step:nth-child(even) .step-content {
            text-align: left;
        }
    }

    .step-number {
        flex-shrink: 0;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 800;
        box-shadow: 0 15px 30px rgba(255, 108, 0, 0.4);
        position: relative;
        z-index: 2;
        border: 5px solid white;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .step-number:hover {
        transform: scale(1.15) rotate(10deg);
        box-shadow: 0 20px 40px rgba(255, 108, 0, 0.6);
    }
    /* Halo animé autour du numéro */
    .step-number::before {
        content: '';
        position: absolute;
        inset: -8px;
        border-radius: 50%;
        border: 2px solid #ff6c00;
        opacity: 0.3;
        animation: pulseRing 2s ease-out infinite;
    }
    @keyframes pulseRing {
        0% { transform: scale(1); opacity: 0.5; }
        100% { transform: scale(1.4); opacity: 0; }
    }
    @media (max-width: 768px) {
        .step-number {
            width: 60px;
            height: 60px;
            font-size: 1.4rem;
        }
    }

    .step-content {
        flex: 1;
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 35px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        max-width: 420px;
        position: relative;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }
    .step-content::before {
        content: '';
        position: absolute;
        top: 20px;
        bottom: 20px;
        width: 4px;
        background: linear-gradient(to bottom, #ff6c00, transparent);
        border-radius: 2px;
        opacity: 0;
        transition: opacity 0.4s;
    }
    .timeline-step:nth-child(odd) .step-content::before {
        left: 0;
    }
    .timeline-step:nth-child(even) .step-content::before {
        right: 0;
    }
    .step-content:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(255, 108, 0, 0.2);
        border-color: #ffedd5;
    }
    .step-content:hover::before {
        opacity: 1;
    }
    @media (max-width: 768px) {
        .step-content {
            padding: 25px;
            max-width: none;
        }
    }

    .step-content .step-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: linear-gradient(135deg, #fff7ed, #ffedd5);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #ffedd5;
    }
    .step-content:hover .step-icon {
        transform: scale(1.1) rotate(-8deg);
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        border-color: transparent;
    }
    .step-content .step-icon svg {
        width: 28px;
        height: 28px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        transition: stroke 0.3s;
    }
    .step-content:hover .step-icon svg {
        stroke: white;
    }

    .step-content h3 {
        font-size: 1.4rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 12px;
    }
    .step-content p {
        color: #475569;
        font-size: 15px;
        line-height: 1.7;
        margin-bottom: 18px;
    }
    .step-content .step-duration {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        color: #64748b;
        transition: all 0.3s;
    }
    .step-content:hover .step-duration {
        background: #ff6c00;
        color: white;
        border-color: #ff6c00;
    }
    .step-content .step-duration svg {
        width: 14px;
        height: 14px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
    }

    /* ═══ GARANTIES ═══ */
    .guarantees-section {
        background: #f8fafc;
        padding: 100px 20px;
    }
    .guarantees-header {
        text-align: center;
        margin-bottom: 60px;
    }
    .guarantees-header h2 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 15px;
        letter-spacing: -1px;
    }
    @media (max-width: 768px) {
        .guarantees-header h2 { font-size: 2rem; }
    }
    .guarantees-header p {
        color: #64748b;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }
    .guarantees-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }
    @media (max-width: 600px) {
        .guarantees-grid { grid-template-columns: 1fr; }
    }
    .guarantee-card {
        background: white;
        border-radius: 24px;
        padding: 40px 30px;
        text-align: center;
        border: 1px solid #e2e8f0;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    .guarantee-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #ff6c00, #e05a00);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .guarantee-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(255, 108, 0, 0.2);
        border-color: #ffedd5;
    }
    .guarantee-card:hover::before {
        transform: scaleX(1);
    }
    .guarantee-card .icon-circle {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 15px 30px rgba(255, 108, 0, 0.3);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .guarantee-card:hover .icon-circle {
        transform: scale(1.15) rotate(8deg);
    }
    .guarantee-card .icon-circle svg {
        width: 32px;
        height: 32px;
        stroke: white;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .guarantee-card h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #0f172a !important;
        margin-bottom: 12px;
    }
    .guarantee-card p {
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
    }

    /* ═══ CTA FINAL ═══ */
    .process-cta {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        padding: 80px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .process-cta::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255, 108, 0, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .process-cta::after {
        content: '';
        position: absolute;
        bottom: -50%;
        left: -20%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255, 108, 0, 0.1) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .process-cta .fw { position: relative; z-index: 1; }
    .process-cta h2 {
        color: white !important;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
    }
    @media (max-width: 768px) { .process-cta h2 { font-size: 2rem; } }
    .process-cta p {
        color: #94a3b8;
        font-size: 1.15rem;
        max-width: 600px;
        margin: 0 auto 35px;
    }
    .process-cta-btns {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .process-cta-btns .btn-orange {
        background: #ff6c00;
        color: white !important;
        padding: 16px 35px;
        border-radius: 40px;
        font-weight: 700;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
        box-shadow: 0 10px 25px rgba(255, 108, 0, 0.3);
    }
    .process-cta-btns .btn-orange svg {
        width: 18px; height: 18px;
        stroke: white; fill: none;
        stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
    }
    .process-cta-btns .btn-orange:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(255, 108, 0, 0.5);
    }
    .process-cta-btns .btn-outline-light {
        background: transparent;
        color: white !important;
        border: 2px solid rgba(255, 255, 255, 0.3);
        padding: 16px 35px;
        border-radius: 40px;
        font-weight: 700;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
    }
    .process-cta-btns .btn-outline-light svg {
        width: 18px; height: 18px;
        stroke: currentColor; fill: none;
        stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
    }
    .process-cta-btns .btn-outline-light:hover {
        background: white;
        color: #0f172a !important;
        border-color: white;
        transform: translateY(-4px);
    }
</style>
@endpush

@section('content')
<div class="process-wrapper">

    {{-- Barre de progression --}}
    <div class="progress-bar-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    {{-- ═══ HERO ═══ --}}
    <div class="process-hero">
        <div class="fw">
            <span class="badge">Méthode de travail</span>
            <h1>Comment je travaille</h1>
            <p>Une méthode en 5 étapes, transparente et structurée, pour mener votre projet du concept à la mise en ligne.</p>
        </div>
    </div>

    {{-- ═══ INTRO ═══ --}}
    <div class="process-intro">
        <div class="container">
            <h2 class="reveal">Un process éprouvé, du début à la fin.</h2>
            <p class="reveal delay-1">
                Chaque projet suit la même rigueur : écoute, proposition, exécution et suivi.
                Pas de surprise, pas de délais flous, pas de budget qui explose. Vous savez toujours où en est votre projet.
            </p>
        </div>
    </div>

    {{-- ═══ STATS BAR ═══ --}}
    <div class="stats-bar">
        <div class="stats-container">
            <div class="stat-item reveal">
                <div class="stat-number" data-count="5">0</div>
                <div class="stat-label">Étapes claires</div>
            </div>
            <div class="stat-item reveal delay-1">
                <div class="stat-number" data-count="48" data-suffix="h">0</div>
                <div class="stat-label">Devis sous 48h</div>
            </div>
            <div class="stat-item reveal delay-2">
                <div class="stat-number" data-count="100" data-suffix="%">0</div>
                <div class="stat-label">Transparence</div>
            </div>
            <div class="stat-item reveal delay-3">
                <div class="stat-number" data-count="3" data-suffix=" mois">0</div>
                <div class="stat-label">Support inclus</div>
            </div>
        </div>
    </div>

    {{-- ═══ TIMELINE ═══ --}}
    <div class="process-timeline">
        <div class="timeline-container">

            {{-- ÉTAPE 1 --}}
            <div class="timeline-step">
                <div class="step-number reveal-scale">1</div>
                <div class="step-content reveal-left delay-1">
                    <div class="step-icon">
                        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <h3>Découverte</h3>
                    <p>
                        On échange 30 minutes par appel ou WhatsApp pour comprendre votre projet, vos objectifs, votre cible et votre budget. Je vous pose les bonnes questions pour cerner vos besoins réels.
                    </p>
                    <span class="step-duration">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        30 min d'appel
                    </span>
                </div>
            </div>

            {{-- ÉTAPE 2 --}}
            <div class="timeline-step">
                <div class="step-number reveal-scale">2</div>
                <div class="step-content reveal-right delay-1">
                    <div class="step-icon">
                        <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                    <h3>Proposition & devis</h3>
                    <p>
                        Sous 48h, je vous envoie une proposition détaillée : le périmètre du projet, le planning, les livrables, et le devis clair. Vous validez ou on ajuste ensemble.
                    </p>
                    <span class="step-duration">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        48h après l'appel
                    </span>
                </div>
            </div>

            {{-- ÉTAPE 3 --}}
            <div class="timeline-step">
                <div class="step-number reveal-scale">3</div>
                <div class="step-content reveal-left delay-1">
                    <div class="step-icon">
                        <svg viewBox="0 0 24 24"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                    </div>
                    <h3>Design & maquette</h3>
                    <p>
                        Je conçois la maquette de votre site ou application, en respectant votre identité visuelle et les standards UX/UI actuels. Vous validez chaque écran avant qu'une seule ligne de code soit écrite.
                    </p>
                    <span class="step-duration">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        3-7 jours
                    </span>
                </div>
            </div>

            {{-- ÉTAPE 4 --}}
            <div class="timeline-step">
                <div class="step-number reveal-scale">4</div>
                <div class="step-content reveal-right delay-1">
                    <div class="step-icon">
                        <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    </div>
                    <h3>Développement</h3>
                    <p>
                        Je développe votre projet avec un suivi hebdomadaire : vous recevez une version testable chaque semaine pour valider les progrès. Pas de "boîte noire" : vous voyez votre projet avancer en temps réel.
                    </p>
                    <span class="step-duration">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        2-6 semaines
                    </span>
                </div>
            </div>

            {{-- ÉTAPE 5 --}}
            <div class="timeline-step">
                <div class="step-number reveal-scale">5</div>
                <div class="step-content reveal-left delay-1">
                    <div class="step-icon">
                        <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    </div>
                    <h3>Lancement & Formation</h3>
                    <p>
                        Une fois tout validé, je mets votre projet en ligne sur votre hébergement. Je vous forme à l'utilisation du back-office et reste disponible 3 mois pour toute question ou ajustement.
                    </p>
                    <span class="step-duration">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        1 jour + suivi 3 mois
                    </span>
                </div>
            </div>

        </div>
    </div>

    {{-- ═══ GARANTIES ═══ --}}
    <div class="guarantees-section">
        <div class="guarantees-header">
            <h2 class="reveal">Mes engagements</h2>
            <p class="reveal delay-1">Ce qui rend ma méthode différente.</p>
        </div>
        <div class="guarantees-grid">

            <div class="guarantee-card reveal">
                <div class="icon-circle">
                    <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                </div>
                <h3>Prix fixe annoncé</h3>
                <p>Le devis validé est ferme. Pas de frais cachés, pas de dépassement de budget.</p>
            </div>

            <div class="guarantee-card reveal delay-1">
                <div class="icon-circle">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <h3>Délais respectés</h3>
                <p>Un planning clair dès le départ. Si je suis en retard, je vous préviens immédiatement.</p>
            </div>

            <div class="guarantee-card reveal delay-2">
                <div class="icon-circle">
                    <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                </div>
                <h3>Communication régulière</h3>
                <p>Un point hebdomadaire par WhatsApp ou appel pour vous tenir informé de l'avancement.</p>
            </div>

            <div class="guarantee-card reveal">
                <div class="icon-circle">
                    <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
                <h3>Satisfaction garantie</h3>
                <p>Je corrige gratuitement tout bug pendant 3 mois après la livraison.</p>
            </div>

            <div class="guarantee-card reveal delay-1">
                <div class="icon-circle">
                    <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </div>
                <h3>Suivi personnalisé</h3>
                <p>Un seul interlocuteur du début à la fin : moi. Pas d'intermédiaire, pas de perte d'information.</p>
            </div>

            <div class="guarantee-card reveal delay-2">
                <div class="icon-circle">
                    <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h3>Code propre & maintenable</h3>
                <p>Un code documenté et structuré, pour que vous ou un autre développeur puissiez reprendre le projet facilement.</p>
            </div>

        </div>
    </div>

    {{-- ═══ CTA FINAL ═══ --}}
    <div class="process-cta">
        <div class="fw">
            <h2 class="reveal">Prêt à démarrer ?</h2>
            <p class="reveal delay-1">Discutons de votre projet. On fait le point ensemble et je vous propose une solution sur mesure.</p>
            <div class="process-cta-btns reveal delay-2">
                <a href="{{ route('contact') }}" class="btn-orange">
                    <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    Démarrer un projet
                </a>
                <a href="{{ route('pricing') }}" class="btn-outline-light">
                    <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    Voir les tarifs
                </a>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // ═══════════════════════════════════════════════
    // 1. BARRE DE PROGRESSION AU SCROLL
    // ═══════════════════════════════════════════════
    const progressBar = document.getElementById('progressBar');
    window.addEventListener('scroll', function () {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        progressBar.style.width = scrollPercent + '%';
    });

    // ═══════════════════════════════════════════════
    // 2. RÉVÉLATION AU SCROLL (IntersectionObserver)
    // ═══════════════════════════════════════════════
    const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                // Ne plus observer après révélation
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    });

    revealElements.forEach(el => revealObserver.observe(el));

    // ═══════════════════════════════════════════════
    // 3. COMPTEURS ANIMÉS (statistiques)
    // ═══════════════════════════════════════════════
    const statNumbers = document.querySelectorAll('.stat-number');

    const animateCounter = (el) => {
        const target = parseInt(el.getAttribute('data-count'));
        const suffix = el.getAttribute('data-suffix') || '';
        const duration = 2000; // 2 secondes
        const startTime = performance.now();
        const startValue = 0;

        const update = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            // Easing function (ease-out-cubic)
            const easeOut = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(startValue + (target - startValue) * easeOut);

            el.textContent = current + suffix;

            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                el.textContent = target + suffix;
            }
        };

        requestAnimationFrame(update);
    };

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    statNumbers.forEach(el => counterObserver.observe(el));

    // ═══════════════════════════════════════════════
    // 4. PARALLAX SUBTIL SUR LE HERO
    // ═══════════════════════════════════════════════
    const hero = document.querySelector('.process-hero');
    if (hero) {
        window.addEventListener('scroll', function () {
            const scrolled = window.scrollY;
            if (scrolled < 600) {
                hero.style.backgroundPositionY = (scrolled * 0.4) + 'px';
            }
        });
    }

    // ═══════════════════════════════════════════════
    // 5. ANIMATION DES NUMÉROS DE STEP AU SURVOL
    // ═══════════════════════════════════════════════
    document.querySelectorAll('.timeline-step').forEach(step => {
        const number = step.querySelector('.step-number');
        const content = step.querySelector('.step-content');

        if (number && content) {
            content.addEventListener('mouseenter', () => {
                number.style.transform = 'scale(1.15) rotate(10deg)';
                number.style.boxShadow = '0 20px 40px rgba(255, 108, 0, 0.6)';
            });
            content.addEventListener('mouseleave', () => {
                number.style.transform = '';
                number.style.boxShadow = '';
            });
        }
    });
});
</script>
@endpush