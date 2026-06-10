@extends('layouts.app')

@section('title', 'Réalisations - Portfolio de projets web')
@section('meta_description', 'Découvrez mes réalisations : sites web, applications mobiles, agents IA WhatsApp au Mali.')

@section('content')


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


@endsection
