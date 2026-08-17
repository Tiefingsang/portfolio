@extends('layouts.app')

@section('title', 'À propos - ' . ($user->name ?? 'Tiefing Sangare') . ', Développeur Web Full Stack & Entrepreneur à Bamako, Mali')
@section('meta_description', $user->bio ?? 'Découvrez ' . ($user->name ?? 'Tiefing Sangare') . ', développeur web full stack et entrepreneur digital à Bamako, Mali. Expert en création de sites web, applications mobiles et IA WhatsApp.')
@section('keywords', 'Tiefing Sangare, développeur web Mali, Masadigitale, entrepreneur digital Mali, full stack Mali, à propos développeur')

@section('og_title', 'À propos - ' . ($user->name ?? 'Tiefing Sangare') . ', Développeur Web Full Stack au Mali')
@section('og_description', $user->bio ?? 'Découvrez mon parcours, mes compétences et ma passion pour le développement web.')
@section('og_image', $user->avatar ? Storage::url($user->avatar) : asset('images/about-og.jpg'))

@section('content')

<!-- Hero Section -->
<div class="section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0; text-align: center; position: relative; overflow: hidden;">
    <div class="fw">
        <div class="animated fadeInUp">
            <h1 class="title" style="color: white; font-size: 52px; font-weight: 700; margin-bottom: 20px;">À propos de moi</h1>
            <p style="color: rgba(255,255,255,0.9); font-size: 18px; max-width: 600px; margin: 0 auto;">
                Découvrez mon parcours, mes compétences et ma vision du digital
            </p>
        </div>
    </div>
</div>

