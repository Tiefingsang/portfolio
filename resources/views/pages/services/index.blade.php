@extends('layouts.app')

@section('title', 'Mes Services - Tiefing Sangare | Développeur Full Stack & Expert Digital')
@section('meta_description', 'Découvrez tous les services de Tiefing Sangare : Développement Web, E-commerce, Applications mobiles, IA, SEO, Marketing Digital, UI/UX Design et bien plus encore.')

@section('content')

<!-- Hero Section avec image de fond -->
<div class="section started" style="background: linear-gradient(135deg, rgba(58, 58, 59, 0.295) 0%, rgba(59, 59, 59, 0.308) 50%, rgba(68, 68, 68, 0.418) 100%), url('{{ asset('images/services/sb1.png') }}'); background-size: cover; background-position: center; background-attachment: fixed; padding: 120px 0; text-align: center; position: relative; overflow: hidden;">
    <!-- Effets décoratifs -->
    <div style="position: absolute; top: -50%; right: -20%; width: 500px; height: 400px; background: radial-gradient(circle, rgba(255, 108, 0, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -40%; left: -15%; width: 400px; height: 300px; background: radial-gradient(circle, rgba(255, 108, 0, 0.05) 0%, transparent 70%); border-radius: 50%;"></div>

    <!-- Overlay supplémentaire pour la lisibilité (optionnel) -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.2);"></div>

    <div class="fw" style="position: relative; z-index: 1;">
        <div class="animated fadeInUp">

            <h1 class="title" style="color: white; font-size: 48px; font-weight: 700; margin-bottom: 15px; text-shadow: 0 2px 20px rgba(0,0,0,0.2);">
                Mes Services
            </h1>
            <p style="color: rgba(255,255,255,0.95); font-size: 18px; max-width: 600px; margin: 0 auto; text-shadow: 0 1px 10px rgba(0,0,0,0.1);">
                Des solutions digitales complètes pour accompagner la transformation de votre entreprise
            </p>
        </div>
    </div>
</div>
<!-- Section Services -->
<div class="section services gray align-left" id="services-section" style="padding: 80px 0; background: #fff;">
    <div class="fw">
        <div class="titles animated" style="text-align: center; margin-bottom: 50px;">
            <div class="title" style="font-size: 36px; font-weight: 700; color: #1a1a2e;">Tous mes services</div>
            <p style="color: #666; max-width: 600px; margin: 10px auto 0; font-size: 1.1rem;">
                Découvrez l'ensemble des prestations que je propose pour vous accompagner
            </p>
        </div>

        @if($services->count() > 0)
            <div class="row" style="display: flex; flex-wrap: wrap; gap: 25px; justify-content: center;">
                @foreach($services as $service)
                <div class="col col-m-12 col-t-6 col-d-4" style="flex: 1; min-width: 280px; max-width: 380px;">
                    <div class="service-item animated" style="background: #fff; border-radius: 20px; padding: 35px 25px; text-align: center; box-shadow: 0 5px 25px rgba(0,0,0,0.06); transition: all 0.3s ease; height: 100%; border-bottom: 4px solid transparent; position: relative; overflow: hidden;">
                        <!-- Badge en haut -->
                        @if($service->is_featured)
                            <div style="position: absolute; top: 15px; right: 15px; background: #ff6c00; color: white; font-size: 10px; padding: 3px 12px; border-radius: 20px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                                ⭐ Populaire
                            </div>
                        @endif

                        <!-- Icône -->
                        <div class="circle" style="width: 80px; height: 80px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; font-size: 32px; color: white; box-shadow: 0 10px 30px rgba(255, 108, 0, 0.2); transition: transform 0.3s;">
                            {{ $service->icon ?? '🚀' }}
                        </div>

                        <div class="name" style="font-size: 20px; font-weight: 700; color: #1a1a2e; margin-bottom: 12px;">
                            {{ $service->title }}
                        </div>

                        <p style="color: #666; font-size: 15px; line-height: 1.7; margin-bottom: 20px;">
                            {{ Str::limit($service->description, 120) }}
                        </p>

                        <!-- Bouton -->
                        <a href="{{ route('services.show', $service->slug) }}"
                           style="color: #ff6c00; text-decoration: none; font-weight: 600; transition: all 0.3s; display: inline-flex; align-items: center; gap: 8px; padding: 8px 0; border-bottom: 2px solid transparent;"
                           onmouseover="this.style.borderBottomColor='#ff6c00';"
                           onmouseout="this.style.borderBottomColor='transparent';">
                            En savoir plus
                            <i class="icon ion-ios-arrow-forward" style="font-size: 16px;"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination si nécessaire -->
            @if(method_exists($services, 'links'))
                <div style="margin-top: 40px; text-align: center;">
                    {{ $services->links() }}
                </div>
            @endif

        @else
            <!-- Message si aucun service -->
            <div style="text-align: center; padding: 60px 20px;">
                <div style="font-size: 64px; margin-bottom: 20px;">🔧</div>
                <h3 style="color: #1a1a2e; font-size: 24px; margin-bottom: 10px;">Aucun service disponible</h3>
                <p style="color: #666;">Les services sont en cours de préparation. Revenez bientôt !</p>
            </div>
        @endif
    </div>
