@extends('layouts.app')

@section('title', 'Tiefing Sangare | Développeur Full Stack & Expert SEO au Mali')
@section('meta_description', 'Portfolio officiel de Tiefing Sangare, développeur web Full Stack et fondateur de Masadigitale à Bamako, Mali. Création de sites web, applications, solutions IA et référencement SEO.')

@section('content')


<!-- Section Services -->
<div class="section services gray align-left" id="services-section">
    <div class="fw">
        <div class="titles animated">
            <div class="title">Ce que je fais</div>
        </div>
        <div class="row">
            @forelse($services as $service)
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle"><i class="icon {{ $service->icon_class ?? 'ion-ios-browsers-outline' }}"></i></div>
                    <div class="name">{{ $service->title }}</div>
                    <p>{{ $service->description }}</p>
                </div>
            </div>
            @empty
            <div class="col col-m-12">
                <div class="service-item animated">
                    <div class="circle"><i class="icon ion-ios-browsers-outline"></i></div>
                    <div class="name">Création de sites web</div>
                    <p>Création de sites vitrine, e-commerce et applications web sur mesure avec Laravel et React.</p>
                </div>
            </div>
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle"><i class="icon ion-social-android-outline"></i></div>
                    <div class="name">Applications mobiles</div>
                    <p>Développement d'applications iOS et Android avec Flutter et React Native.</p>
                </div>
            </div>
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle"><i class="icon ion-ios-chatbubble-outline"></i></div>
                    <div class="name">Agent IA WhatsApp</div>
                    <p>Chatbot intelligent pour automatiser vos conversations 24h/24 et 7j/7.</p>
                </div>
            </div>
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle"><i class="icon ion-ios-analytics-outline"></i></div>
                    <div class="name">Référencement SEO</div>
                    <p>Optimisation de votre visibilité sur Google et les moteurs de recherche.</p>
                </div>
            </div>
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle"><i class="icon ion-ios-color-wand-outline"></i></div>
                    <div class="name">UI/UX Design</div>
                    <p>Design d'interfaces modernes et intuitives pour une expérience utilisateur optimale.</p>
                </div>
            </div>
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle"><i class="icon ion-ios-settings"></i></div>
                    <div class="name">Maintenance technique</div>
                    <p>Support et maintenance de vos applications web et mobiles.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>


@endsection
