@extends('layouts.app')

@section('title', 'À propos - ' . ($user->name ?? 'Tiefing Sangare') . ', Développeur Web Full Stack & Expert en Digitalisation des Entreprises en Afrique - Bamako, Mali')
@section('meta_description', $user->bio ?? 'Découvrez ' . ($user->name ?? 'Tiefing Sangare') . ', développeur web full stack et entrepreneur digital à Bamako, Mali. Expert en création de sites web, applications mobiles et IA WhatsApp.')
@section('keywords', 'Tiefing Sangare, développeur web Mali, Masadigitale, entrepreneur digital Mali, full stack Mali, à propos développeur')

@section('og_title', 'À propos - ' . ($user->name ?? 'Tiefing Sangare') . ', Développeur Web Full Stack au Mali')
@section('og_description', $user->bio ?? 'Découvrez mon parcours, mes compétences et ma passion pour le développement web.')
@section('og_image', $user->avatar ? Storage::url($user->avatar) : asset('images/about-og.jpg'))

@section('content')

<!-- Hero Section -->
<!-- Hero Section avec image de fond -->
<div class="section" style="background: linear-gradient(135deg, rgba(25, 26, 32, 0.452) 0%, rgba(18, 18, 19, 0.562) 100%), url('{{ asset('images/apropos/ab1.png') }}'); background-size: cover; background-position: center; padding: 120px 0; text-align: center; position: relative; overflow: hidden;">
    <!-- Effet de particules ou overlay supplémentaire (optionnel) -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.1);"></div>

    <div class="fw" style="position: relative; z-index: 1;">
        <div class="animated fadeInUp">
            <!-- Icône ou avatar (optionnel) -->
            <div style="margin-bottom: 25px;">
                <div style="width: 100px; height: 100px; border-radius: 50%; border: 4px solid rgba(255, 255, 255, 0.185); margin: 0 auto; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                    <i class="icon ion-ios-person" style="color: white; font-size: 48px;"></i>
                </div>
            </div>

            <h1 class="title" style="color: white; font-size: 52px; font-weight: 700; margin-bottom: 20px; text-shadow: 0 2px 20px rgba(0,0,0,0.2);">
                À propos de moi
            </h1>
            <p style="color: rgba(255,255,255,0.95); font-size: 18px; max-width: 600px; margin: 0 auto; text-shadow: 0 1px 10px rgba(0,0,0,0.1);">
                Découvrez mon parcours, mes compétences et ma vision du digital
            </p>
        </div>
    </div>
</div>

