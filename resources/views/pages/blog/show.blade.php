@extends('layouts.app')

@section('title', $post->title . ' - Blog Tiefing Sangare')
@section('meta_description', Str::limit(strip_tags($post->excerpt ?? $post->meta_description ?? $post->content), 160))
@section('og_type', 'article')
@section('og_title', $post->title)
@section('og_description', Str::limit(strip_tags($post->excerpt ?? $post->content), 160))
@section('og_image', $post->image_url)

@php
    $jsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $post->title,
        'description' => Str::limit(strip_tags($post->excerpt ?? ''), 160),
        'image' => $post->image_url,
        'datePublished' => $post->published_at?->toIso8601String(),
        'dateModified' => $post->updated_at->toIso8601String(),
        'author' => [
            '@type' => 'Person',
            'name' => $post->author ?? 'Tiefing Sangare',
            'url' => 'https://tiefingsangare.com',
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Tiefing Sangare',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/t1.jpg'),
            ],
        ],
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => url()->current(),
        ],
    ];
@endphp

@push('head')
<script type="application/ld+json">
{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

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
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #f1f5f9;
        color: #475569 !important;
        text-decoration: none !important;
        transition: all 0.2s;
    }
    .share-btn svg {
        width: 20px;
        height: 20px;
        fill: currentColor;
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

            <!-- X / Twitter -->
            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn" title="X (Twitter)">
                <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            </a>

            <!-- Facebook -->
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="share-btn" title="Facebook">
                <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn" title="LinkedIn">
                <svg viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
            </a>

            <!-- WhatsApp -->
            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="share-btn" title="WhatsApp">
                <svg viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
            </a>
        </div>
    </div>

    <!-- Retour -->
    <div class="article-back">
        <a href="{{ route('blog') }}">
            <svg viewBox="0 0 24 24" style="width:16px; height:16px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Retour au blog
        </a>
    </div>

</div>
@endsection
