@extends('layouts.app')

@section('title', 'Tiefing Sangare | Développeur Full Stack & Expert SEO au Mali')
@section('meta_description', 'Portfolio officiel de Tiefing Sangare, développeur web Full Stack et fondateur de Masadigitale à Bamako, Mali. Création de sites web, applications, solutions IA et référencement SEO.')

@section('content')

<!-- HERO SECTION -->
<div class="section started">
    <div class="slide" style="background-image: url({{ asset('images/t1.jpg') }});"></div>
    <div class="centrize full-width">
        <div class="vertical-center">
            <div class="st-title align-center">
                <div class="typing-title">
                    <p>Laravel / React</p>
                    <p>Développement Full Stack</p>
                    <p>Expert SEO</p>
                    <p>Applications Mobiles</p>
                    <p>IA & Chatbots</p>
                    <p>UI/UX Design</p>
                </div>
                <span class="typed-title"></span>
            </div>
        </div>
    </div>
    <a href="#about-section" class="mouse-btn"><i class="icon ion ion-chevron-down"></i></a>
</div>

<!-- Section À propos -->
<div class="section about align-left" id="about-section" style="padding: 80px 0; background: #fff;">
    <div class="fw">
        <div class="row" style="display: flex; flex-wrap: wrap; align-items: center; gap: 40px;">

            <!-- Colonne Avatar - Image agrandie -->
            <div class="col col-m-12 col-t-5 col-d-5" style="text-align: center; flex: 1; min-width: 300px;">
                <div class="avatar-wrapper" style="display: inline-block; position: relative;">
                    <img src="{{ $user->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Tiefing Sangare') . '&background=ff6c00&color=fff&size=500' }}"
                         alt="{{ $user->name ?? 'Tiefing Sangare' }}"
                         style="width: 100%; max-width: 500px; height: auto; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.15); display: block; margin: 0 auto;">
                    <div style="position: absolute; bottom: 20px; right: 20px; background: #ff6c00; border-radius: 50%; width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
                        <i class="icon ion-ios-code" style="color: white; font-size: 32px;"></i>
                    </div>
                </div>
            </div>

            <!-- Colonne Texte -->
            <div class="col col-m-12 col-t-7 col-d-7" style="flex: 2; min-width: 300px;">
                <div class="text-box">
                    <div style="display: inline-block; background: #ff6c00; color: white; font-size: 12px; padding: 5px 20px; border-radius: 20px; margin-bottom: 20px; letter-spacing: 1px; text-transform: uppercase;">
                        {{ $user->title ?? 'Développeur Full Stack & Expert SEO' }}
                    </div>

                    <h1 style="font-size: 42px; margin-bottom: 20px; color: #1a1a2e; font-weight: 700; line-height: 1.2;">
                        Je suis <span style="color: #ff6c00;">{{ $user->name ?? 'Tiefing Sangare' }}</span>
                        <br />
                        <span style="font-size: 28px; font-weight: 500; color: #555;">
                            {{ $user->title ?? 'Développeur Full Stack & Expert SEO' }}
                        </span>
                        <br />
                        <span style="font-size: 20px; font-weight: 400; color: #888;">
                            basé à {{ $user->location ?? 'Bamako, Mali' }}
                        </span>
                    </h1>

                    <p style="font-size: 16px; line-height: 1.8; color: #555; margin-bottom: 20px;">
                        {{ $user->bio ?? 'Développeur web passionné et entrepreneur digital basé à Bamako, Mali.' }}
                    </p>

                    <p style="font-size: 16px; line-height: 1.8; color: #555; margin-bottom: 30px;">
                        {{ $user->about ?? 'Passionné par le développement web et les nouvelles technologies, je crée des solutions digitales performantes et innovantes pour les entreprises au Mali et à l\'international. Fondateur de Masadigitale, j\'accompagne mes clients dans leur transformation digitale avec des applications sur mesure, un design soigné et un référencement optimal.' }}
                    </p>

                    <!-- Boutons -->
                    <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                        <a href="{{ route('contact') }}" class="btn" style="background: #ff6c00; color: white; padding: 12px 30px; border-radius: 30px; text-decoration: none; font-weight: 500; transition: all 0.3s; display: inline-flex; align-items: center; gap: 10px;"
                           onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 30px rgba(255, 108, 0, 0.3)';"
                           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                            <i class="icon ion-ios-chatbubble"></i>
                            Me contacter
                        </a>

                        @if($user->cv_url || $user->resume_url)
                            <a href="{{ $user->cv_url ?? $user->resume_url }}" class="btn" target="_blank" style="background: transparent; border: 2px solid #ff6c00; color: #ff6c00; padding: 12px 30px; border-radius: 30px; text-decoration: none; font-weight: 500; transition: all 0.3s; display: inline-flex; align-items: center; gap: 10px;"
                               onmouseover="this.style.background='#ff6c00'; this.style.color='white';"
                               onmouseout="this.style.background='transparent'; this.style.color='#ff6c00';">
                                <i class="icon ion-ios-download"></i>
                                Télécharger mon CV
                            </a>
                        @endif

                        <a href="https://wa.me/22366894475?text=Bonjour%20Tiefing%2C%20je%20suis%20int%C3%A9ress%C3%A9%20par%20vos%20services"
                           target="_blank"
                           class="btn"
                           style="background: #25D366; color: white; padding: 12px 30px; border-radius: 30px; text-decoration: none; font-weight: 500; transition: all 0.3s; display: inline-flex; align-items: center; gap: 10px;"
                           onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 30px rgba(37, 211, 102, 0.3)';"
                           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                            <i class="icon ion-logo-whatsapp" style="font-size: 18px;"></i>
                            WhatsApp
                        </a>
                    </div>

                    <!-- Réseaux sociaux -->
                    @if($user->social_links && count($user->social_links) > 0)
                        <div style="margin-top: 30px; padding-top: 25px; border-top: 1px solid #eee;">
                            <p style="color: #888; font-size: 14px; margin-bottom: 15px;">Suivez-moi sur les réseaux</p>
                            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                                @foreach($user->social_links as $social)
                                    <a href="{{ $social['url'] }}" target="_blank"
                                       style="display: inline-flex; align-items: center; gap: 8px; background: {{ $social['color'] }}; color: white; padding: 8px 18px; border-radius: 25px; text-decoration: none; font-size: 13px; transition: all 0.3s;"
                                       onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.2)';"
                                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                        <i class="{{ $social['icon'] }}"></i>
                                        {{ $social['name'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
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

<!-- Portfolio / Réalisations -->
<div class="section works align-left" id="works-section">
    <div class="fw">
        <div class="titles animated">
            <div class="title">Projets récents</div>
        </div>
        <div class="filters animated">
            <div class="f_btn active">
                <label><input type="radio" name="fl_radio" value="box-item" />Tous</label>
            </div>
            @php
                $categories = $projects->pluck('category')->unique()->filter();
            @endphp
            @foreach($categories as $cat)
            <div class="f_btn">
                <label><input type="radio" name="fl_radio" value="f-{{ Str::slug($cat) }}" />{{ $cat }}</label>
            </div>
            @endforeach
        </div>
        <div class="row box-items">
            @forelse($projects as $project)
            <div class="col col-m-12 col-t-6 col-d-6 box-item f-{{ Str::slug($project->category ?? 'projet') }}">
                <div class="item animated">
                    <div class="desc">
                        <div class="image">
                            <a href="#popup-{{ $project->id }}" class="has-popup">
                                @if($project->image)
                                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                                @else
                                    <img src="{{ asset('images/t1.jpg') }}" alt="{{ $project->title }}">
                                @endif
                            </a>
                        </div>
                        <div class="category">{{ $project->category ?? 'Projet' }}</div>
                        <div class="name">
                            <a href="#popup-{{ $project->id }}" class="has-popup">{{ $project->title }}</a>
                        </div>
                    </div>
                </div>
                <div id="popup-{{ $project->id }}" class="popup-box mfp-fade mfp-hide">
                    <div class="content">
                        <div class="image">
                            @if($project->image)
                                <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                            @endif
                        </div>
                        <div class="desc">
                            <div class="category">{{ $project->category ?? 'Projet' }}</div>
                            <h4>{{ $project->title }}</h4>
                            <p>{{ $project->description }}</p>
                            @if($project->technologies)
                                <p><strong>Technologies :</strong> {{ $project->technologies }}</p>
                            @endif
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" class="btn">Voir le projet</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col col-m-12">
                <p class="text-center">Aucun projet pour le moment.</p>
            </div>
            @endforelse
        </div>
        <div class="clear"></div>
    </div>
</div>

<!-- Blog -->
<div class="section works align-left gray" id="blog-section">
    <div class="fw">
        <div class="titles animated">
            <div class="title">Derniers articles</div>
        </div>
        <div class="row blog-items">
            @forelse($posts as $post)
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="blog-item animated">
                    <div class="image">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            @if($post->image)
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                            @else
                                <img src="{{ asset('images/t1.jpg') }}" alt="{{ $post->title }}">
                            @endif
                        </a>
                    </div>
                    <a href="{{ route('blog.show', $post->slug) }}" class="name">{{ $post->title }}</a>
                    <p>{{ Str::limit($post->excerpt, 100) }}</p>
                    <div class="date">{{ $post->author }} - {{ $post->published_at ? $post->published_at->format('d F Y') : '' }}</div>
                </div>
            </div>
            @empty
            <div class="col col-m-12">
                <div class="blog-item animated">
                    <div class="image">
                        <a href="#"><img src="{{ asset('images/t1.jpg') }}" alt="Article 1"></a>
                    </div>
                    <a href="#" class="name">Pourquoi votre entreprise a besoin d'un site web professionnel</a>
                    <p>Découvrez les avantages d'avoir un site web professionnel pour votre entreprise au Mali.</p>
                    <div class="date">Tiefing Sangare - {{ date('d F Y') }}</div>
                </div>
            </div>
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="blog-item animated">
                    <div class="image">
                        <a href="#"><img src="{{ asset('images/t1.jpg') }}" alt="Article 2"></a>
                    </div>
                    <a href="#" class="name">Les avantages du SEO pour les entreprises maliennes</a>
                    <p>Comment le référencement naturel peut transformer votre entreprise et vous faire gagner des clients qualifiés.</p>
                    <div class="date">Tiefing Sangare - {{ date('d F Y') }}</div>
                </div>
            </div>
            <div class="col col-m-12 col-t-4 col-d-4">
                <div class="blog-item animated">
                    <div class="image">
                        <a href="#"><img src="{{ asset('images/t1.jpg') }}" alt="Article 3"></a>
                    </div>
                    <a href="#" class="name">Comment l'IA révolutionne le service client sur WhatsApp</a>
                    <p>Découvrez comment les chatbots intelligents transforment la relation client.</p>
                    <div class="date">Tiefing Sangare - {{ date('d F Y') }}</div>
                </div>
            </div>
            @endforelse
        </div>
        <div class="clear"></div>
        <div class="text-center mt-30">
            <a href="{{ route('blog') }}" class="btn">Voir tous les articles</a>
        </div>
    </div>
</div>

<!-- Section Contact -->
<div class="section contacts align-left" id="contact-section">
    <div class="fw">
        <div class="titles animated">
            <div class="title">Contactez-moi</div>
        </div>
        <div class="contact-form">
            @if(session('success'))
            <div class="alert-success">
                <p>{{ session('success') }}</p>
            </div>
            @endif
            @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
            <form id="cform" method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div class="row">
                    <div class="col col-m-12 col-t-6 col-d-6 animated">
                        <div class="value">
                            <input type="text" name="name" placeholder="Nom *" required value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col col-m-12 col-t-6 col-d-6 animated">
                        <div class="value">
                            <input type="tel" name="phone" placeholder="Téléphone (optionnel)" value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="col col-m-12 col-t-6 col-d-6 animated">
                        <div class="value">
                            <input type="email" name="email" placeholder="Email *" required value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="col col-m-12 col-t-6 col-d-6 animated">
                        <div class="value">
                            <input type="text" name="subject" placeholder="Sujet *" required value="{{ old('subject') }}">
                        </div>
                    </div>
                    <div class="col col-m-12 col-t-12 col-d-12 animated">
                        <div class="value">
                            <textarea name="message" placeholder="Message *" required>{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="col col-m-12 col-t-12 col-d-12 animated">
                        <button type="submit" class="btn">Envoyer le message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Typed.js initialization
        if($('.typed-title').length && $('.typing-title').length) {
            var typed_strings = $('.typing-title').text();
            var typed = new Typed('.typed-title', {
                strings: typed_strings.split(','),
                typeSpeed: 80,
                loop: true,
                backDelay: 1500,
                backSpeed: 40
            });
            $('.typing-title').remove();
        }

        // Masonry filter initialization
        if($('.box-items').length) {
            var grid = $('.box-items').masonry({
                itemSelector: '.box-item',
                columnWidth: '.box-item',
                percentPosition: true
            });

            grid.imagesLoaded().progress(function() {
                grid.masonry('layout');
            });

            $('.filters input').on('change', function() {
                var selector = $(this).val();
                $('.box-items').masonry({
                    filter: '.' + selector
                });
            });
        }
    });
</script>
@endpush