<!-- Section À propos -->
<div class="section about align-left" id="about-section" style="padding: 80px 0; background: #fff;">
    <div class="fw">
        <div class="row" style="display: flex; flex-wrap: wrap; align-items: center;">
            <!-- Colonne Avatar -->
            <div class="col col-m-12 col-t-5 col-d-5" style="text-align: center; margin-bottom: 40px;">
                @php
                    $avatarUrl = null;
                    if ($user->avatar) {
                        if (Storage::disk('public')->exists($user->avatar)) {
                            $avatarUrl = Storage::url($user->avatar);
                        } elseif (file_exists(public_path($user->avatar))) {
                            $avatarUrl = asset($user->avatar);
                        }
                    }
                    if (!$avatarUrl) {
                        $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Tiefing Sangare') . '&background=ff6c00&color=fff&size=300&rounded=true&bold=true';
                    }
                @endphp
                <div class="avatar-wrapper" style="display: inline-block; position: relative;">
                    <img src="{{ $avatarUrl }}" alt="{{ $user->name ?? 'Tiefing Sangare' }}"
                         style="width: 280px; height: 280px; border-radius: 50%; object-fit: cover; border: 5px solid #ff6c00; box-shadow: 0 20px 40px rgba(0,0,0,0.15);">
                    <div style="position: absolute; bottom: 20px; right: 20px; background: #ff6c00; border-radius: 50%; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                        <i class="icon ion-ios-code" style="color: white; font-size: 24px;"></i>
                    </div>
                </div>
            </div>

            <!-- Colonne Texte -->
            <div class="col col-m-12 col-t-7 col-d-7">
                <div class="text-box" style="padding-left: 20px;">
                    <div style="display: inline-block; background: #ff6c00; color: white; font-size: 12px; padding: 5px 15px; border-radius: 20px; margin-bottom: 20px;">
                        Développeur Full Stack
                    </div>
                    <h1 style="font-size: 42px; margin-bottom: 20px; color: #222; font-weight: 700;">
                        Je suis <span style="color: #ff6c00;">{{ $user->name ?? 'Tiefing Sangare' }}</span>
                    </h1>
                    <h3 style="font-size: 22px; color: #666; margin-bottom: 25px; font-weight: 400;">
                        {{ $user->title ?? 'Développeur Full Stack & Expert SEO' }}<br>
                        basé à <span style="color: #ff6c00;">{{ $user->location ?? 'Bamako, Mali' }}</span>
                    </h3>

                    <p style="font-size: 16px; line-height: 1.8; color: #555; margin-bottom: 25px;">
                        {{ $user->bio ?? 'Développeur web passionné et entrepreneur digital basé à Bamako, Mali.' }}
                    </p>

                    <p style="font-size: 16px; line-height: 1.8; color: #555; margin-bottom: 30px;">
                        {{ $user->about ?? 'Passionné par le développement web et les nouvelles technologies, je crée des solutions digitales performantes et innovantes pour les entreprises au Mali et à l\'international. Fondateur de Masadigitale, j\'accompagne mes clients dans leur transformation digitale avec des applications sur mesure, un design soigné et un référencement optimal.' }}
                    </p>

                    <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                        <a href="{{ route('contact') }}" class="btn" style="background: #ff6c00; color: white; padding: 12px 30px; border-radius: 30px; text-decoration: none; font-weight: 500; transition: all 0.3s;">
                             Me contacter
                        </a>
                        {{-- <a href="#" class="btn" style="background: transparent; border: 2px solid #ff6c00; color: #ff6c00; padding: 12px 30px; border-radius: 30px; text-decoration: none; font-weight: 500; transition: all 0.3s;">
                             Télécharger mon CV
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Informations Personnelles -->
<div class="section" style="padding: 60px 0; background: #f8f9fa;">
    <div class="fw">
        <div class="row">
            <div class="col col-m-12 col-t-6 col-d-6">
                <div style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); height: 100%;">
                    <h3 style="margin-bottom: 25px; color: #222; font-size: 24px;">
                        <span style="background: #ff6c00; width: 8px; height: 8px; display: inline-block; border-radius: 50%; margin-right: 10px;"></span>
                        Informations personnelles
                    </h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 20px; display: flex; align-items: flex-start;">
                            <i class="icon ion-ios-person" style="color: #ff6c00; font-size: 20px; width: 30px;"></i>
                            <div>
                                <strong>Nom complet</strong><br>
                                <span style="color: #666;">{{ $user->name ?? 'Tiefing Sangare' }}</span>
                            </div>
                        </li>
                        <li style="margin-bottom: 20px; display: flex; align-items: flex-start;">
                            <i class="icon ion-ios-email" style="color: #ff6c00; font-size: 20px; width: 30px;"></i>
                            <div>
                                <strong>Email</strong><br>
                                <a href="mailto:{{ $user->email }}" style="color: #666; text-decoration: none;">{{ $user->email }}</a>
                            </div>
                        </li>
                        @if($user->phone)
                        <li style="margin-bottom: 20px; display: flex; align-items: flex-start;">
                            <i class="icon ion-ios-call" style="color: #ff6c00; font-size: 20px; width: 30px;"></i>
                            <div>
                                <strong>Téléphone</strong><br>
                                <a href="tel:{{ $user->phone }}" style="color: #666; text-decoration: none;">{{ $user->phone }}</a>
                            </div>
                        </li>
                        @endif
                        @if($user->location)
                        <li style="margin-bottom: 20px; display: flex; align-items: flex-start;">
                            <i class="icon ion-ios-location" style="color: #ff6c00; font-size: 20px; width: 30px;"></i>
                            <div>
                                <strong>Localisation</strong><br>
                                <span style="color: #666;">{{ $user->location }}</span>
                            </div>
                        </li>
                        @endif
                        @if($user->company)
                        <li style="margin-bottom: 20px; display: flex; align-items: flex-start;">
                            <i class="icon ion-ios-business" style="color: #ff6c00; font-size: 20px; width: 30px;"></i>
                            <div>
                                <strong>Entreprise</strong><br>
                                <span style="color: #666;">{{ $user->company }}</span>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col col-m-12 col-t-6 col-d-6">
                <div style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); height: 100%;">
                    <h3 style="margin-bottom: 25px; color: #222; font-size: 24px;">
                        <span style="background: #ff6c00; width: 8px; height: 8px; display: inline-block; border-radius: 50%; margin-right: 10px;"></span>
                        📱 Me suivre
                    </h3>
                    <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 30px;">
                        @if($user->github)
                        <a href="{{ $user->github }}" target="_blank" style="background: #333; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.3s;">
                            <i class="icon ion-social-github" style="font-size: 24px;"></i>
                        </a>
                        @endif
                        @if($user->linkedin)
                        <a href="{{ $user->linkedin }}" target="_blank" style="background: #0077B5; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.3s;">
                            <i class="icon ion-social-linkedin" style="font-size: 24px;"></i>
                        </a>
                        @endif
                        @if($user->twitter)
                        <a href="{{ $user->twitter }}" target="_blank" style="background: #1DA1F2; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.3s;">
                            <i class="icon ion-social-twitter" style="font-size: 24px;"></i>
                        </a>
                        @endif
                        @if($user->facebook)
                        <a href="{{ $user->facebook }}" target="_blank" style="background: #1877F2; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.3s;">
                            <i class="icon ion-social-facebook" style="font-size: 24px;"></i>
                        </a>
                        @endif
                        @if($user->instagram)
                        <a href="{{ $user->instagram }}" target="_blank" style="background: #E4405F; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.3s;">
                            <i class="icon ion-social-instagram" style="font-size: 24px;"></i>
                        </a>
                        @endif
                        @if($user->youtube)
                        <a href="{{ $user->youtube }}" target="_blank" style="background: #FF0000; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.3s;">
                            <i class="icon ion-social-youtube" style="font-size: 24px;"></i>
                        </a>
                        @endif
                    </div>

                    <div style="margin-top: 20px;">
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid #eee;">
                            <span style="color: #666;">Disponibilité</span>
                            <span style="color: #28a745; font-weight: 500;">✔️ Disponible</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid #eee;">
                            <span style="color: #666;">Expérience</span>
                            <span style="color: #333; font-weight: 500;">5+ ans</span>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 15px 0;">
                            <span style="color: #666;">Projets réalisés</span>
                            <span style="color: #333; font-weight: 500;">15+ projets</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Compétences -->
