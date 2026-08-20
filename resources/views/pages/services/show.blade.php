@extends('layouts.app')

@section('title', $service->meta_title ?? $service->title . ' - Tiefing Sangare')
@section('meta_description', $service->meta_description ?? $service->description)

@section('content')

<!-- Hero Section avec image de fond -->
<div class="section started" style="background: linear-gradient(135deg, rgba(7, 7, 7, 0.205) 0%, rgba(2, 2, 2, 0.205) 50%, rgba(13, 13, 14, 0.137) 100%), url('{{ asset('images/t1.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; padding: 100px 0; text-align: center; position: relative; overflow: hidden;">
    <!-- Effets décoratifs -->
    <div style="position: absolute; top: -50%; right: -20%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(255, 108, 0, 0.1) 0%, transparent 70%); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -30%; left: -10%; width: 300px; height: 300px; background: radial-gradient(circle, rgba(255, 108, 0, 0.05) 0%, transparent 70%); border-radius: 50%;"></div>

    <!-- Overlay supplémentaire pour la lisibilité -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.2);"></div>

    <div class="fw" style="position: relative; z-index: 1;">
        <div class="animated fadeInUp">
            @if($service->icon)
                <div style="font-size: 64px; margin-bottom: 20px; display: inline-block; background: linear-gradient(135deg, #ff6c00, #e05a00); width: 100px; height: 100px; border-radius: 50%; line-height: 100px; color: white; box-shadow: 0 10px 40px rgba(255, 108, 0, 0.3);">
                    {{ $service->icon }}
                </div>
            @endif
            <h1 class="title" style="color: white; font-size: 42px; font-weight: 700; margin-bottom: 15px; text-shadow: 0 2px 20px rgba(0,0,0,0.2);">
                {{ $service->title }}
            </h1>
            <p style="color: rgba(255,255,255,0.95); font-size: 18px; max-width: 600px; margin: 0 auto; text-shadow: 0 1px 10px rgba(0,0,0,0.1);">
                {{ $service->description }}
            </p>
        </div>
    </div>
</div>

<!-- Section Détails du service -->
<div class="section about align-left" style="padding: 80px 0; background: #fff;">
    <div class="fw">
        <div class="row" style="display: flex; flex-wrap: wrap; gap: 40px;">

            <!-- Colonne de gauche : Description et contenu -->
            <div class="col col-m-12 col-t-7 col-d-7" style="flex: 1; min-width: 300px;">
                <div class="text-box">
                    <div style="display: inline-block; background: #ff6c00; color: white; font-size: 12px; padding: 5px 20px; border-radius: 20px; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px;">
                        Service
                    </div>
                    <h2 style="font-size: 32px; margin-bottom: 25px; color: #1a1a2e; font-weight: 700;">
                        {{ $service->title }}
                    </h2>

                    @if($service->full_description)
                        <div style="font-size: 16px; line-height: 1.8; color: #555; margin-bottom: 30px;">
                            {!! nl2br(e($service->full_description)) !!}
                        </div>
                    @else
                        <p style="font-size: 16px; line-height: 1.8; color: #555; margin-bottom: 30px;">
                            {{ $service->description }}
                        </p>
                    @endif

                    <!-- Bouton d'action -->
                    @if($service->button_link)
                        <a href="{{ $service->button_link }}" class="btn" style="background: #ff6c00; color: white; padding: 14px 35px; border-radius: 40px; text-decoration: none; font-weight: 600; transition: all 0.3s; display: inline-block;"
                           onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 30px rgba(255, 108, 0, 0.3)';"
                           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                            {{ $service->button_text ?? 'En savoir plus' }}
                            <i class="icon ion-ios-arrow-forward" style="margin-left: 8px;"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Colonne de droite : Image et informations -->
            <div class="col col-m-12 col-t-5 col-d-5" style="flex: 1; min-width: 250px;">
                <!-- Image -->
                @if($service->image)
                    <div style="margin-bottom: 30px;">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                             style="width: 100%; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                    </div>
                @endif

                <!-- Caractéristiques -->
                <!-- Caractéristiques -->
@php
    // Décoder les features si c'est une chaîne JSON
    $features = $service->features;
    if (is_string($features)) {
        $features = json_decode($features, true);
    }
    if (!is_array($features)) {
        $features = [];
    }
@endphp

