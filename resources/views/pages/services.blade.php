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
            <!-- Section Services -->
<div class="section services gray align-left" id="services-section">
    <div class="fw">

        <div class="titles animated">
            <div class="title">Mes services</div>
        </div>

        <div class="row">

            <!-- Développement Web -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-browsers-outline"></i>
                    </div>
                    <div class="name">Développement Web</div>
                    <p>
                        Conception de sites web, plateformes et applications web
                        modernes, performantes et adaptées aux besoins de votre entreprise.
                    </p>
                </div>
            </div>

            <!-- E-commerce -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-cart-outline"></i>
                    </div>
                    <div class="name">E-commerce & Marketplace</div>
                    <p>
                        Création de boutiques en ligne et marketplaces avec gestion
                        des produits, commandes, paiements, livraisons et clients.
                    </p>
                </div>
            </div>

            <!-- Applications métier -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-briefcase-outline"></i>
                    </div>
                    <div class="name">Applications métier</div>
                    <p>
                        Développement de solutions sur mesure pour automatiser
                        la gestion des écoles, entreprises, commerces et organisations.
                    </p>
                </div>
            </div>

            <!-- Applications mobiles -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-social-android-outline"></i>
                    </div>
                    <div class="name">Applications mobiles</div>
                    <p>
                        Développement d'applications Android et iOS modernes
                        avec Flutter et intégration d'API et services cloud.
                    </p>
                </div>
            </div>

            <!-- SaaS -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-cloud-outline"></i>
                    </div>
                    <div class="name">SaaS & Plateformes</div>
                    <p>
                        Conception de plateformes SaaS évolutives avec gestion
                        des utilisateurs, abonnements, paiements et espaces clients.
                    </p>
                </div>
            </div>

            <!-- IA & Automatisation -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-chatbubble-outline"></i>
                    </div>
                    <div class="name">IA & Automatisation</div>
                    <p>
                        Création d'agents IA, chatbots et automatisations pour
                        améliorer le service client, les ventes et les opérations.
                    </p>
                </div>
            </div>

            <!-- SEO -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-search-strong"></i>
                    </div>
                    <div class="name">SEO & Visibilité</div>
                    <p>
                        Optimisation technique et éditoriale des sites pour
                        améliorer leur visibilité sur Google et les moteurs de recherche.
                    </p>
                </div>
            </div>

            <!-- Marketing digital -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-analytics-outline"></i>
                    </div>
                    <div class="name">Marketing Digital</div>
                    <p>
                        Stratégie digitale, réseaux sociaux, création de contenu
                        et campagnes publicitaires pour développer votre visibilité.
                    </p>
                </div>
            </div>

            <!-- UI UX -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-color-wand-outline"></i>
                    </div>
                    <div class="name">UI/UX Design</div>
                    <p>
                        Conception d'interfaces modernes, intuitives et centrées
                        sur l'expérience utilisateur et les objectifs business.
                    </p>
                </div>
            </div>

            <!-- Hébergement -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-cloud-upload-outline"></i>
                    </div>
                    <div class="name">Hébergement & Déploiement</div>
                    <p>
                        Mise en production, configuration VPS, serveurs web,
                        domaines, SSL, sauvegardes et optimisation des performances.
                    </p>
                </div>
            </div>

            <!-- Cybersécurité -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-locked-outline"></i>
                    </div>
                    <div class="name">Cybersécurité</div>
                    <p>
                        Sécurisation des applications et infrastructures,
                        bonnes pratiques, contrôle des accès, sauvegardes
                        et prévention des vulnérabilités courantes.
                    </p>
                </div>
            </div>

            <!-- Gestion de projet -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-list-outline"></i>
                    </div>
                    <div class="name">Gestion de projets numériques</div>
                    <p>
                        Analyse des besoins, planification, coordination,
                        suivi technique et accompagnement jusqu'à la mise en production.
                    </p>
                </div>
            </div>

            <!-- API & intégrations -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-shuffle-strong"></i>
                    </div>
                    <div class="name">API & Intégrations</div>
                    <p>
                        Intégration de services de paiement, WhatsApp, cartes,
                        notifications, authentification et API tierces.
                    </p>
                </div>
            </div>

            <!-- Maintenance -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="service-item animated">
                    <div class="circle">
                        <i class="icon ion-ios-settings"></i>
                    </div>
                    <div class="name">Maintenance & Support</div>
                    <p>
                        Maintenance préventive et corrective, mises à jour,
                        résolution des bugs et amélioration continue des applications.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
            @endforelse
        </div>
    </div>
</div>


@endsection
