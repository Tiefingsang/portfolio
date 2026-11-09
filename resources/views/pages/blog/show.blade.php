@extends('layouts.app')

@section('title', $post->title . ' - Blog Tiefing Sangare')
@section('meta_description', Str::limit(strip_tags($post->excerpt ?? $post->meta_description ?? $post->content), 160))
@section('og_type', 'article')
@section('og_title', $post->title)
@section('og_description', Str::limit(strip_tags($post->excerpt ?? $post->content), 160))
@section('og_image', $post->image_url)

@php
    // ✅ Avatar de l'auteur (image ou fallback)
    $authorName = $post->author ?? 'Tiefing Sangare';
    $authorAvatar = null;

    // On cherche l'utilisateur correspondant à l'auteur
    $authorUser = \App\Models\User::where('name', $authorName)->first()
                ?? \App\Models\User::where('email', 'tiefingsangare86@gmail.com')->first()
                ?? \App\Models\User::first();

    if ($authorUser && $authorUser->avatar) {
        $authorAvatar = \Storage::disk('public')->exists($authorUser->avatar)
            ? \Storage::url($authorUser->avatar)
            : asset($authorUser->avatar);
    }

    // Si pas d'avatar → fallback ui-avatars
    if (!$authorAvatar) {
        $authorAvatar = 'https://ui-avatars.com/api/?name=' . urlencode($authorName) . '&background=ff6c00&color=fff&size=200&bold=true';
    }

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
            'name' => $authorName,
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
    .article-wrapper, .article-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }
    .article-wrapper svg { flex-shrink: 0; }

    /* ═══ BARRE DE PROGRESSION ═══ */
    .reading-progress {
        position: fixed;
        top: 0;
        left: 0;
        height: 3px;
        background: linear-gradient(90deg, #ff6c00, #e05a00);
        width: 0%;
        z-index: 9999;
        transition: width 0.1s ease;
        box-shadow: 0 0 10px rgba(255, 108, 0, 0.5);
    }

    /* ═══ HERO HEADER ═══ */
    .article-hero {
        position: relative;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.92) 0%, rgba(15, 23, 42, 0.78) 100%), url('{{ $post->image_url }}');
        background-size: cover;
        background-position: center;
        padding: 120px 20px 80px;
        text-align: center;
        color: white;
        overflow: hidden;
    }
    .article-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 108, 0, 0.12) 0%, transparent 60%);
        animation: rotateGlow 25s linear infinite;
        pointer-events: none;
    }
    @keyframes rotateGlow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .article-hero-content {
        max-width: 900px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }
    .article-hero-cat {
        display: inline-block;
        background: rgba(255, 108, 0, 0.2);
        border: 1px solid rgba(255, 108, 0, 0.4);
        color: #ff6c00;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 25px;
    }
    .article-hero h1 {
        font-size: 3rem;
        font-weight: 800;
        color: white !important;
        line-height: 1.15;
        letter-spacing: -1px;
        margin-bottom: 30px;
    }
    @media (max-width: 768px) { .article-hero h1 { font-size: 1.9rem; } }

    .article-hero-meta {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
        color: rgba(255, 255, 255, 0.85);
        font-size: 14px;
        font-weight: 500;
    }
    .article-hero-meta span {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .article-hero-meta svg {
        width: 16px;
        height: 16px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* ✅ Avatar dans le hero (vraie image) */
    .author-avatar-img {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ff6c00;
        box-shadow: 0 2px 8px rgba(255, 108, 0, 0.4);
        display: inline-block;
        vertical-align: middle;
    }

    /* ═══ LAYOUT ═══ */
    .article-section {
        background: #f8fafc;
        padding: 60px 20px 80px;
    }
    .article-layout {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 50px;
        align-items: flex-start;
    }
    @media (max-width: 992px) {
        .article-layout { grid-template-columns: 1fr; gap: 40px; }
    }

    .article-main { min-width: 0; }

    /* ═══ CONTENU ARTICLE ═══ */
    .article-card {
        background: white;
        border-radius: 24px;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.05);
        border: 1px solid #f1f5f9;
        overflow: hidden;
    }
    .article-cover {
        width: 100%;
        height: 400px;
        overflow: hidden;
        background: #e2e8f0;
    }
    @media (max-width: 768px) { .article-cover { height: 220px; } }
    .article-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .article-body {
        padding: 50px;
    }
    @media (max-width: 768px) { .article-body { padding: 25px; } }

    .article-excerpt {
        font-size: 1.25rem;
        line-height: 1.7;
        color: #475569;
        font-weight: 500;
        margin-bottom: 40px;
        padding: 25px;
        background: #f8fafc;
        border-left: 4px solid #ff6c00;
        border-radius: 0 12px 12px 0;
    }
    @media (max-width: 768px) { .article-excerpt { font-size: 1.05rem; padding: 20px; } }

    /* ═══ TYPOGRAPHIE CONTENU ═══ */
    .article-content {
        font-size: 1.125rem;
        line-height: 1.8;
        color: #334155;
    }
    .article-content p { margin-bottom: 1.5rem; }
    .article-content h1 { font-size: 2.25rem; font-weight: 800; margin: 2.5rem 0 1rem; color: #0f172a !important; line-height: 1.2; }
    .article-content h2 { font-size: 1.75rem; font-weight: 700; margin: 2rem 0 1rem; color: #0f172a !important; line-height: 1.3; }
    .article-content h3 { font-size: 1.35rem; font-weight: 700; margin: 1.5rem 0 0.75rem; color: #0f172a !important; }
    .article-content a { color: #ff6c00 !important; text-decoration: underline !important; text-underline-offset: 3px; }
    .article-content strong { color: #0f172a; font-weight: 700; }
    .article-content ul { list-style-type: disc !important; padding-left: 1.5rem; margin-bottom: 1.5rem; }
    .article-content ol { list-style-type: decimal !important; padding-left: 1.5rem; margin-bottom: 1.5rem; }
    .article-content li { margin-bottom: 0.5rem; }
    .article-content blockquote {
        border-left: 4px solid #ff6c00;
        padding: 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: #475569;
        background: #f8fafc;
        border-radius: 0 12px 12px 0;
        font-size: 1.1rem;
    }
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 2rem 0;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    .article-content pre {
        background: #0f172a !important;
        color: #f8fafc !important;
        padding: 1.5rem !important;
        border-radius: 12px;
        overflow-x: auto;
        font-size: 0.9rem;
        line-height: 1.6;
    }
    .article-content code {
        background: #f1f5f9;
        color: #ef4444;
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        font-family: 'Fira Code', monospace !important;
        font-size: 0.9em;
    }
    .article-content pre code {
        background: none;
        color: inherit;
        padding: 0;
    }
    .article-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 1.5rem 0;
    }
    .article-content th, .article-content td {
        border: 1px solid #e2e8f0;
        padding: 0.75rem;
        text-align: left;
    }
    .article-content th { background: #f8fafc; font-weight: 700; color: #0f172a; }

    /* ═══ PARTAGE ═══ */
    .article-share {
        margin-top: 50px;
        padding-top: 30px;
        border-top: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }
    .article-share span {
        font-weight: 700;
        color: #0f172a;
        font-size: 14px;
    }
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
        transition: all 0.3s;
    }
    .share-btn svg {
        width: 18px;
        height: 18px;
        fill: currentColor;
    }
    .share-btn:hover {
        color: white !important;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    .share-btn.tw:hover { background: #000; }
    .share-btn.fb:hover { background: #1877F2; }
    .share-btn.li:hover { background: #0077B5; }
    .share-btn.wa:hover { background: #25D366; }

    /* ═══ SIDEBAR ═══ */
    .article-sidebar {
        position: sticky;
        top: 100px;
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
    @media (max-width: 992px) { .article-sidebar { position: static; } }

    .sidebar-widget {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid #f1f5f9;
    }
    .sidebar-title {
        font-size: 1rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .sidebar-title svg {
        width: 18px;
        height: 18px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* Widget auteur — image ronde 100x100 */
    .author-card {
        text-align: center;
    }
    .author-card .avatar-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 15px;
        display: block;
        border: 4px solid #ff6c00;
        box-shadow: 0 10px 25px rgba(255, 108, 0, 0.3);
    }
    .author-card h4 {
        font-size: 1.1rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 8px;
    }
    .author-card p {
        color: #64748b;
        font-size: 13px;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .author-card .social {
        display: flex;
        justify-content: center;
        gap: 10px;
    }
    .author-card .social a {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: #f8fafc;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #64748b !important;
        text-decoration: none !important;
        transition: all 0.2s;
    }
    .author-card .social a:hover {
        background: #ff6c00;
        color: white !important;
        transform: translateY(-2px);
    }
    .author-card .social svg {
        width: 16px;
        height: 16px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
    }

    /* Widget articles similaires */
    .related-posts {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    .related-post {
        display: flex;
        gap: 12px;
        text-decoration: none !important;
        padding-bottom: 18px;
        border-bottom: 1px solid #f1f5f9;
        transition: all 0.3s;
    }
    .related-post:last-child { padding-bottom: 0; border-bottom: none; }
    .related-post:hover { transform: translateX(4px); }
    .related-post-img {
        width: 70px;
        height: 70px;
        border-radius: 12px;
        overflow: hidden;
        flex-shrink: 0;
        background: #e2e8f0;
    }
    .related-post-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }
    .related-post:hover .related-post-img img { transform: scale(1.1); }
    .related-post-info { flex: 1; min-width: 0; }
    .related-post-date {
        font-size: 11px;
        color: #94a3b8;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
    .related-post-title {
        font-size: 14px;
        font-weight: 700;
        color: #0f172a !important;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.2s;
    }
    .related-post:hover .related-post-title { color: #ff6c00 !important; }

    /* Widget CTA */
    .cta-widget {
        background: linear-gradient(135deg, #ff6c00, #e05a00);
        color: white;
        border: none !important;
        text-align: center;
    }
    .cta-widget h4 {
        color: white !important;
        font-size: 1.2rem;
        font-weight: 800;
        margin-bottom: 12px;
    }
    .cta-widget p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .cta-widget a {
        background: white;
        color: #ff6c00 !important;
        padding: 12px 24px;
        border-radius: 30px;
        font-weight: 700;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        transition: all 0.2s;
    }
    .cta-widget a:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    .cta-widget a svg {
        width: 16px;
        height: 16px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* ═══ BACK BUTTON ═══ */
    .back-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px 40px;
    }
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        background: white;
        border: 1px solid #e2e8f0;
        color: #475569 !important;
        border-radius: 50px;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none !important;
        transition: all 0.2s;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    .back-btn:hover {
        background: #ff6c00;
        color: white !important;
        border-color: #ff6c00;
        transform: translateX(-3px);
    }
    .back-btn svg {
        width: 16px;
        height: 16px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
</style>
@endpush

@section('content')
<div class="article-wrapper">

    {{-- Barre de progression de lecture --}}
    <div class="reading-progress" id="readingProgress"></div>

    {{-- HERO HEADER --}}
    <header class="article-hero">
        <div class="article-hero-content">
            @if($post->category)
                <span class="article-hero-cat">{{ $post->category->name }}</span>
            @endif
            <h1>{{ $post->title }}</h1>
            <div class="article-hero-meta">
                <span>
                    <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    {{ $post->published_at ? $post->published_at->translatedFormat('d F Y') : $post->created_at->translatedFormat('d F Y') }}
                </span>
                <span>
                    {{-- ✅ Vraie image de l'auteur --}}
                    <img src="{{ $authorAvatar }}" alt="{{ $authorName }}" class="author-avatar-img">
                    {{ $authorName }}
                </span>
                <span>
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    {{ $post->reading_time }} min de lecture
                </span>
            </div>
        </div>
    </header>

    {{-- CONTENU --}}
    <div class="article-section">
        <div class="article-layout">

            {{-- COLONNE PRINCIPALE --}}
            <div class="article-main">
                <article class="article-card">

                    {{-- Image de couverture --}}
                    @if($post->image)
                    <div class="article-cover">
                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                    </div>
                    @endif

                    {{-- Corps --}}
                    <div class="article-body">

                        {{-- Extrait --}}
                        @if($post->excerpt)
                        <div class="article-excerpt">
                            {{ $post->excerpt }}
                        </div>
                        @endif

                        {{-- Contenu --}}
                        <div class="article-content">
                            {!! $post->content !!}
                        </div>

                        {{-- Partage --}}
                        <div class="article-share">
                            <span>Partager :</span>

                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}"
                               target="_blank" class="share-btn tw" title="Twitter / X">
                                <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>

                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                               target="_blank" class="share-btn fb" title="Facebook">
                                <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </a>

                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                               target="_blank" class="share-btn li" title="LinkedIn">
                                <svg viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                            </a>

                            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}"
                               target="_blank" class="share-btn wa" title="WhatsApp">
                                <svg viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                            </a>
                        </div>
                    </div>
                </article>

                {{-- Bouton retour --}}
                <div style="margin-top: 40px;">
                    <a href="{{ route('blog') }}" class="back-btn">
                        <svg viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        Retour au blog
                    </a>
                </div>
            </div>

            {{-- SIDEBAR --}}
            <aside class="article-sidebar">

                {{-- Widget Auteur (avec vraie image) --}}
                <div class="sidebar-widget author-card">
                    <img src="{{ $authorAvatar }}" alt="{{ $authorName }}" class="avatar-img">
                    <h4>{{ $authorName }}</h4>
                    <p>Développeur Full Stack & Expert SEO basé à Bamako, Mali.</p>
                    <div class="social">
                        <a href="https://github.com/tiefingsang" target="_blank" title="GitHub">
                            <svg viewBox="0 0 24 24"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
                        </a>
                        <a href="https://www.linkedin.com/in/tiefing-sangare" target="_blank" title="LinkedIn">
                            <svg viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                        </a>
                        <a href="https://x.com/TiefingSang/" target="_blank" title="Twitter / X">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" stroke="none"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Articles similaires --}}
                @if(isset($relatedPosts) && $relatedPosts->count() > 0)
                <div class="sidebar-widget">
                    <h3 class="sidebar-title">
                        <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                        Articles similaires
                    </h3>
                    <div class="related-posts">
                        @foreach($relatedPosts as $related)
                        <a href="{{ route('blog.show', $related->slug) }}" class="related-post">
                            <div class="related-post-img">
                                <img src="{{ $related->image_url }}" alt="{{ $related->title }}">
                            </div>
                            <div class="related-post-info">
                                <div class="related-post-date">
                                    {{ $related->published_at ? $related->published_at->translatedFormat('d M Y') : $related->created_at->translatedFormat('d M Y') }}
                                </div>
                                <div class="related-post-title">{{ $related->title }}</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- CTA --}}
                <div class="sidebar-widget cta-widget">
                    <h4>Besoin d'un site web ?</h4>
                    <p>Discutons de votre projet et trouvons la meilleure solution.</p>
                    <a href="{{ route('contact') }}">
                        Me contacter
                        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

            </aside>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const progressBar = document.getElementById('readingProgress');
    const article = document.querySelector('.article-content');

    if (progressBar && article) {
        window.addEventListener('scroll', function () {
            const articleTop = article.offsetTop;
            const articleHeight = article.offsetHeight;
            const windowHeight = window.innerHeight;
            const scrollY = window.scrollY;
            const start = articleTop - windowHeight / 2;
            const end = articleTop + articleHeight - windowHeight / 2;
            const progress = Math.min(100, Math.max(0, ((scrollY - start) / (end - start)) * 100));
            progressBar.style.width = progress + '%';
        });
    }
});
</script>
@endpush