<div class="section" style="padding: 80px 0;">
    <div class="fw">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px;">Mes compétences techniques</h2>
            <p style="color: #666; max-width: 600px; margin: 0 auto;">Les technologies que j'utilise pour créer des solutions digitales performantes</p>
        </div>
        <div class="row">
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-ios-code" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;">Backend</h3>
                    <p style="color: #666;">Laravel, PHP, Springboot MySQL, Node.js, API REST</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 90%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Expert</span>
                    </div>
                </div>
            </div>
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-ios-world" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;">Frontend</h3>
                    <p style="color: #666;">React, Next.js, Tailwind CSS, Vue.js, Alpine.js, HTML5/CSS3</p>
                    <div style="margin-top: 20px;">
                        <div style="heicolorght: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 85%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Avancé</span>
                    </div>
                </div>
            </div>
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-ios-phone-portrait" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;">Mobile</h3>
                    <p style="color: #666;">Flutter, React Native, iOS, Android, Firebase</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 80%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Avancé</span>
                    </div>
                </div>
            </div>
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-ios-analytics" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;">SEO</h3>
                    <p style="color: #666;">Google Analytics, Search Console, Optimisation, Netlinking, Référencement local</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 85%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Expert</span>
                    </div>
                </div>
            </div>
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-ios-chatbubble" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;">IA & Chatbots</h3>
                    <p style="color: #666;">OpenAI API, WhatsApp Business API, Chatbots intelligents, NLP</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 75%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Avancé</span>
                    </div>
                </div>
            </div>
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-ios-color-palette" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px;">UI/UX</h3>
                    <p style="color: #666;">Figma, Adobe XD, Design responsive, Prototypage, Testing</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 80%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Avancé</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Parcours professionnel -->
<div class="section" style="padding: 60px 0; background: #f8f9fa;">
    <div class="fw">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px;">Mon parcours</h2>
            <p style="color: #666; max-width: 600px; margin: 0 auto;">Quelques étapes clés de mon parcours professionnel</p>
        </div>
        <div class="row">
            <div class="col col-m-12 col-t-4 col-d-4">
                <div style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                    <div style="font-size: 48px; margin-bottom: 15px;"></div>
                    <h3 style="margin-bottom: 10px;">Formation</h3>
                    <p style="color: #666;">Diplômé en Développement Web et Technologies Digitales</p>
                </div>
            </div>
            <div class="col col-m-12 col-t-4 col-d-4">
                <div style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                    <div style="font-size: 48px; margin-bottom: 15px;"></div>
                    <h3 style="margin-bottom: 10px;">Expérience</h3>
                    <p style="color: #666;">Plus de 5 ans dans le développement web et la création d'entreprises</p>
                </div>
            </div>
            <div class="col col-m-12 col-t-4 col-d-4">
                <div style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                    <div style="font-size: 48px; margin-bottom: 15px;"></div>
                    <h3 style="margin-bottom: 10px;">Vision</h3>
                    <p style="color: #666;">Accompagner la transformation digitale des entreprises maliennes</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="section" style="background: linear-gradient(135deg, #ff6c00, #e05a00); padding: 80px 0; text-align: center;">
    <div class="fw">
        <h3 style="color: white; font-size: 32px; margin-bottom: 20px;">Vous avez un projet en tête ?</h3>
        <p style="color: rgba(255,255,255,0.9); font-size: 18px; max-width: 500px; margin: 0 auto 30px;">
            Discutons de vos idées et transformons-les en réalité digitale.
        </p>
        <div class="bts">
            <a href="{{ route('contact') }}" class="btn" style="background: white; color: #ff6c00; padding: 14px 35px; border-radius: 40px; text-decoration: none; font-weight: 600; transition: all 0.3s;">
                 Me contacter
            </a>
        </div>
    </div>
</div>

<style>
    .skill-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .social-icon:hover {
        transform: scale(1.1);
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
    .animated {
        animation: fadeInUp 0.6s ease-out;
    }
</style>

<!-- Schema.org pour Personne -->


@if(session('success'))
<script>
    // Afficher une notification de succès
    alert("{{ session('success') }}");
</script>
@endif

@endsection
