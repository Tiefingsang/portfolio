@extends('layouts.app')

@section('title', 'Mes Services - Tiefing Sangare | Développeur Full Stack & Expert Digital')
@section('meta_description', 'Découvrez tous les services de Tiefing Sangare : Développement Web, E-commerce, Applications mobiles, IA, SEO, Marketing Digital, UI/UX Design et bien plus encore.')

@push('styles')
<style>
    /* Anti-conflit : force la police moderne sur toute la page */
    .services-wrapper, .services-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }

    /* --- HERO SECTION --- */
    .services-hero {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.7) 100%), url('{{ asset('images/services/sb1.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 120px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .services-hero h1 {
        color: white !important;
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: -1px;
    }
    .services-hero p {
        color: rgba(255, 255, 255, 0.85);
        font-size: 1.2rem;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* --- SECTION SERVICES --- */
    .services-section {
        background: #f8fafc;
        padding: 80px 20px;
    }
    .services-header {
        text-align: center;
        margin-bottom: 60px;
    }
    .services-header h2 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 15px;
        letter-spacing: -0.5px;
    }
    .services-header p {
        color: #64748b;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }

    /* --- GRILLE --- */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* --- CARTE SERVICE --- */
    .service-card {
        background: white;
        border-radius: 20px;
        padding: 40px 30px;
        text-align: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        display: flex;
        flex-direction: column;
        border: 1px solid #f1f5f9;
        height: 100%;
    }
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(255, 108, 0, 0.15), 0 10px 10px -5px rgba(255, 108, 0, 0.05);
        border-color: #ffedd5;
    }

    /* Badge */
    .service-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: #ff6c00;
        color: white;
        font-size: 11px;
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 10px rgba(255, 108, 0, 0.3);
    }

    /* Icône */
    .service-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        border-radius: 20px; /* Forme squircle moderne au lieu de rond */
        margin: 0 auto 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        color: white;
        box-shadow: 0 10px 20px rgba(255, 108, 0, 0.2);
        transition: transform 0.3s ease;
    }
    .service-card:hover .service-icon {
        transform: scale(1.1) rotate(5deg);
    }

    /* Titre */
    .service-card h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #0f172a !important;
        margin-bottom: 15px;
        line-height: 1.3;
    }

    /* Texte */
    .service-card p {
        color: #475569;
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 25px;
        flex: 1;
    }

    /* Bouton */
    .service-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        color: #ff6c00 !important;
        font-weight: 600;
        text-decoration: none !important;
        padding: 10px 20px;
        border-radius: 8px;
        background: #fff7ed;
        transition: all 0.2s;
        margin-top: auto;
        font-size: 15px;
    }
    .service-btn:hover {
        background: #ff6c00;
        color: white !important;
        gap: 12px;
    }

    /* --- CTA SECTION --- */
    .services-cta {
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        padding: 80px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .services-cta h2 {
        color: white !important;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 15px;
    }
    .services-cta p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto 40px;
    }
    .cta-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .cta-btn-primary {
        background: white;
        color: #ff6c00 !important;
        padding: 14px 35px;
        border-radius: 40px;
        text-decoration: none !important;
        font-weight: 700;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .cta-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    .cta-btn-wa {
        background: #25D366;
        color: white !important;
        padding: 14px 35px;
        border-radius: 40px;
        text-decoration: none !important;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
    }
    .cta-btn-wa:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(37, 211, 102, 0.4);
    }

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }
</style>
@endpush

@section('content')
<div class="services-wrapper">

    <!-- Hero -->
    <div class="services-hero">
        <div class="fw">
            <h1 class="animated">Mes Services</h1>
            <p class="animated">Des solutions digitales complètes pour accompagner la transformation de votre entreprise.</p>
        </div>
    </div>

    <!-- Grille de services -->
    <div class="services-section">
        <div class="services-header">
            <h2>Tous mes services</h2>
            <p>Découvrez l'ensemble des prestations que je propose pour vous accompagner dans vos projets.</p>
        </div>

        @if($services->count() > 0)
            <div class="services-grid">
                @foreach($services as $service)
                <div class="service-card">
                    @if($service->is_featured)
                        <div class="service-badge">⭐ Populaire</div>
                    @endif

                    <div class="service-icon">
                        {{-- Si tu as des icônes FontAwesome ou SVG, remplace l'émoji par la classe adéquate --}}
                        {!! $service->icon ?? '🚀' !!}
                    </div>

                    <h3>{{ $service->title }}</h3>
                    <p>{{ Str::limit($service->description, 120) }}</p>

                    <a href="{{ route('services.show', $service->slug) }}" class="service-btn">
                        En savoir plus <i class="icon ion-ios-arrow-forward"></i>
                    </a>
                </div>
                @endforeach
            </div>

            @if(method_exists($services, 'links'))
                <div class="pagination-wrapper">
                    {{ $services->links() }}
                </div>
            @endif

        @else
            <div style="text-align: center; padding: 60px 20px; background: white; border-radius: 20px; max-width: 600px; margin: 0 auto;">
                <div style="font-size: 64px; margin-bottom: 20px;">🔧</div>
                <h3 style="color: #0f172a; font-size: 24px; margin-bottom: 10px;">Aucun service disponible</h3>
                <p style="color: #64748b;">Les services sont en cours de préparation. Revenez bientôt !</p>
            </div>
        @endif
    </div>

    <!-- CTA -->
    <div class="services-cta">
        <div class="fw">
            <h2>Prêt à concrétiser votre projet ?</h2>
            <p>Discutons de vos besoins et trouvons ensemble la solution idéale pour votre entreprise.</p>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="cta-btn-primary">
                    Me contacter
                </a>
                <a href="https://wa.me/22366894475?text=Bonjour%20Tiefing%2C%20je%20suis%20int%C3%A9ress%C3%A9%20par%20vos%20services"
                   target="_blank"
                   class="cta-btn-wa">
                    <i class="icon ion-logo-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
