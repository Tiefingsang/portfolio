@extends('layouts.app')

@section('title', 'À propos - ' . ($user->name ?? 'Tiefing Sangare') . ', Développeur Web Full Stack')
@section('meta_description', $user->bio ?? 'Découvrez ' . ($user->name ?? 'Tiefing Sangare') . ', développeur web full stack et entrepreneur digital à Bamako, Mali.')

@push('styles')
<style>
    /* ═══════════════════════════════════════════════
       ANTI-CONFLIT & BASE
    ═══════════════════════════════════════════════ */
    .about-wrapper, .about-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }

    /* SVG Icons helper */
    .svg-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 1em;
        height: 1em;
        stroke-width: 2;
        stroke: currentColor;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* ═══════════════════════════════════════════════
       HERO SECTION
    ═══════════════════════════════════════════════ */
    .about-hero {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.88) 0%, rgba(15, 23, 42, 0.75) 100%), url('{{ asset('images/apropos/ab1.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 140px 20px 100px;
        text-align: center;
        color: white;
    }
    .about-hero .icon-box {
        width: 90px;
        height: 90px;
        border-radius: 24px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        margin-bottom: 25px;
        color: #ff6c00;
    }
    .about-hero h1 {
        color: white !important;
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: -1px;
    }
    .about-hero p {
        color: rgba(255, 255, 255, 0.85);
        font-size: 1.25rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ═══════════════════════════════════════════════
       SECTION BIO / PRÉSENTATION
    ═══════════════════════════════════════════════ */
    .bio-section {
        background: white;
        padding: 100px 20px;
    }
    .bio-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 60px;
        align-items: center;
    }
    @media (max-width: 992px) {
        .bio-container { grid-template-columns: 1fr; gap: 40px; }
        .about-hero h1 { font-size: 2.5rem; }
    }

    .bio-image {
        position: relative;
        text-align: center;
    }
    .bio-image img {
        width: 100%;
        max-width: 450px;
        border-radius: 30px;
        box-shadow: 0 30px 60px rgba(15, 23, 42, 0.15);
        display: block;
        margin: 0 auto;
    }
    .bio-image .badge {
        position: absolute;
        bottom: 30px;
        right: 20px;
        background: #ff6c00;
        color: white;
        padding: 15px 25px;
        border-radius: 16px;
        font-weight: 700;
        box-shadow: 0 15px 30px rgba(255, 108, 0, 0.4);
        transform: rotate(-5deg);
    }

    .bio-content .subtitle {
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
    .bio-content h2 {
        font-size: 3rem;
        font-weight: 800;
        color: #0f172a !important;
        line-height: 1.2;
        margin-bottom: 25px;
        letter-spacing: -1px;
    }
    .bio-content h2 span { color: #ff6c00; }
    .bio-content p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #475569;
        margin-bottom: 20px;
    }
    .bio-actions {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 35px;
    }
    .btn-orange {
        background: #ff6c00;
        color: white !important;
        padding: 14px 30px;
        border-radius: 40px;
        font-weight: 700;
        text-decoration: none !important;
        transition: all 0.3s;
        box-shadow: 0 10px 25px rgba(255, 108, 0, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }
    .btn-orange:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(255, 108, 0, 0.4); }
    .btn-wa {
        background: #25D366;
        color: white !important;
        padding: 14px 30px;
        border-radius: 40px;
        font-weight: 700;
        text-decoration: none !important;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
    }
    .btn-wa:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(37, 211, 102, 0.4); }

    /* ═══════════════════════════════════════════════
       SECTION COMPÉTENCES
    ═══════════════════════════════════════════════ */
    .skills-section {
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

    .skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        max-width: 1200px;
        margin: 0 auto;
    }
    .skill-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
        border: 1px solid #f1f5f9;
    }
    .skill-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(255, 108, 0, 0.15);
        border-color: #ffedd5;
    }
    .skill-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        color: white;
        margin-bottom: 20px;
        box-shadow: 0 10px 20px rgba(255, 108, 0, 0.2);
    }
    .skill-card h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #0f172a !important;
        margin-bottom: 10px;
    }
    .skill-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 15px;
    }
    .skill-tag {
        background: #f8fafc;
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
    }

    /* ═══════════════════════════════════════════════
       SECTION PARCOURS (TIMELINE)
    ═══════════════════════════════════════════════ */
    .journey-section {
        background: white;
        padding: 100px 20px;
    }
    .timeline {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
    }
    .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 100%;
        background: #e2e8f0;
    }
    @media (max-width: 768px) {
        .timeline::before { left: 30px; }
    }

    .timeline-item {
        display: flex;
        justify-content: flex-end;
        padding-right: 50%;
        position: relative;
        margin-bottom: 50px;
    }
    .timeline-item:nth-child(even) {
        justify-content: flex-start;
        padding-right: 0;
        padding-left: 50%;
    }
    @media (max-width: 768px) {
        .timeline-item, .timeline-item:nth-child(even) {
            justify-content: flex-start;
            padding-left: 80px;
            padding-right: 0;
        }
    }

    .timeline-content {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 25px;
        width: 100%;
        max-width: 350px;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        position: relative;
    }
    .timeline-item:nth-child(odd) .timeline-content::after {
        content: '';
        position: absolute;
        right: -10px;
        top: 50%;
        transform: translateY(-50%) rotate(45deg);
        width: 20px;
        height: 20px;
        background: white;
        border-top: 1px solid #e2e8f0;
        border-right: 1px solid #e2e8f0;
    }
    .timeline-item:nth-child(even) .timeline-content::after {
        content: '';
        position: absolute;
        left: -10px;
        top: 50%;
        transform: translateY(-50%) rotate(45deg);
        width: 20px;
        height: 20px;
        background: white;
        border-bottom: 1px solid #e2e8f0;
        border-left: 1px solid #e2e8f0;
    }
    @media (max-width: 768px) {
        .timeline-content::after { display: none; }
    }

    .timeline-dot {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        background: #ff6c00;
        border: 4px solid white;
        border-radius: 50%;
        box-shadow: 0 0 0 4px rgba(255, 108, 0, 0.2);
        z-index: 2;
    }
    @media (max-width: 768px) {
        .timeline-dot { left: 30px; }
    }

    .timeline-year {
        font-size: 14px;
        font-weight: 700;
        color: #ff6c00;
        margin-bottom: 10px;
    }
    .timeline-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #0f172a !important;
        margin-bottom: 10px;
    }
    .timeline-desc {
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
    }

    /* ═══════════════════════════════════════════════
       SECTION INFOS / CONTACT
    ═══════════════════════════════════════════════ */
    .info-section {
        background: #f8fafc;
        padding: 80px 20px;
    }
    .info-container {
        max-width: 1000px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
    }
    @media (max-width: 768px) { .info-container { grid-template-columns: 1fr; } }

    .info-card {
        background: white;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
    }
    .info-card h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #0f172a !important;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .info-list li {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 20px;
    }
    .info-list li .svg-icon {
        color: #ff6c00;
        font-size: 20px;
        width: 24px;
        height: 24px;
        flex-shrink: 0;
        margin-top: 2px;
    }
    .info-list li strong {
        display: block;
        color: #0f172a;
        font-size: 14px;
        margin-bottom: 2px;
    }
    .info-list li span, .info-list li a {
        color: #64748b;
        font-size: 15px;
        text-decoration: none;
    }

    .social-links {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
    .social-btn {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white !important;
        font-size: 22px;
        text-decoration: none !important;
        transition: all 0.3s;
    }
    .social-btn:hover {
        transform: translateY(-3px);
        opacity: 0.9;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #dcfce7;
        color: #166534;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        margin-top: 20px;
    }
    .status-badge .dot {
        width: 8px;
        height: 8px;
        background: #16a34a;
        border-radius: 50%;
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    /* ═══════════════════════════════════════════════
       CTA FINAL
    ═══════════════════════════════════════════════ */
    .cta-final {
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        padding: 80px 20px;
        text-align: center;
    }
    .cta-final h2 {
        color: white !important;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
    }
    .cta-final p {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto 35px;
    }
    .cta-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }
</style>
@endpush

@section('content')
<div class="about-wrapper">

    <!-- ═══════════════ HERO ═══════════════ -->
    <div class="about-hero">
        <div class="fw">
            <div class="icon-box">
                <svg class="svg-icon" viewBox="0 0 24 24" style="width: 44px; height: 44px;">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <h1>À propos de moi</h1>
            <p>Découvrez mon parcours, mes compétences et ma vision du digital en Afrique.</p>
        </div>
    </div>

    <!-- ═══════════════ BIO ═══════════════ -->
    <div class="bio-section" id="about-section">
        <div class="bio-container">
            <div class="bio-image">
                @php
                    $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Tiefing Sangare') . '&background=ff6c00&color=fff&size=600';
                    if ($user->avatar) {
                        if (Storage::disk('public')->exists($user->avatar)) {
                            $avatarUrl = Storage::url($user->avatar);
                        } elseif (file_exists(public_path($user->avatar))) {
                            $avatarUrl = asset($user->avatar);
                        }
                    }
                @endphp
                <img src="{{ $avatarUrl }}" alt="{{ $user->name ?? 'Tiefing Sangare' }}">
                <div class="badge">Développeur Full Stack</div>
            </div>

            <div class="bio-content">
                <div class="subtitle">{{ $user->title ?? 'Développeur & Entrepreneur' }}</div>
                <h2>Je suis <span>{{ $user->name ?? 'Tiefing Sangare' }}</span></h2>
                <p>
                    {{ $user->bio ?? 'Développeur web passionné et entrepreneur digital basé à Bamako, Mali.' }}
                </p>
                <p>
                    {{ $user->about ?? 'Passionné par le développement web et les nouvelles technologies, je crée des solutions digitales performantes et innovantes pour les entreprises au Mali et à l\'international. Fondateur de Masadigitale, j\'accompagne mes clients dans leur transformation digitale avec des applications sur mesure, un design soigné et un référencement optimal.' }}
                </p>

                <div class="bio-actions">
                    <a href="{{ route('contact') }}" class="btn-orange">
                        <svg class="svg-icon" viewBox="0 0 24 24" style="width: 18px; height: 18px;">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        Me contacter
                    </a>
                    <a href="https://wa.me/22366894475" target="_blank" class="btn-wa">
                        <svg class="svg-icon" viewBox="0 0 24 24" style="width: 18px; height: 18px;">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                        </svg>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════ COMPÉTENCES ═══════════════ -->
    <div class="skills-section">
        <div class="section-header">
            <h2>Mes compétences</h2>
            <p>Les technologies et services que je maîtrise pour votre transformation digitale.</p>
        </div>

        <div class="skills-grid">
            <!-- Backend -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                        <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                        <line x1="6" y1="6" x2="6.01" y2="6"></line>
                        <line x1="6" y1="18" x2="6.01" y2="18"></line>
                    </svg>
                </div>
                <h3>Développement Backend</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Laravel</span>
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">Springboot</span>
                    <span class="skill-tag">MySQL</span>
                    <span class="skill-tag">Node.js</span>
                </div>
            </div>

            <!-- Frontend -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <polyline points="16 18 22 12 16 6"></polyline>
                        <polyline points="8 6 2 12 8 18"></polyline>
                    </svg>
                </div>
                <h3>Développement Frontend</h3>
                <div class="skill-tags">
                    <span class="skill-tag">React</span>
                    <span class="skill-tag">Next.js</span>
                    <span class="skill-tag">Tailwind CSS</span>
                    <span class="skill-tag">Vue.js</span>
                </div>
            </div>

            <!-- Mobile -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                        <line x1="12" y1="18" x2="12.01" y2="18"></line>
                    </svg>
                </div>
                <h3>Applications Mobiles</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Flutter</span>
                    <span class="skill-tag">React Native</span>
                    <span class="skill-tag">iOS</span>
                    <span class="skill-tag">Android</span>
                </div>
            </div>

            <!-- E-commerce -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                </div>
                <h3>E-commerce</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Shopify</span>
                    <span class="skill-tag">WooCommerce</span>
                    <span class="skill-tag">Prestashop</span>
                    <span class="skill-tag">Stripe/PayPal</span>
                    <span class="skill-tag">Mobile Money</span>
                </div>
            </div>

            <!-- Publicité en ligne -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <circle cx="12" cy="12" r="6"></circle>
                        <circle cx="12" cy="12" r="2"></circle>
                    </svg>
                </div>
                <h3>Publicité & Acquisition</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Meta Ads</span>
                    <span class="skill-tag">Google Ads</span>
                    <span class="skill-tag">TikTok Ads</span>
                    <span class="skill-tag">Campagnes</span>
                    <span class="skill-tag">ROAS</span>
                </div>
            </div>

            <!-- Hébergement & Cloud -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path>
                    </svg>
                </div>
                <h3>Hébergement & Cloud</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Noms de domaine</span>
                    <span class="skill-tag">VPS & Cloud</span>
                    <span class="skill-tag">SSL/HTTPS</span>
                    <span class="skill-tag">Emails Pro</span>
                    <span class="skill-tag">Sauvegardes</span>
                </div>
            </div>

            <!-- Équipements Informatiques -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </div>
                <h3>Fourniture d'Équipements</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Ordinateurs</span>
                    <span class="skill-tag">Imprimantes</span>
                    <span class="skill-tag">Réseaux</span>
                    <span class="skill-tag">Serveurs</span>
                    <span class="skill-tag">Maintenance</span>
                </div>
            </div>

            <!-- Technologies & Systèmes -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                        <rect x="9" y="9" width="6" height="6"></rect>
                        <line x1="9" y1="1" x2="9" y2="4"></line>
                        <line x1="15" y1="1" x2="15" y2="4"></line>
                        <line x1="9" y1="20" x2="9" y2="23"></line>
                        <line x1="15" y1="20" x2="15" y2="23"></line>
                        <line x1="20" y1="9" x2="23" y2="9"></line>
                        <line x1="20" y1="14" x2="23" y2="14"></line>
                        <line x1="1" y1="9" x2="4" y2="9"></line>
                        <line x1="1" y1="14" x2="4" y2="14"></line>
                    </svg>
                </div>
                <h3>Technologies & Systèmes</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Installation</span>
                    <span class="skill-tag">Configuration</span>
                    <span class="skill-tag">Cybersécurité</span>
                    <span class="skill-tag">Logiciels Pro</span>
                </div>
            </div>

            <!-- SEO -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                </div>
                <h3>SEO & Référencement</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Google Analytics</span>
                    <span class="skill-tag">Search Console</span>
                    <span class="skill-tag">Netlinking</span>
                    <span class="skill-tag">SEO Local</span>
                </div>
            </div>

            <!-- IA & Chatbots -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <rect x="3" y="11" width="18" height="10" rx="2"></rect>
                        <circle cx="12" cy="5" r="2"></circle>
                        <path d="M12 7v4"></path>
                        <line x1="8" y1="16" x2="8" y2="16"></line>
                        <line x1="16" y1="16" x2="16" y2="16"></line>
                    </svg>
                </div>
                <h3>IA & Chatbots</h3>
                <div class="skill-tags">
                    <span class="skill-tag">OpenAI API</span>
                    <span class="skill-tag">WhatsApp API</span>
                    <span class="skill-tag">NLP</span>
                </div>
            </div>

            <!-- UI/UX Design -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <circle cx="13.5" cy="6.5" r=".5"></circle>
                        <circle cx="17.5" cy="10.5" r=".5"></circle>
                        <circle cx="8.5" cy="7.5" r=".5"></circle>
                        <circle cx="6.5" cy="12.5" r=".5"></circle>
                        <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"></path>
                    </svg>
                </div>
                <h3>UI/UX Design</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Figma</span>
                    <span class="skill-tag">Adobe XD</span>
                    <span class="skill-tag">Prototypage</span>
                </div>
            </div>

            <!-- Marketing Digital -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <path d="M3 11l18-5v12L3 14v-3z"></path>
                        <path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path>
                    </svg>
                </div>
                <h3>Marketing Digital</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Stratégie digitale</span>
                    <span class="skill-tag">Community Management</span>
                    <span class="skill-tag">Social Media</span>
                </div>
            </div>

            <!-- Formation -->
            <div class="skill-card">
                <div class="skill-icon">
                    <svg class="svg-icon" viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                    </svg>
                </div>
                <h3>Formation & Conseil</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Consultant</span>
                    <span class="skill-tag">Formation Web</span>
                    <span class="skill-tag">Stratégie d'entreprise</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════ PARCOURS (TIMELINE) ═══════════════ -->
    <div class="journey-section">
        <div class="section-header">
            <h2>Mon parcours</h2>
            <p>Des études à l'entrepreneuriat, en passant par la formation continue.</p>
        </div>

        <div class="timeline">
            <!-- Item 1 -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-year">Formation</div>
                    <div class="timeline-title">Génie Informatique</div>
                    <div class="timeline-desc">Diplômé en Génie Informatique, avec des formations complémentaires en Entrepreneuriat et Développement Web.</div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-year">Expérience</div>
                    <div class="timeline-title">5+ ans en développement</div>
                    <div class="timeline-desc">Développement web Full Stack, création et accompagnement d'entreprises, consultant en stratégie digitale.</div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-year">Vision</div>
                    <div class="timeline-title">Transformer l'Afrique par le digital</div>
                    <div class="timeline-desc">Accompagner la transformation digitale des entreprises africaines, innover et créer un impact social positif.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════ INFOS & CONTACT ═══════════════ -->
    <div class="info-section">
        <div class="info-container">

            <!-- Infos personnelles -->
            <div class="info-card">
                <h3>
                    <svg class="svg-icon" viewBox="0 0 24 24" style="color:#ff6c00; width:24px; height:24px;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    Informations
                </h3>
                <ul class="info-list">
                    <li>
                        <svg class="svg-icon" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <div>
                            <strong>Nom complet</strong>
                            <span>{{ $user->name ?? 'Tiefing Sangare' }}</span>
                        </div>
                    </li>
                    <li>
                        <svg class="svg-icon" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <div>
                            <strong>Email</strong>
                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                        </div>
                    </li>
                    @if($user->location)
                    <li>
                        <svg class="svg-icon" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <div>
                            <strong>Localisation</strong>
                            <span>{{ $user->location }}</span>
                        </div>
                    </li>
                    @endif
                    @if($user->company)
                    <li>
                        <svg class="svg-icon" viewBox="0 0 24 24"><path d="M3 21h18"></path><path d="M5 21V7l8-4v18"></path><path d="M19 21V11l-6-4"></path><path d="M9 9v.01"></path><path d="M9 12v.01"></path><path d="M9 15v.01"></path><path d="M9 18v.01"></path></svg>
                        <div>
                            <strong>Entreprise</strong>
                            <span>{{ $user->company }}</span>
                        </div>
                    </li>
                    @endif
                </ul>
                <div class="status-badge">
                    <span class="dot"></span> Disponible pour missions freelance
                </div>
            </div>

            <!-- Réseaux sociaux -->
            <div class="info-card">
                <h3>
                    <svg class="svg-icon" viewBox="0 0 24 24" style="color:#ff6c00; width:24px; height:24px;">
                        <circle cx="18" cy="5" r="3"></circle>
                        <circle cx="6" cy="12" r="3"></circle>
                        <circle cx="18" cy="19" r="3"></circle>
                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                    </svg>
                    Me suivre
                </h3>
                <div class="social-links">
                    @if($user->github)
                        <a href="{{ $user->github }}" target="_blank" class="social-btn" style="background: #333;">
                            <svg class="svg-icon" viewBox="0 0 24 24" style="width:24px; height:24px; fill:white;">
                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                            </svg>
                        </a>
                    @endif
                    @if($user->linkedin)
                        <a href="{{ $user->linkedin }}" target="_blank" class="social-btn" style="background: #0077B5;">
                            <svg class="svg-icon" viewBox="0 0 24 24" style="width:24px; height:24px; fill:white;">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </a>
                    @endif
                    @if($user->twitter)
                        <a href="{{ $user->twitter }}" target="_blank" class="social-btn" style="background: #1DA1F2;">
                            <svg class="svg-icon" viewBox="0 0 24 24" style="width:24px; height:24px; fill:white;">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                            </svg>
                        </a>
                    @endif
                    @if($user->facebook)
                        <a href="{{ $user->facebook }}" target="_blank" class="social-btn" style="background: #1877F2;">
                            <svg class="svg-icon" viewBox="0 0 24 24" style="width:24px; height:24px; fill:white;">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                    @endif
                    @if($user->instagram)
                        <a href="{{ $user->instagram }}" target="_blank" class="social-btn" style="background: #E4405F;">
                            <svg class="svg-icon" viewBox="0 0 24 24" style="width:24px; height:24px; fill:white;">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                    @endif
                    @if($user->youtube)
                        <a href="{{ $user->youtube }}" target="_blank" class="social-btn" style="background: #FF0000;">
                            <svg class="svg-icon" viewBox="0 0 24 24" style="width:24px; height:24px; fill:white;">
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48"></polygon>
                            </svg>
                        </a>
                    @endif
                </div>

                <div style="margin-top: 30px;">
                    <div style="display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid #f1f5f9;">
                        <span style="color: #64748b; font-size: 14px;">Expérience</span>
                        <span style="color: #0f172a; font-weight: 700;">5+ ans</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid #f1f5f9;">
                        <span style="color: #64748b; font-size: 14px;">Projets</span>
                        <span style="color: #0f172a; font-weight: 700;">15+</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 15px 0;">
                        <span style="color: #64748b; font-size: 14px;">Satisfaction</span>
                        <span style="color: #16a34a; font-weight: 700;">100%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════ CTA FINAL ═══════════════ -->
    <div class="cta-final">
        <div class="fw">
            <h2>Un projet en tête ?</h2>
            <p>Discutons de vos idées et transformons-les en réalité digitale. Réponse sous 24h, devis gratuit.</p>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="btn-orange" style="background: white; color: #ff6c00 !important;">
                    <svg class="svg-icon" viewBox="0 0 24 24" style="width: 18px; height: 18px; color: #ff6c00;">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    Me contacter
                </a>
                <a href="https://wa.me/22366894475" target="_blank" class="btn-wa">
                    <svg class="svg-icon" viewBox="0 0 24 24" style="width: 18px; height: 18px;">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                    </svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