<!-- Section À propos -->
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
                        $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Tiefing Sangare') . '&background=ff6c00&color=fff&size=400&rounded=true&bold=true';
                    }
                @endphp
                <div class="avatar-wrapper" style="display: inline-block; position: relative;">
                    <img src="{{ $avatarUrl }}" alt="{{ $user->name ?? 'Tiefing Sangare' }}"
                         style="width: 340px; height: 340px; border-radius: 20px; object-fit: cover; border: 5px solid #ff6c00; box-shadow: 0 20px 40px rgba(0,0,0,0.15);">
                    <div style="position: absolute; bottom: 20px; right: 20px; background: #ff6c00; border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                        <i class="icon ion-ios-code" style="color: white; font-size: 28px;"></i>
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
                        <a href="https://wa.me/22366894475?text=Bonjour%20Tiefing%2C%20je%20suis%20int%C3%A9ress%C3%A9%20par%20vos%20services%20et%20j%27aimerais%20discuter%20de%20mon%20projet."
                        target="_blank"
                        class="btn"
                        style="background: #25D366; color: white; padding: 12px 30px; border-radius: 30px; text-decoration: none; font-weight: 500; transition: all 0.3s; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(37, 211, 102, 0.4)';"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 15px rgba(37, 211, 102, 0.3)';">
                            <i class="icon ion-logo-whatsapp" style="font-size: 20px;"></i>
                            WhatsApp
                        </a>
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
                            <i class="fas fa-phone" style="color: #ff6c00; font-size: 20px; width: 30px;"></i>
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
                            <i class="fas fa-building" style="color: #ff6c00; font-size: 20px; width: 30px;"></i>
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
<div class="section" style="padding: 80px 0; background: #f8f9fa;">
    <div class="fw">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px;">Mes compétences</h2>
            <p style="color: #666; max-width: 600px; margin: 0 auto;">Les technologies et services que je propose pour accompagner votre transformation digitale</p>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap;">

            <!-- Backend -->
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s, box-shadow 0.3s; margin-bottom: 25px; height: 100%;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-code" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px; font-size: 20px;">Développement Backend</h3>
                    <p style="color: #666; font-size: 14px;">Laravel, PHP, Springboot, MySQL, Node.js, API REST</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 90%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Expert</span>
                    </div>
                </div>
            </div>

            <!-- Frontend -->
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px; height: 100%;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-ios-world" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px; font-size: 20px;">Développement Frontend</h3>
                    <p style="color: #666; font-size: 14px;">React, Next.js, Tailwind CSS, Vue.js, Alpine.js, HTML5/CSS3</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 85%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Avancé</span>
                    </div>
                </div>
            </div>

            <!-- Mobile -->
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px; height: 100%;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-iphone" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px; font-size: 20px;">Applications Mobiles</h3>
                    <p style="color: #666; font-size: 14px;">Flutter, React Native, iOS, Android, Firebase</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 80%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Avancé</span>
                    </div>
                </div>
            </div>

            <!-- SEO -->
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px; height: 100%;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-ios-analytics" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px; font-size: 20px;">SEO & Référencement</h3>
                    <p style="color: #666; font-size: 14px;">Google Analytics, Search Console, Optimisation, Netlinking, Référencement local</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 85%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Expert</span>
                    </div>
                </div>
            </div>

            <!-- IA & Chatbots -->
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px; height: 100%;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="icon ion-ios-chatbubble" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px; font-size: 20px;">IA & Chatbots</h3>
                    <p style="color: #666; font-size: 14px;">OpenAI API, WhatsApp Business API, Chatbots intelligents, NLP</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 75%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Avancé</span>
                    </div>
                </div>
            </div>

            <!-- UI/UX Design -->
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px; height: 100%;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-palette" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px; font-size: 20px;">UI/UX Design</h3>
                    <p style="color: #666; font-size: 14px;">Figma, Adobe XD, Design responsive, Prototypage, Testing</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 80%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Avancé</span>
                    </div>
                </div>
            </div>

            <!-- NOUVEAU : Marketing Digital & Community Management -->
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px; height: 100%;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-bullhorn" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px; font-size: 20px;">Marketing Digital</h3>
                    <p style="color: #666; font-size: 14px;">Stratégie digitale, Community Management, Gestion de pages d'entreprise, Publicité en ligne, Social Media</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 90%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Expert</span>
                    </div>
                </div>
            </div>

            <!-- NOUVEAU : Copywriting & Création de contenu -->
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px; height: 100%;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-pen-fancy" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px; font-size: 20px;">Copywriting & Contenu</h3>
                    <p style="color: #666; font-size: 14px;">Rédaction web, Création de contenu, Copywriting, Storytelling, Rédaction SEO</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 85%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Expert</span>
                    </div>
                </div>
            </div>

            <!-- NOUVEAU : Formation & Conseil -->
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="skill-card" style="background: white; border-radius: 16px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: transform 0.3s; margin-bottom: 25px; height: 100%;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-chalkboard-teacher" style="color: white; font-size: 32px;"></i>
                    </div>
                    <h3 style="margin-bottom: 15px; font-size: 20px;">Formation & Conseil</h3>
                    <p style="color: #666; font-size: 14px;">Consultant en stratégie d'entreprise, Formation en développement web, Marketing digital, Accompagnement personnalisé</p>
                    <div style="margin-top: 20px;">
                        <div style="height: 4px; background: #e0e0e0; border-radius: 2px; overflow: hidden;">
                            <div style="width: 90%; height: 100%; background: #ff6c00; border-radius: 2px;"></div>
                        </div>
                        <span style="font-size: 12px; color: #666; margin-top: 5px; display: block;">Expert</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .skill-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(255, 108, 0, 0.12) !important;
    }
</style>

