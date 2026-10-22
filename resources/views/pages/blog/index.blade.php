@extends('layouts.app')

@section('title', 'Blog - Articles sur le développement web, SEO et entrepreneuriat au Mali')
@section('meta_description', 'Découvrez les articles de Tiefing Sangare (Masasugu), développeur web et entrepreneur digital à Bamako, Mali. Conseils sur le développement web, SEO, IA WhatsApp et entrepreneuriat digital.')

@push('styles')
<style>
    /* Force la police moderne sur tout le blog */
    .blog-wrapper, .blog-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
    }

    /* Hero */
    .blog-hero {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(15, 23, 42, 0.7) 100%), url('{{ asset('images/blogs/blog_index_b1.png') }}');
        background-size: cover;
        background-position: center;
        padding: 100px 20px;
        text-align: center;
        color: white;
    }
    .blog-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 15px;
        color: white !important;
        letter-spacing: -1px;
    }
    .blog-hero p {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.85);
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Grille */
    .blog-section {
        background: #f8fafc;
        padding: 80px 0;
    }
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Carte */
    .blog-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        border: 1px solid #f1f5f9;
    }
    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .blog-card-img {
        height: 200px;
        width: 100%;
        overflow: hidden;
        background: #e2e8f0; /* Placeholder si pas d'image */
        position: relative;
    }
    .blog-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .blog-card:hover .blog-card-img img {
        transform: scale(1.05);
    }
    .blog-card-content {
        padding: 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .blog-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 13px;
        color: #64748b;
        margin-bottom: 16px;
        flex-wrap: wrap;
    }
    .blog-badge {
        background: #fff7ed;
        color: #ff6c00 !important;
        padding: 4px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 12px;
    }
    .blog-card h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #0f172a !important;
        margin: 0 0 12px 0;
        line-height: 1.4;
    }
    .blog-card h3 a {
        color: inherit !important;
        text-decoration: none !important;
        transition: color 0.2s;
    }
    .blog-card h3 a:hover {
        color: #ff6c00 !important;
    }
    .blog-card p {
        color: #475569;
        line-height: 1.6;
        margin-bottom: 20px;
        flex: 1;
        font-size: 15px;
    }
    .blog-card-btn {
        color: #ff6c00 !important;
        font-weight: 600;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 15px;
        margin-top: auto;
        transition: gap 0.2s;
    }
    .blog-card-btn:hover {
        gap: 10px;
    }

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 50px;
        padding: 0 20px;
    }
</style>
@endpush

@section('content')
<div class="blog-wrapper">

    <!-- Hero -->
    <div class="blog-hero">
        <h1 class="animated">Le Blog</h1>
        <p class="animated">Conseils, astuces et actualités sur le développement web, le SEO et l'entrepreneuriat digital au Mali.</p>
    </div>

    <!-- Grille -->
    <div class="blog-section">
        <div class="blog-grid">
            @forelse($posts as $post)
            <article class="blog-card">
                <div class="blog-card-img">
                    <a href="{{ route('blog.show', $post->slug) }}">
                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                    </a>
                </div>
                <div class="blog-card-content">
                    <div class="blog-meta">
                        <span class="blog-badge">
                            {{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : $post->created_at->translatedFormat('d M Y') }}
                        </span>
                        <span><i class="icon ion-ios-clock"></i> {{ $post->reading_time }} min</span>
                    </div>
                    <h3><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
                    <p>{{ Str::limit($post->excerpt, 100) }}</p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="blog-card-btn">
                        Lire la suite <i class="icon ion-ios-arrow-forward"></i>
                    </a>
                </div>
            </article>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 60px; background: white; border-radius: 16px;">
                <h3 style="color: #0f172a; margin-bottom: 10px;">Aucun article pour le moment</h3>
                <p style="color: #64748b;">Revenez bientôt pour découvrir de nouveaux contenus.</p>
            </div>
            @endforelse
        </div>

        @if(method_exists($posts, 'links'))
        <div class="pagination-wrapper">
            {{ $posts->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
