@extends('layouts.app')

@section('title', 'Tarifs & Offres - Tiefing Sangare | Développeur Full Stack au Mali')
@section('meta_description', 'Découvrez les tarifs de Tiefing Sangare pour la création de sites web, applications mobiles et solutions e-commerce au Mali. 3 offres claires à partir de 150 000 FCFA.')

@push('styles')
<style>
    .pricing-wrapper, .pricing-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }
    .pricing-wrapper svg { flex-shrink: 0; }

    /* ═══ HERO ═══ */
    .pricing-hero {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.92) 0%, rgba(15, 23, 42, 0.8) 100%), url('{{ asset('images/t1.jpg') }}');
        background-size: cover;
        background-position: center;
        padding: 140px 20px 100px;
        text-align: center;
        color: white;
    }
    .pricing-hero .badge {
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
    }
    .pricing-hero h1 {
        color: white !important;
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: -1.5px;
        line-height: 1.1;
    }
    @media (max-width: 768px) {
        .pricing-hero h1 { font-size: 2.2rem; }
    }
    .pricing-hero p {
        color: rgba(255, 255, 255, 0.85);
        font-size: 1.25rem;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ═══ GRILLE TARIFS ═══ */
    .pricing-section {
        background: #f8fafc;
        padding: 80px 20px 100px;
    }
    .pricing-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        align-items: stretch;
    }
    @media (max-width: 600px) {
        .pricing-grid { grid-template-columns: 1fr; }
    }

    /* ═══ CARTE ═══ */
    .pricing-card {
        background: white;
        border-radius: 24px;
        border: 2px solid #e2e8f0;
        padding: 40px 30px;
        display: flex;
        flex-direction: column;
        position: relative;
        transition: all 0.3s;
    }
    .pricing-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.15);
        border-color: #cbd5e1;
    }
    .pricing-card.featured {
        border-color: #ff6c00;
        box-shadow: 0 20px 40px -5px rgba(255, 108, 0, 0.2);
        transform: scale(1.03);
    }
    .pricing-card.featured:hover {
        transform: scale(1.03) translateY(-8px);
        box-shadow: 0 30px 60px -10px rgba(255, 108, 0, 0.3);
    }
    @media (max-width: 992px) {
        .pricing-card.featured { transform: scale(1); }
        .pricing-card.featured:hover { transform: translateY(-8px); }
    }

    .featured-badge {
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        background: #ff6c00;
        color: white;
        padding: 6px 20px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 8px 20px rgba(255, 108, 0, 0.4);
        white-space: nowrap;
    }

    .pricing-card .plan-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }
    .pricing-card.featured .plan-icon {
        background: #fff7ed;
    }
    .pricing-card .plan-icon svg {
        width: 28px;
        height: 28px;
        stroke: #64748b;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .pricing-card.featured .plan-icon svg {
        stroke: #ff6c00;
    }

    .pricing-card h3 {
        font-size: 1.5rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 8px;
    }
    .pricing-card .plan-desc {
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 25px;
        min-height: 42px;
    }

    .price-block {
        padding-bottom: 25px;
        margin-bottom: 25px;
        border-bottom: 1px solid #e2e8f0;
    }
    .price {
        display: flex;
        align-items: baseline;
        gap: 6px;
    }
    .price .amount {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: -1px;
        line-height: 1;
    }
    @media (max-width: 400px) {
        .price .amount { font-size: 2rem; }
    }
    .price .currency {
        font-size: 1rem;
        font-weight: 600;
        color: #64748b;
    }
    .pricing-card.featured .price .amount {
        color: #ff6c00;
    }
    .price-note {
        font-size: 12px;
        color: #94a3b8;
        margin-top: 6px;
    }

    .features-list {
        list-style: none;
        padding: 0;
        margin: 0 0 30px;
        flex: 1;
    }
    .features-list li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 8px 0;
        font-size: 14px;
        color: #475569;
        line-height: 1.5;
    }
    .features-list li svg {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
        margin-top: 2px;
        stroke: #16a34a;
        fill: none;
        stroke-width: 2.5;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .features-list li.disabled {
        color: #cbd5e1;
        text-decoration: line-through;
    }
    .features-list li.disabled svg {
        stroke: #cbd5e1;
    }

    .btn-plan {
        width: 100%;
        padding: 14px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none !important;
        text-align: center;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: 2px solid #e2e8f0;
        background: white;
        color: #0f172a !important;
    }
    .btn-plan:hover {
        border-color: #0f172a;
        background: #0f172a;
        color: white !important;
        transform: translateY(-2px);
    }
    .pricing-card.featured .btn-plan {
        background: #ff6c00;
        color: white !important;
        border-color: #ff6c00;
        box-shadow: 0 10px 20px rgba(255, 108, 0, 0.3);
    }
    .pricing-card.featured .btn-plan:hover {
        background: #e05a00;
        border-color: #e05a00;
        box-shadow: 0 15px 30px rgba(255, 108, 0, 0.4);
    }
    .btn-plan svg {
        width: 18px;
        height: 18px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* ═══ FAQ ═══ */
    .faq-section {
        background: white;
        padding: 100px 20px;
    }
    .faq-container { max-width: 800px; margin: 0 auto; }
    .faq-header { text-align: center; margin-bottom: 50px; }
    .faq-header h2 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 15px;
        letter-spacing: -1px;
    }
    @media (max-width: 768px) { .faq-header h2 { font-size: 2rem; } }
    .faq-header p { color: #64748b; font-size: 1.1rem; }

    .faq-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        margin-bottom: 15px;
        overflow: hidden;
        transition: all 0.3s;
    }
    .faq-item[open] {
        border-color: #ff6c00;
        box-shadow: 0 10px 25px -5px rgba(255, 108, 0, 0.1);
    }
    .faq-item summary {
        padding: 20px 25px;
        font-weight: 700;
        color: #0f172a;
        cursor: pointer;
        list-style: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: color 0.2s;
    }
    .faq-item summary::-webkit-details-marker { display: none; }
    .faq-item summary::after {
        content: '+';
        font-size: 24px;
        color: #ff6c00;
        font-weight: 400;
        transition: transform 0.3s;
    }
    .faq-item[open] summary::after {
        transform: rotate(45deg);
    }
    .faq-item summary:hover { color: #ff6c00; }
    .faq-content {
        padding: 0 25px 20px;
        color: #475569;
        font-size: 15px;
        line-height: 1.7;
    }
    .faq-content ul {
        margin: 10px 0;
        padding-left: 20px;
    }

    /* ═══ CTA FINAL ═══ */
    .pricing-cta {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        padding: 80px 20px;
        text-align: center;
    }
    .pricing-cta h2 {
        color: white !important;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
    }
    @media (max-width: 768px) { .pricing-cta h2 { font-size: 2rem; } }
    .pricing-cta p {
        color: #94a3b8;
        font-size: 1.15rem;
        max-width: 600px;
        margin: 0 auto 35px;
    }
    .pricing-cta-btns {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .pricing-cta-btns .btn-orange {
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
    .pricing-cta-btns .btn-orange svg {
        width: 18px; height: 18px;
        stroke: white; fill: none;
        stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
    }
    .pricing-cta-btns .btn-orange:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(255, 108, 0, 0.4);
    }
    .pricing-cta-btns .btn-wa {
        background: #25D366;
        color: white !important;
        padding: 16px 35px;
        border-radius: 40px;
        font-weight: 700;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
        box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
    }
    .pricing-cta-btns .btn-wa svg {
        width: 20px; height: 20px;
        stroke: white; fill: none;
        stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
    }
    .pricing-cta-btns .btn-wa:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(37, 211, 102, 0.4);
    }
</style>
@endpush

@section('content')
<div class="pricing-wrapper">

    {{-- ═══ HERO ═══ --}}
    <div class="pricing-hero">
        <div class="fw">
            <span class="badge">Tarifs transparents</span>
            <h1>Des offres claires<br>pour votre projet</h1>
            <p>Choisissez le pack qui correspond à vos besoins. Devis gratuit, paiement en plusieurs fois possible, satisfaction garantie.</p>
        </div>
    </div>

    {{-- ═══ GRILLE TARIFS ═══ --}}
    <div class="pricing-section">
        <div class="pricing-grid">

            {{-- PLAN 1 : STARTER --}}
            <div class="pricing-card">
                <div class="plan-icon">
                    <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                </div>
                <h3>Starter</h3>
                <p class="plan-desc">Pour les indépendants et petites entreprises qui veulent une présence en ligne professionnelle.</p>

                <div class="price-block">
                    <div class="price">
                        <span class="amount">150 000</span>
                        <span class="currency">FCFA</span>
                    </div>
                    <p class="price-note">À partir de · Paiement en 2 fois</p>
                </div>

                <ul class="features-list">
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Site vitrine 5 pages
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Design responsive (mobile/tablette)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Formulaire de contact
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        SEO de base (balises, sitemap)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Hébergement 1 an inclus
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Nom de domaine .com offert
                    </li>
                    <li class="disabled">
                        <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        E-commerce
                    </li>
                    <li class="disabled">
                        <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        Application mobile
                    </li>
                </ul>

                <a href="{{ route('contact') }}" class="btn-plan">
                    Demander un devis
                    <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>

            {{-- PLAN 2 : BUSINESS (VEDETTE) --}}
            <div class="pricing-card featured">
                <span class="featured-badge">⭐ Le plus populaire</span>
                <div class="plan-icon">
                    <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                </div>
                <h3>Business</h3>
                <p class="plan-desc">Pour les entreprises qui veulent vendre en ligne et automatiser leurs ventes.</p>

                <div class="price-block">
                    <div class="price">
                        <span class="amount">350 000</span>
                        <span class="currency">FCFA</span>
                    </div>
                    <p class="price-note">À partir de · Paiement en 3 fois</p>
                </div>

                <ul class="features-list">
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Site e-commerce complet
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Jusqu'à 50 produits
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Paiement Orange Money / Mobile Money
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        SEO avancé (optimisation, mots-clés)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Hébergement 1 an inclus
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Back-office admin complet
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Formation à l'utilisation
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Support 3 mois inclus
                    </li>
                </ul>

                <a href="{{ route('contact') }}" class="btn-plan">
                    Démarrer maintenant
                    <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>

            {{-- PLAN 3 : SUR MESURE --}}
            <div class="pricing-card">
                <div class="plan-icon">
                    <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h3>Sur Mesure</h3>
                <p class="plan-desc">Pour les projets complexes : applications mobiles, IA, ERP, plateformes custom.</p>

                <div class="price-block">
                    <div class="price">
                        <span class="amount">Sur devis</span>
                    </div>
                    <p class="price-note">Projet personnalisé · Devis sous 48h</p>
                </div>

                <ul class="features-list">
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Application mobile (iOS/Android)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Agent IA / Chatbot WhatsApp
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Plateforme ERP / SaaS
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Intégrations sur mesure (API)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Design UI/UX personnalisé
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Support prioritaire 24/7
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Formation équipe complète
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Maintenance 6 mois
                    </li>
                </ul>

                <a href="{{ route('contact') }}" class="btn-plan">
                    Discuter de mon projet
                    <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>

        </div>
    </div>

    {{-- ═══ FAQ ═══ --}}
    <div class="faq-section">
        <div class="faq-container">
            <div class="faq-header">
                <h2>Questions fréquentes</h2>
                <p>Tout ce que vous devez savoir avant de commencer.</p>
            </div>

            <details class="faq-item">
                <summary>Les prix sont-ils négociables ?</summary>
                <div class="faq-content">
                    Oui, pour les projets importants (plusieurs prestations, engagement long terme) je peux adapter le devis. Contactez-moi pour discuter de votre situation.
                </div>
            </details>

            <details class="faq-item">
                <summary>Est-ce que je peux payer en plusieurs fois ?</summary>
                <div class="faq-content">
                    Oui. Le paiement se fait généralement en 2 ou 3 fois :
                    <ul>
                        <li><strong>50% à la signature</strong> (démarrage du projet)</li>
                        <li><strong>50% à la livraison</strong> (mise en ligne)</li>
                    </ul>
                    Pour les projets Sur Mesure, on peut diviser en 3-4 fois selon le planning.
                </div>
            </details>

            <details class="faq-item">
                <summary>Quels sont les délais de livraison ?</summary>
                <div class="faq-content">
                    <ul>
                        <li><strong>Starter</strong> : 2-3 semaines</li>
                        <li><strong>Business</strong> : 4-6 semaines</li>
                        <li><strong>Sur Mesure</strong> : 2-4 mois selon la complexité</li>
                    </ul>
                    Un planning précis vous sera communiqué après validation du devis.
                </div>
            </details>

            <details class="faq-item">
                <summary>L'hébergement et le domaine sont-ils vraiment inclus ?</summary>
                <div class="faq-content">
                    Oui, pour les packs Starter et Business, l'hébergement pour 1 an et le nom de domaine .com sont inclus. À partir de la 2e année, l'hébergement coûte environ 25 000 FCFA/an.
                </div>
            </details>

            <details class="faq-item">
                <summary>Que se passe-t-il après la livraison ?</summary>
                <div class="faq-content">
                    Pour le pack Business, un support de 3 mois est inclus (corrections, petites modifications). Pour le Sur Mesure, c'est 6 mois. Au-delà, un contrat de maintenance mensuel peut être mis en place.
                </div>
            </details>

            <details class="faq-item">
                <summary>Est-ce que vous travaillez avec des clients hors du Mali ?</summary>
                <div class="faq-content">
                    Oui ! Je travaille avec des clients partout en Afrique de l'Ouest et en Europe. Tout se fait à distance (visio, WhatsApp, email). Les paiements internationaux sont possibles via virement bancaire ou Wise.
                </div>
            </details>

            <details class="faq-item">
                <summary>Puis-je voir des exemples de vos réalisations ?</summary>
                <div class="faq-content">
                    Bien sûr ! Rendez-vous sur ma <a href="{{ route('projects') }}" style="color: #ff6c00; font-weight: 600;">page Réalisations</a> pour découvrir mes projets récents avec les résultats obtenus.
                </div>
            </details>
        </div>
    </div>

    {{-- ═══ CTA FINAL ═══ --}}
    <div class="pricing-cta">
        <div class="fw">
            <h2>Pas sûr du pack à choisir ?</h2>
            <p>Discutons de votre projet. Je vous conseillerai l'offre la plus adaptée à votre budget et vos objectifs.</p>
            <div class="pricing-cta-btns">
                <a href="{{ route('contact') }}" class="btn-orange">
                    <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    Demander un devis gratuit
                </a>
                <a href="https://wa.me/22366894475?text=Bonjour%20Tiefing%2C%20j%27aimerais%20discuter%20de%20mon%20projet" target="_blank" class="btn-wa">
                    <svg viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>

</div>
@endsection