<!-- Parcours professionnel -->
<div class="section" style="padding: 80px 0; background: #f8f9fa;">
    <div class="fw">
        <div style="text-align: center; margin-bottom: 50px;">
            <span style="display: inline-block; background: #ff6c00; color: white; font-size: 12px; padding: 5px 20px; border-radius: 20px; margin-bottom: 15px; letter-spacing: 1px; text-transform: uppercase;">
                Mon Parcours
            </span>
            <h2 style="font-size: 38px; font-weight: 700; margin-bottom: 15px; color: #1a1a2e;">
                Un parcours au service de l'innovation
            </h2>
            <p style="color: #666; max-width: 600px; margin: 0 auto; font-size: 1.1rem;">
                Des études à l'entrepreneuriat, en passant par la formation continue
            </p>
        </div>

        <div class="row" style="display: flex; flex-wrap: wrap; gap: 25px; justify-content: center;">

            <!-- Formation -->
            <div class="col col-m-12 col-t-4 col-d-4" style="flex: 1; min-width: 250px; max-width: 350px;">
                <div style="background: white; border-radius: 20px; padding: 35px 25px; text-align: center; box-shadow: 0 5px 30px rgba(0,0,0,0.06); transition: transform 0.3s, box-shadow 0.3s; height: 100%; position: relative; overflow: hidden; border-bottom: 4px solid #ff6c00;">
                    <div style="position: absolute; top: -50px; right: -50px; width: 100px; height: 100px; background: rgba(255, 108, 0, 0.05); border-radius: 50%;"></div>
                    <div style="font-size: 48px; margin-bottom: 20px; display: inline-block; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; width: 80px; height: 80px; line-height: 80px; color: white; box-shadow: 0 10px 30px rgba(255, 108, 0, 0.2);">
                        🎓
                    </div>
                    <h3 style="margin-bottom: 10px; font-size: 22px; color: #1a1a2e; font-weight: 700;">Formation</h3>
                    <p style="color: #666; font-size: 14px; line-height: 1.6;">
                        <strong>Diplômé en Génie Informatique</strong><br>
                        <span style="color: #888;">+ Formations en Entrepreneuriat</span><br>
                        <span style="color: #888;">Développement Web & Technologies Digitales</span>
                    </p>
                    <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee;">
                        <span style="display: inline-block; background: #f0f0f0; color: #666; font-size: 11px; padding: 3px 12px; border-radius: 12px; margin: 3px;">🎯 Génie Informatique</span>
                        <span style="display: inline-block; background: #f0f0f0; color: #666; font-size: 11px; padding: 3px 12px; border-radius: 12px; margin: 3px;">🚀 Entrepreneuriat</span>
                        <span style="display: inline-block; background: #f0f0f0; color: #666; font-size: 11px; padding: 3px 12px; border-radius: 12px; margin: 3px;">💻 Développement Web</span>
                    </div>
                </div>
            </div>

            <!-- Expérience -->
            <div class="col col-m-12 col-t-4 col-d-4" style="flex: 1; min-width: 250px; max-width: 350px;">
                <div style="background: white; border-radius: 20px; padding: 35px 25px; text-align: center; box-shadow: 0 5px 30px rgba(0,0,0,0.06); transition: transform 0.3s, box-shadow 0.3s; height: 100%; position: relative; overflow: hidden; border-bottom: 4px solid #ff6c00;">
                    <div style="position: absolute; top: -50px; right: -50px; width: 100px; height: 100px; background: rgba(255, 108, 0, 0.05); border-radius: 50%;"></div>
                    <div style="font-size: 48px; margin-bottom: 20px; display: inline-block; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; width: 80px; height: 80px; line-height: 80px; color: white; box-shadow: 0 10px 30px rgba(255, 108, 0, 0.2);">
                        💼
                    </div>
                    <h3 style="margin-bottom: 10px; font-size: 22px; color: #1a1a2e; font-weight: 700;">Expérience</h3>
                    <p style="color: #666; font-size: 14px; line-height: 1.6;">
                        <strong>5+ ans d'expérience</strong><br>
                        <span style="color: #888;">Développement web Full Stack</span><br>
                        <span style="color: #888;">Création et accompagnement d'entreprises</span><br>
                        <span style="color: #888;">Consultant en stratégie digitale</span>
                    </p>
                    <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee;">
                        <span style="display: inline-block; background: #f0f0f0; color: #666; font-size: 11px; padding: 3px 12px; border-radius: 12px; margin: 3px;">🌐 Full Stack</span>
                        <span style="display: inline-block; background: #f0f0f0; color: #666; font-size: 11px; padding: 3px 12px; border-radius: 12px; margin: 3px;">📈 Conseil</span>
                        <span style="display: inline-block; background: #f0f0f0; color: #666; font-size: 11px; padding: 3px 12px; border-radius: 12px; margin: 3px;">🤝 Accompagnement</span>
                    </div>
                </div>
            </div>

            <!-- Vision -->
            <div class="col col-m-12 col-t-4 col-d-4" style="flex: 1; min-width: 250px; max-width: 350px;">
                <div style="background: white; border-radius: 20px; padding: 35px 25px; text-align: center; box-shadow: 0 5px 30px rgba(0,0,0,0.06); transition: transform 0.3s, box-shadow 0.3s; height: 100%; position: relative; overflow: hidden; border-bottom: 4px solid #ff6c00;">
                    <div style="position: absolute; top: -50px; right: -50px; width: 100px; height: 100px; background: rgba(255, 108, 0, 0.05); border-radius: 50%;"></div>
                    <div style="font-size: 48px; margin-bottom: 20px; display: inline-block; background: linear-gradient(135deg, #ff6c00, #e05a00); border-radius: 50%; width: 80px; height: 80px; line-height: 80px; color: white; box-shadow: 0 10px 30px rgba(255, 108, 0, 0.2);">
                        🌍
                    </div>
                    <h3 style="margin-bottom: 10px; font-size: 22px; color: #1a1a2e; font-weight: 700;">Vision</h3>
                    <p style="color: #666; font-size: 14px; line-height: 1.6;">
                        <strong>Transformer l'Afrique par le digital</strong><br>
                        <span style="color: #888;">Accompagner la transformation digitale</span><br>
                        <span style="color: #888;">des entreprises africaines</span><br>
                        <span style="color: #888;">Innovation et impact social</span>
                    </p>
                    <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee;">
                        <span style="display: inline-block; background: #f0f0f0; color: #666; font-size: 11px; padding: 3px 12px; border-radius: 12px; margin: 3px;">🌍 Afrique</span>
                        <span style="display: inline-block; background: #f0f0f0; color: #666; font-size: 11px; padding: 3px 12px; border-radius: 12px; margin: 3px;">💡 Innovation</span>
                        <span style="display: inline-block; background: #f0f0f0; color: #666; font-size: 11px; padding: 3px 12px; border-radius: 12px; margin: 3px;">🚀 Impact</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Ligne de temps ou statistiques supplémentaires -->
        <div style="margin-top: 50px; padding: 30px; background: white; border-radius: 20px; box-shadow: 0 5px 30px rgba(0,0,0,0.04);">
            <div style="display: flex; flex-wrap: wrap; justify-content: space-around; gap: 20px;">
                <div style="text-align: center;">
                    <div style="font-size: 32px; font-weight: 700; color: #ff6c00;">5+</div>
                    <div style="color: #666; font-size: 14px;">Années d'expérience</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 32px; font-weight: 700; color: #ff6c00;">15+</div>
                    <div style="color: #666; font-size: 14px;">Projets réalisés</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 32px; font-weight: 700; color: #ff6c00;">10+</div>
                    <div style="color: #666; font-size: 14px;">Entreprises accompagnées</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 32px; font-weight: 700; color: #ff6c00;">100%</div>
                    <div style="color: #666; font-size: 14px;">Satisfaction client</div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .col-m-12.col-t-4.col-d-4:hover > div {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(255, 108, 0, 0.12) !important;
    }
