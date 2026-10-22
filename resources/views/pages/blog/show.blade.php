@extends('layouts.app')

@section('title', $post->title . ' - Blog Tiefing Sangare')
@section('meta_description', Str::limit(strip_tags($post->excerpt ?? $post->meta_description ?? $post->content), 160))

@push('styles')
<style>
    /* Anti-conflit global */
    .article-wrapper, .article-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
    }

    /* En-tête */
    .article-header {
        background: #f8fafc;
        padding: 80px 20px 60px;
        text-align: center;
    }
    .article-meta-top {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        font-size: 13px;
        color: #64748b;
        margin-bottom: 24px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
    }
    .article-header h1 {
        font-size: 3rem;
        font-weight: 800;
        color: #0f172a !important;
        line-height: 1.2;
        max-width: 900px;
        margin: 0 auto;
        letter-spacing: -1px;
    }

    /* Image */
    .article-cover {
        max-width: 1000px;
        margin: -30px auto 50px;
        padding: 0 20px;
        position: relative;
        z-index: 10;
    }
    .article-cover img {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        border-radius: 16px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    /* Contenu */
    .article-body {
        max-width: 760px;
        margin: 0 auto;
        padding: 0 20px 80px;
    }
    .article-excerpt {
        font-size: 1.25rem;
        line-height: 1.7;
        color: #475569;
        font-weight: 500;
        margin-bottom: 40px;
        padding-bottom: 30px;
        border-bottom: 1px solid #e2e8f0;
    }

    /* Typographie TinyMCE */
    .article-content {
        font-size: 1.125rem;
        line-height: 1.8;
        color: #334155;
    }
    .article-content p { margin-bottom: 1.5rem; }
    .article-content h1 { font-size: 2.25rem; font-weight: 800; margin: 2.5rem 0 1rem; color: #0f172a !important; }
    .article-content h2 { font-size: 1.75rem; font-weight: 700; margin: 2rem 0 1rem; color: #0f172a !important; }
    .article-content h3 { font-size: 1.35rem; font-weight: 700; margin: 1.5rem 0 0.75rem; color: #0f172a !important; }
    .article-content a { color: #ff6c00 !important; text-decoration: underline !important; text-underline-offset: 3px; }
    .article-content ul { list-style-type: disc !important; padding-left: 1.5rem; margin-bottom: 1.5rem; }
    .article-content ol { list-style-type: decimal !important; padding-left: 1.5rem; margin-bottom: 1.5rem; }
    .article-content li { margin-bottom: 0.5rem; }
    .article-content blockquote {
        border-left: 4px solid #ff6c00;
        padding: 1rem 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: #475569;
        background: #f8fafc;
        border-radius: 0 8px 8px 0;
    }
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 2rem 0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .article-content pre {
        background: #0f172a !important;
        color: #f8fafc !important;
        padding: 1.5rem !important;
        border-radius: 12px;
        overflow-x: auto;
    }
    .article-content code {
        background: #f1f5f9;
        color: #ef4444;
        padding: 0.2rem 0.4rem;
        border-radius: 4px;
        font-family: monospace !important;
    }

    /* Partage */
    .article-share {
        margin-top: 60px;
        padding-top: 30px;
        border-top: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .article-share span { font-weight: 600; color: #64748b; font-size: 14px; }
    .share-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #f1f5f9;
        color: #475569 !important;
        text-decoration: none !important;
        transition: all 0.2s;
        font-size: 18px;
    }
    .share-btn:hover {
        background: #ff6c00;
        color: white !important;
        transform: translateY(-3px);
    }

    /* Retour */
    .article-back {
        text-align: center;
        padding: 40px 0 80px;
    }
    .article-back a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        background: white;
        border: 1px solid #cbd5e1;
        color: #475569 !important;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none !important;
        transition: all 0.2s;
    }
    .article-back a:hover { background: #f8fafc; color: #0f172a !important; }

    @media (max-width: 768px) {
        .article-header h1 { font-size: 2rem; }
        .article-meta-top { flex-direction: column; gap: 6px; }
        .article-content { font-size: 1rem; }
    }
</style>
@endpush

@section('content')
<div class="article-wrapper">

    <!-- En-tête -->
    <header class="article-header">
        <div class="article-meta-top">
            <span>{{ $post->published_at ? $post->published_at->translatedFormat('d F Y') : $post->created_at->translatedFormat('d F Y') }}</span>
            <span>•</span>
            <span>{{ $post->reading_time }} min de lecture</span>
            <span>•</span>
            <span>Par {{ $post->author ?? 'Tiefing Sangare' }}</span>
        </div>
        <h1>{{ $post->title }}</h1>
    </header>

    <!-- Image -->
    @if($post->image)
    <div class="article-cover">
        <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
    </div>
    @endif

    <!-- Contenu -->
    <div class="article-body">
        @if($post->excerpt)
        <div class="article-excerpt">
            {{ $post->excerpt }}
        </div>
        @endif

        <div class="article-content">
            {!! $post->content !!}
        </div>

        <!-- Partage -->
        <div class="article-share">
            <span>Partager :</span>
            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn">
                <i class="icon ion-social-twitter"></i>
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="share-btn">
                <i class="icon ion-social-facebook"></i>
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn">
                <i class="icon ion-social-linkedin"></i>
            </a>
            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="share-btn">
                <i class="icon ion-social-whatsapp"></i>
            </a>
        </div>
    </div>

    <!-- Retour -->
    <div class="article-back">
        <a href="{{ route('blog') }}">
            <i class="icon ion-ios-arrow-back"></i> Retour au blog
        </a>
    </div>

</div>
@endsection
