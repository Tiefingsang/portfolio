@extends('layouts.app')

@section('title', 'Contact - Tiefing Sangare')
@section('meta_description', 'Contactez Tiefing Sangare pour vos projets de développement web, applications mobiles ou conseil SEO au Mali.')

@push('styles')
<style>
    /* ═══════════════════════════════════════════════
       ANTI-CONFLIT & BASE
    ═══════════════════════════════════════════════ */
    .contact-wrapper, .contact-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }

    @keyframes pulse-dot {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.5); opacity: 0.5; }
    }

    /* ═══════════════════════════════════════════════
       HERO SECTION
    ═══════════════════════════════════════════════ */
    .contact-hero {
        position: relative;
        overflow: hidden;
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: url('{{ asset('images/contacts/cb1.png') }}') center/cover fixed;
    }
    .contact-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.75) 50%, rgba(255, 108, 0, 0.3) 100%);
    }
    .contact-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: 40px 20px;
        color: white;
    }
    .contact-hero-content .icon-badge {
        width: 80px;
        height: 80px;
        border-radius: 24px;
        background: rgba(255, 108, 0, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        margin-bottom: 25px;
        color: #ff6c00;
    }
    .contact-hero-content h1 {
        font-size: 3rem;
        font-weight: 800;
        color: white !important;
        margin-bottom: 15px;
        letter-spacing: -1px;
    }
    .contact-hero-content p {
        font-size: 1.15rem;
        color: rgba(255, 255, 255, 0.85);
        max-width: 500px;
        margin: 0 auto 25px;
        line-height: 1.6;
    }
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 8px 20px;
        border-radius: 30px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        font-size: 13px;
        font-weight: 600;
        color: white;
    }
    .status-badge .dot {
        width: 8px;
        height: 8px;
        background: #16a34a;
        border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }

    /* ═══════════════════════════════════════════════
       SECTION CONTACT
    ═══════════════════════════════════════════════ */
    .contact-section {
        background: #f8fafc;
        padding: 100px 20px;
    }
    .contact-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 60px;
        align-items: flex-start;
    }
    @media (max-width: 992px) {
        .contact-container { grid-template-columns: 1fr; gap: 40px; }
        .contact-hero-content h1 { font-size: 2.2rem; }
    }

    /* ─── Colonne gauche : Infos ─── */
    .contact-info-box h2 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 15px;
        line-height: 1.2;
        letter-spacing: -1px;
    }
    .contact-info-box p.subtitle {
        color: #64748b;
        font-size: 1.05rem;
        line-height: 1.7;
        margin-bottom: 40px;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 20px;
        background: white;
        padding: 20px;
        border-radius: 16px;
        border: 1px solid #f1f5f9;
        transition: all 0.3s;
    }
    .info-item:hover {
        transform: translateX(5px);
        box-shadow: 0 10px 25px -5px rgba(255, 108, 0, 0.1);
        border-color: #ffedd5;
    }
    .info-item .icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        flex-shrink: 0;
    }
    .info-item .text strong {
        display: block;
        color: #0f172a;
        font-size: 15px;
        margin-bottom: 4px;
    }
    .info-item .text span,
    .info-item .text a {
        color: #64748b;
        font-size: 14px;
        text-decoration: none;
    }
    .info-item .text a:hover {
        color: #ff6c00;
    }

    /* ═══════════════════════════════════════════════
       RÉSEAUX SOCIAUX (TOUS TES LIENS)
    ═══════════════════════════════════════════════ */
    .socials-section-title {
        font-size: 13px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 40px;
        margin-bottom: 15px;
    }
    .socials-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .socials-row a {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #0f172a;
        color: white !important;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        text-decoration: none !important;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    .socials-row a svg {
        width: 20px;
        height: 20px;
        fill: currentColor;
    }
    .socials-row a:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    /* Couleurs de marque au survol */
    .socials-row a.fb:hover { background: #1877F2; }
    .socials-row a.gh:hover { background: #333; }
    .socials-row a.tw:hover { background: #000; }
    .socials-row a.li:hover { background: #0077B5; }
    .socials-row a.ig:hover { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
    .socials-row a.yt:hover { background: #FF0000; }
    .socials-row a.tt:hover { background: #000; }
    .socials-row a.wa:hover { background: #25D366; }

    /* ─── Colonne droite : Formulaire ─── */
    .contact-form-box {
        background: white;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 20px 40px -5px rgba(15, 23, 42, 0.08);
        border: 1px solid #f1f5f9;
    }
    .contact-form-box h3 {
        font-size: 1.6rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 8px;
    }
    .contact-form-box p.form-sub {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 30px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    @media (max-width: 600px) {
        .form-grid { grid-template-columns: 1fr; }
        .contact-form-box { padding: 25px; }
    }
    .form-group {
        display: flex;
        flex-direction: column;
    }
    .form-group.full {
        grid-column: 1 / -1;
    }
    .form-group label {
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 8px;
    }
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 14px 18px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        background: #f8fafc;
        color: #0f172a;
        transition: all 0.2s;
        font-family: inherit;
    }
    .form-group input:focus,
    .form-group textarea:focus {
        background: white;
        border-color: #ff6c00;
        outline: none;
        box-shadow: 0 0 0 4px rgba(255, 108, 0, 0.12);
    }
    .form-group textarea {
        resize: vertical;
        min-height: 140px;
    }

    /* Alertes */
    .alert {
        padding: 15px 20px;
        border-radius: 12px;
        margin-bottom: 25px;
        font-size: 14px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }
    .alert-success {
        background: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
    }
    .alert-error {
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }
    .alert-error ul {
        margin: 0;
        padding-left: 20px;
    }

    /* Bouton Submit */
    .btn-submit {
        width: 100%;
        background: #ff6c00;
        color: white;
        padding: 16px;
        border-radius: 12px;
        border: none;
        font-weight: 700;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
        box-shadow: 0 10px 25px -5px rgba(255, 108, 0, 0.4);
    }
    .btn-submit:hover:not(:disabled) {
        background: #e05a00;
        transform: translateY(-2px);
        box-shadow: 0 15px 35px -5px rgba(255, 108, 0, 0.5);
    }
    .btn-submit:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
</style>
@endpush

@section('content')
<div class="contact-wrapper">

    <!-- ═══════════════ HERO ═══════════════ -->
    <div class="contact-hero">
        <div class="contact-hero-content">
            <div class="icon-badge">
                <svg viewBox="0 0 24 24" style="width: 36px; height: 36px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
            </div>
            <h1>Contactez-moi</h1>
            <p>Parlons de votre projet et voyons ensemble comment je peux vous aider à le concrétiser.</p>
            <div class="status-badge">
                <span class="dot"></span> Disponible pour vos projets
            </div>
        </div>
    </div>

    <!-- ═══════════════ SECTION CONTACT ═══════════════ -->
    <div class="contact-section">
        <div class="contact-container">

            <!-- COLONNE GAUCHE -->
            <div class="contact-info-box">
                <h2>Discutons ensemble.</h2>
                <p class="subtitle">Vous avez une idée, un projet ou besoin d'un devis ? Je vous réponds sous 24h.</p>

                <div class="info-item">
                    <div class="icon">
                        <svg viewBox="0 0 24 24" style="width:20px; height:20px; stroke: white; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <div class="text">
                        <strong>Localisation</strong>
                        <span>Bamako, Mali</span>
                    </div>
                </div>

                <div class="info-item">
                    <div class="icon">
                        <svg viewBox="0 0 24 24" style="width:20px; height:20px; stroke: white; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <div class="text">
                        <strong>Email</strong>
                        <a href="mailto:tiefingsangare86@gmail.com">tiefingsangare86@gmail.com</a>
                    </div>
                </div>

                <div class="info-item">
                    <div class="icon" style="background: #25D366;">
                        <svg viewBox="0 0 24 24" style="width:20px; height:20px; stroke: white; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                        </svg>
                    </div>
                    <div class="text">
                        <strong>WhatsApp</strong>
                        <a href="https://wa.me/22366894475" target="_blank">+223 66 89 44 75</a>
                    </div>
                </div>

                <!-- ══════════ RÉSEAUX SOCIAUX ══════════ -->
                <div class="socials-section-title">Suivez-moi</div>
                <div class="socials-row">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/profile.php?id=61590223301110" target="_blank" class="fb" title="Facebook">
                        <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                    <!-- GitHub -->
                    <a href="https://github.com/tiefingsang" target="_blank" class="gh" title="GitHub">
                        <svg viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
                    </a>
                    <!-- X / Twitter -->
                    <a href="https://x.com/TiefingSang/" target="_blank" class="tw" title="X (Twitter)">
                        <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/in/tiefing-sangare" target="_blank" class="li" title="LinkedIn">
                        <svg viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/tiefing_sangare_ts" target="_blank" class="ig" title="Instagram">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                    <!-- YouTube -->
                    <a href="https://www.youtube.com/@Tiefingsangare-y4u" target="_blank" class="yt" title="YouTube">
                        <svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48" fill="#0f172a"/></svg>
                    </a>
                    <!-- TikTok -->
                    <a href="https://www.tiktok.com/@tiefingsangare" target="_blank" class="tt" title="TikTok">
                        <svg viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                    </a>
                    <!-- WhatsApp -->
                    <a href="https://wa.me/22366894475" target="_blank" class="wa" title="WhatsApp">
                        <svg viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                    </a>
                </div>
            </div>

            <!-- COLONNE DROITE : FORMULAIRE -->
            <div class="contact-form-box">
                <h3>Envoyez-moi un message</h3>
                <p class="form-sub">Remplissez le formulaire ci-dessous, je vous réponds sous 24h ouvrées.</p>

                @if(session('success'))
                    <div class="alert alert-success">
                        <svg viewBox="0 0 24 24" style="width:20px; height:20px; flex-shrink:0; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error">
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="contact-form" method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">Nom complet *</label>
                            <input type="text" id="name" name="name" placeholder="Ex : Tiefing Sangare" required value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" placeholder="vous@exemple.com" required value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="tel" id="phone" name="phone" placeholder="+223 00 00 00 00" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group">
                            <label for="subject">Sujet *</label>
                            <input type="text" id="subject" name="subject" placeholder="Ex : Création de site web" required value="{{ old('subject') }}">
                        </div>

                        <div class="form-group full">
                            <label for="message">Votre message *</label>
                            <textarea id="message" name="message" rows="6" placeholder="Décrivez votre projet en quelques lignes..." required>{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group full">
                            <button type="submit" class="btn-submit" id="submit-btn">
                                <span>Envoyer le message</span>
                                <svg viewBox="0 0 24 24" style="width:18px; height:18px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('contact-form').addEventListener('submit', function() {
        const btn = document.getElementById('submit-btn');
        btn.disabled = true;
        btn.innerHTML = `
            <span>Envoi en cours...</span>
            <svg viewBox="0 0 24 24" style="width:18px; height:18px; stroke: currentColor; fill: none; stroke-width: 2; animation: spin 1s linear infinite;">
                <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                <path d="M12 2a10 10 0 0 1 10 10"></path>
            </svg>
        `;
    });
</script>
<style>
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>
@endpush
