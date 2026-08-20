@extends('layouts.app')

@section('title', 'Blog - Articles sur le développement web, SEO et entrepreneuriat au Mali')
@section('meta_description', 'Découvrez les articles de Tiefing Sangare (Masasugu), développeur web et entrepreneur digital à Bamako, Mali. Conseils sur le développement web, SEO, IA WhatsApp et entrepreneuriat digital.')
@section('keywords', 'blog développement web Mali, articles SEO Mali, conseils entrepreneur digital, Tiefing Sangare blog, Masadigitale blog, développeur web Mali, entrepreneur malienne')

@section('content')

<!-- Hero Section Blog avec image de fond -->
<div class="section works align-left" style="background: linear-gradient(135deg, rgba(3, 3, 3, 0.233) 0%, rgba(8, 8, 8, 0.205) 100%), url('{{ asset('images/blogs/blog_index_b1.png') }}'); background-size: cover; background-position: center; background-attachment: fixed; padding: 100px 0;">
    <div class="fw">
        <div class="titles animated text-center">
            <div class="title" style="color: white;">Blog & Articles</div>
            <p style="color: rgba(255,255,255,0.95); max-width: 600px; margin: 20px auto 0; font-size: 18px;">
                Conseils, astuces et actualités sur le développement web, le SEO et l'entrepreneuriat digital au Mali
            </p>
        </div>
    </div>
</div>

<!-- Blog Section -->
<div class="section works align-left gray" id="blog-section">
    <div class="fw">
        <div class="row blog-items">
            @forelse($posts as $post)
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="blog-item animated" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                    <div class="image" style="height: 220px; overflow: hidden;">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            @if($post->image && Storage::disk('public')->exists($post->image))
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;">
                            @elseif($post->image)
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/blog-default.jpg') }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @endif
                        </a>
                    </div>
                    <div style="padding: 20px;">
                        <div style="margin-bottom: 10px;">
                            <span style="background: #ff6c00; color: white; font-size: 11px; padding: 4px 10px; border-radius: 20px;">{{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}</span>
                            <span style="margin-left: 10px; color: #666; font-size: 12px;">
                                <i class="icon ion-ios-person"></i> {{ $post->author }}
                            </span>
                        </div>
                        <a href="{{ route('blog.show', $post->slug) }}" class="name" style="font-size: 18px; font-weight: 600; color: #333; text-decoration: none; display: block; margin-bottom: 10px;">{{ $post->title }}</a>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 15px;">{{ Str::limit($post->excerpt, 120) }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" style="color: #ff6c00; font-weight: 500; text-decoration: none;">
                            Lire la suite <i class="icon ion-ios-arrow-forward"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <!-- Articles par défaut si aucun en base -->
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="blog-item animated" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                    <div class="image" style="height: 220px; overflow: hidden;">
                        <a href="#">
                            <img src="{{ asset('images/blog-default.jpg') }}" alt="Blog Tiefing Sangare" style="width: 100%; height: 100%; object-fit: cover;">
                        </a>
                    </div>
                    <div style="padding: 20px;">
                        <div style="margin-bottom: 10px;">
                            <span style="background: #ff6c00; color: white; font-size: 11px; padding: 4px 10px; border-radius: 20px;">{{ date('M d, Y') }}</span>
                            <span style="margin-left: 10px; color: #666; font-size: 12px;">
                                <i class="icon ion-ios-person"></i> Tiefing Sangare
                            </span>
                        </div>
                        <a href="#" class="name" style="font-size: 18px; font-weight: 600; color: #333; text-decoration: none; display: block; margin-bottom: 10px;">Pourquoi votre entreprise a besoin d'un site web professionnel</a>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 15px;">Découvrez les avantages d'avoir un site web professionnel pour votre entreprise au Mali. Boostez votre visibilité en ligne.</p>
                        <a href="#" style="color: #ff6c00; font-weight: 500; text-decoration: none;">
                            Lire la suite <i class="icon ion-ios-arrow-forward"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="blog-item animated" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                    <div class="image" style="height: 220px; overflow: hidden;">
                        <a href="#">
                            <img src="{{ asset('images/blog-default.jpg') }}" alt="SEO Mali" style="width: 100%; height: 100%; object-fit: cover;">
                        </a>
                    </div>
                    <div style="padding: 20px;">
                        <div style="margin-bottom: 10px;">
                            <span style="background: #ff6c00; color: white; font-size: 11px; padding: 4px 10px; border-radius: 20px;">{{ date('M d, Y') }}</span>
                            <span style="margin-left: 10px; color: #666; font-size: 12px;">
                                <i class="icon ion-ios-person"></i> Tiefing Sangare
                            </span>
                        </div>
                        <a href="#" class="name" style="font-size: 18px; font-weight: 600; color: #333; text-decoration: none; display: block; margin-bottom: 10px;">Les avantages du SEO pour les entreprises maliennes</a>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 15px;">Comment le référencement naturel peut transformer votre entreprise et vous faire gagner des clients qualifiés.</p>
                        <a href="#" style="color: #ff6c00; font-weight: 500; text-decoration: none;">
                            Lire la suite <i class="icon ion-ios-arrow-forward"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col col-m-12 col-t-6 col-d-4">
                <div class="blog-item animated" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                    <div class="image" style="height: 220px; overflow: hidden;">
                        <a href="#">
                            <img src="{{ asset('images/blog-default.jpg') }}" alt="IA WhatsApp Mali" style="width: 100%; height: 100%; object-fit: cover;">
                        </a>
                    </div>
                    <div style="padding: 20px;">
                        <div style="margin-bottom: 10px;">
                            <span style="background: #ff6c00; color: white; font-size: 11px; padding: 4px 10px; border-radius: 20px;">{{ date('M d, Y') }}</span>
                            <span style="margin-left: 10px; color: #666; font-size: 12px;">
                                <i class="icon ion-ios-person"></i> Tiefing Sangare
                            </span>
                        </div>
                        <a href="#" class="name" style="font-size: 18px; font-weight: 600; color: #333; text-decoration: none; display: block; margin-bottom: 10px;">Comment l'IA révolutionne le service client sur WhatsApp</a>
                        <p style="color: #666; line-height: 1.6; margin-bottom: 15px;">Découvrez comment les chatbots intelligents transforment la relation client et automatisent vos conversations.</p>
                        <a href="#" style="color: #ff6c00; font-weight: 500; text-decoration: none;">
                            Lire la suite <i class="icon ion-ios-arrow-forward"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        @if(method_exists($posts, 'links'))
        <div class="clear"></div>
        <div class="text-center mt-40">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Newsletter / CTA -->
<div class="section align-left" style="background: #ff6c00; padding: 60px 0; margin-top: 40px;">
    <div class="fw text-center">
        <h3 style="color: white; margin-bottom: 15px;">Restez informé</h3>
        <p style="color: rgba(255,255,255,0.9); max-width: 500px; margin: 0 auto 25px;">
            Recevez les derniers articles et conseils sur le développement web et le SEO
        </p>
        <div style="display: flex; max-width: 400px; margin: 0 auto;">
            <input type="email" placeholder="Votre email" style="flex: 1; padding: 12px; border: none; border-radius: 8px 0 0 8px;">
            <button style="background: #333; color: white; padding: 12px 24px; border: none; border-radius: 0 8px 8px 0; cursor: pointer;">S'abonner</button>
        </div>
        <p style="color: rgba(255,255,255,0.7); font-size: 12px; margin-top: 15px;">Pas de spam. Désabonnement à tout moment.</p>
    </div>
</div>
@endsection