</div>

<!-- CTA Section -->
<div class="section" style="background: linear-gradient(135deg, #ff6c00, #e05a00); padding: 80px 0; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; top: -50%; right: -20%; width: 400px; height: 400px; border-radius: 50%; background: rgba(255,255,255,0.05); pointer-events: none;"></div>
    <div style="position: absolute; bottom: -30%; left: -10%; width: 300px; height: 300px; border-radius: 50%; background: rgba(255,255,255,0.03); pointer-events: none;"></div>

    <div class="fw" style="position: relative; z-index: 1;">
        <h3 style="color: white; font-size: 32px; margin-bottom: 15px; font-weight: 700;">
            🚀 Prêt à concrétiser votre projet ?
        </h3>
        <p style="color: rgba(255,255,255,0.95); font-size: 18px; max-width: 500px; margin: 0 auto 30px;">
            Discutons de vos besoins et trouvons ensemble la solution idéale.
        </p>
        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('contact') }}" style="background: white; color: #ff6c00; padding: 14px 35px; border-radius: 40px; text-decoration: none; font-weight: 600; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.1);"
               onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                Me contacter
            </a>
            <a href="https://wa.me/22366894475?text=Bonjour%20Tiefing%2C%20je%20suis%20int%C3%A9ress%C3%A9%20par%20vos%20services"
               target="_blank"
               style="background: #25D366; color: white; padding: 14px 35px; border-radius: 40px; text-decoration: none; font-weight: 600; transition: all 0.3s; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);"
               onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 30px rgba(37, 211, 102, 0.4)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(37, 211, 102, 0.3)';">
                <i class="icon ion-logo-whatsapp" style="font-size: 20px;"></i>
                WhatsApp
            </a>
        </div>
    </div>
</div>

<style>
    .service-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(255, 108, 0, 0.12) !important;
        border-bottom-color: #ff6c00 !important;
    }

    .service-item:hover .circle {
        transform: scale(1.1) rotate(-5deg);
    }

    .animated {
        opacity: 0;
        animation: fadeInUp 0.6s ease-out forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .service-item:nth-child(1) { animation-delay: 0.1s; }
    .service-item:nth-child(2) { animation-delay: 0.2s; }
    .service-item:nth-child(3) { animation-delay: 0.3s; }
    .service-item:nth-child(4) { animation-delay: 0.4s; }
    .service-item:nth-child(5) { animation-delay: 0.5s; }
    .service-item:nth-child(6) { animation-delay: 0.6s; }
</style>

@endsection