@if(!empty($features) && count($features) > 0)
    <div style="background: #f8f9fa; border-radius: 20px; padding: 30px; border-left: 4px solid #ff6c00;">
        <h3 style="font-size: 18px; font-weight: 700; color: #1a1a2e; margin-bottom: 20px;">
            ✨ Caractéristiques
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0;">
            @foreach($features as $feature)
                <li style="display: flex; align-items: flex-start; gap: 12px; padding: 8px 0; border-bottom: 1px solid rgba(0,0,0,0.05);">
                    <svg style="width: 20px; height: 20px; color: #ff6c00; flex-shrink: 0; margin-top: 2px;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span style="color: #555; font-size: 15px;">{{ $feature }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endif

                <!-- Informations de contact -->
                <div style="margin-top: 30px; background: linear-gradient(135deg, #1a1a2e, #16213e); border-radius: 20px; padding: 30px; text-align: center; color: white;">
                    <h3 style="color: white; font-size: 18px; margin-bottom: 10px;">💬 Discutons de votre projet</h3>
                    <p style="color: rgba(255,255,255,0.8); font-size: 14px; margin-bottom: 20px;">
                        Vous avez besoin de plus d'informations ? Contactez-moi dès maintenant.
                    </p>
                    <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
                        <a href="{{ route('contact') }}" style="background: #ff6c00; color: white; padding: 10px 25px; border-radius: 30px; text-decoration: none; font-weight: 500; transition: all 0.3s; display: inline-block;"
                           onmouseover="this.style.transform='scale(1.05)';"
                           onmouseout="this.style.transform='scale(1)';">
                            Me contacter
                        </a>
                        <a href="https://wa.me/22366894475?text=Bonjour%20Tiefing%2C%20je%20suis%20int%C3%A9ress%C3%A9%20par%20le%20service%20{{ urlencode($service->title) }}"
                           target="_blank"
                           style="background: #25D366; color: white; padding: 10px 25px; border-radius: 30px; text-decoration: none; font-weight: 500; transition: all 0.3s; display: inline-flex; align-items: center; gap: 8px;"
                           onmouseover="this.style.transform='scale(1.05)';"
                           onmouseout="this.style.transform='scale(1)';">
                            <i class="icon ion-logo-whatsapp" style="font-size: 18px;"></i>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Services connexes -->
@if($relatedServices->count() > 0)
<div class="section services gray align-left" style="padding: 80px 0; background: #f8f9fa;">
    <div class="fw">
        <div class="titles animated" style="text-align: center; margin-bottom: 50px;">
            <div class="title" style="font-size: 32px;">Autres services</div>
            <p style="color: #666; max-width: 500px; margin: 10px auto 0;">Découvrez mes autres services pour accompagner votre projet</p>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px;">
            @foreach($relatedServices as $related)
            <div class="col col-m-12 col-t-6 col-d-4" style="flex: 1; min-width: 200px;">
                <div class="service-item animated" style="background: white; border-radius: 16px; padding: 30px 20px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s, box-shadow 0.3s; height: 100%; border-bottom: 3px solid #ff6c00;">
                    @if($related->icon)
                        <div style="font-size: 40px; margin-bottom: 15px;">{{ $related->icon }}</div>
                    @endif
                    <div class="name" style="font-size: 18px; font-weight: 600; margin-bottom: 10px; color: #1a1a2e;">{{ $related->title }}</div>
                    <p style="color: #666; font-size: 14px; line-height: 1.6; margin-bottom: 15px;">{{ Str::limit($related->description, 100) }}</p>
                    <a href="{{ route('services.show', $related->slug) }}" style="color: #ff6c00; text-decoration: none; font-weight: 500; transition: color 0.3s; display: inline-flex; align-items: center; gap: 5px;"
                       onmouseover="this.style.color='#e05a00';"
                       onmouseout="this.style.color='#ff6c00';">
                        En savoir plus <i class="icon ion-ios-arrow-forward" style="font-size: 14px;"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- CTA Section -->
<div class="section" style="background: linear-gradient(135deg, #ff6c00, #e05a00); padding: 80px 0; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; top: -50%; right: -20%; width: 400px; height: 400px; border-radius: 50%; background: rgba(255,255,255,0.05); pointer-events: none;"></div>
    <div style="position: absolute; bottom: -30%; left: -10%; width: 300px; height: 300px; border-radius: 50%; background: rgba(255,255,255,0.03); pointer-events: none;"></div>

    <div class="fw" style="position: relative; z-index: 1;">
        <h3 style="color: white; font-size: 32px; margin-bottom: 15px; font-weight: 700;">
            🚀 Prêt à démarrer votre projet ?
        </h3>
        <p style="color: rgba(255,255,255,0.95); font-size: 18px; max-width: 500px; margin: 0 auto 30px;">
            Discutons de vos idées et je vous propose une solution sur mesure.
        </p>
        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('contact') }}" style="background: white; color: #ff6c00; padding: 14px 35px; border-radius: 40px; text-decoration: none; font-weight: 600; transition: all 0.3s;"
               onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                Me contacter
            </a>
        </div>
    </div>
</div>

<style>
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
    .service-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(255, 108, 0, 0.12) !important;
    }
</style>

@endsection
