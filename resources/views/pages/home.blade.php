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
<div class="section about align-left" id="about-section">
    <div class="fw">
        <div class="text-box">
            <h1 class="animated">Je suis Tiefing Sangare, <br />Développeur Full Stack & Expert SEO <br />basé à Bamako, Mali.</h1>
            <p class="animated">
                Passionné par le développement web et les nouvelles technologies, je crée des solutions digitales
                performantes et innovantes pour les entreprises au Mali et à l'international.
                Fondateur de <strong>Masadigitale</strong>, j'accompagne mes clients dans leur transformation digitale
                avec des applications sur mesure, un design soigné et un référencement optimal.
            </p>
        </div>
        <div class="bts">
            <a href="#" class="btn extra animated">Télécharger mon CV</a>
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