</style>

<!-- CTA Section -->
<div class="section" style="background: linear-gradient(135deg, #ff6c00, #e05a00); padding: 80px 0; text-align: center; position: relative; overflow: hidden;">
    <!-- Effet de fond décoratif -->
    <div style="position: absolute; top: -50%; right: -20%; width: 400px; height: 400px; border-radius: 50%; background: rgba(255,255,255,0.05); pointer-events: none;"></div>
    <div style="position: absolute; bottom: -30%; left: -10%; width: 300px; height: 300px; border-radius: 50%; background: rgba(255,255,255,0.03); pointer-events: none;"></div>

    <div class="fw" style="position: relative; z-index: 1;">
        <h3 style="color: white; font-size: 36px; margin-bottom: 15px; font-weight: 700;">
            🚀 Vous avez un projet en tête ?
        </h3>
        <p style="color: rgba(255,255,255,0.95); font-size: 18px; max-width: 550px; margin: 0 auto 30px; line-height: 1.6;">
            Discutons de vos idées et transformons-les en réalité digitale.<br>
            <span style="font-size: 16px; opacity: 0.8;">Réponse sous 24h · Devis gratuit</span>
        </p>
        <div class="bts" style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <!-- Bouton Contact -->
            <a href="{{ route('contact') }}" class="btn" style="background: white; color: #ff6c00; padding: 14px 35px; border-radius: 40px; text-decoration: none; font-weight: 600; transition: all 0.3s; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);"
               onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                <i class="icon ion-ios-mail" style="font-size: 18px;"></i>
                Me contacter
            </a>

            <!-- Bouton WhatsApp -->
            <a href="https://wa.me/22366894475?text=Bonjour%20Tiefing%2C%20je%20suis%20int%C3%A9ress%C3%A9%20par%20vos%20services%20et%20j%27aimerais%20discuter%20de%20mon%20projet."
               target="_blank"
               class="btn"
               style="background: #25D366; color: white; padding: 14px 35px; border-radius: 40px; text-decoration: none; font-weight: 600; transition: all 0.3s; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);"
               onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 30px rgba(37, 211, 102, 0.4)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(37, 211, 102, 0.3)';">
                <i class="icon ion-logo-whatsapp" style="font-size: 20px;"></i>
                WhatsApp
            </a>
        </div>

        <!-- Petite mention de disponibilité -->
        <p style="color: rgba(255,255,255,0.7); font-size: 13px; margin-top: 25px;">
            <i class="icon ion-ios-checkmark-circle" style="color: #28a745;"></i>
            Disponible pour des missions freelance · Contactez-moi dès maintenant
        </p>
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
