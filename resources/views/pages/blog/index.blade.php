@extends('layouts.app')

@section('title', 'Blog - Articles sur le développement web, SEO et entrepreneuriat au Mali')
@section('meta_description', 'Découvrez les articles de Tiefing Sangare, développeur web et entrepreneur digital à Bamako, Mali. Conseils sur le développement web, SEO, IA WhatsApp et entrepreneuriat.')

@push('styles')
<style>
    .blog-wrapper, .blog-wrapper * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        box-sizing: border-box;
    }
    .blog-wrapper svg { flex-shrink: 0; }

    /* ═══ HERO ═══ */
    .blog-hero {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.92) 0%, rgba(15, 23, 42, 0.75) 100%), url('{{ asset('images/blogs/blog_index_b1.png') }}');
        background-size: cover;
        background-position: center;
        padding: 100px 20px 90px;
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
    @media (max-width: 768px) { .blog-hero h1 { font-size: 2.2rem; } }
    .blog-hero p {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.85);
        max-width: 650px;
        margin: 0 auto 30px;
        line-height: 1.6;
    }

    /* ═══ BARRE DE RECHERCHE (bien visible) ═══ */
    .search-bar {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
    }
    .search-bar input {
        width: 100%;
        padding: 18px 65px 18px 55px;
        border-radius: 50px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        background: #ffffff;
        font-size: 1rem;
        color: #0f172a;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        transition: all 0.3s;
    }
    .search-bar input::placeholder {
        color: #94a3b8;
    }
    .search-bar input:focus {
        outline: none;
        border-color: #ff6c00;
        box-shadow: 0 15px 40px rgba(255, 108, 0, 0.4);
    }
    .search-bar .search-icon {
        position: absolute;
        left: 22px;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        stroke: #64748b;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        pointer-events: none;
    }
    .search-bar button {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: #ff6c00;
        border: none;
        width: 46px;
        height: 46px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.2s, background 0.2s;
        box-shadow: 0 4px 12px rgba(255, 108, 0, 0.4);
    }
    .search-bar button:hover {
        transform: translateY(-50%) scale(1.08);
        background: #e05a00;
    }
    .search-bar button svg {
        width: 20px;
        height: 20px;
        stroke: white;
        fill: none;
        stroke-width: 2.5;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* ═══ FILTRES CATÉGORIES ═══ */
    .categories-bar {
        background: white;
        border-bottom: 1px solid #e2e8f0;
        padding: 20px;
        position: sticky;
        top: 0;
        z-index: 30;
        overflow-x: auto;
        scrollbar-width: none;
    }
    .categories-bar::-webkit-scrollbar { display: none; }
    .categories-inner {
        display: flex;
        gap: 10px;
        justify-content: center;
        max-width: 1200px;
        margin: 0 auto;
        min-width: max-content;
    }
    .cat-pill {
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none !important;
        white-space: nowrap;
        transition: all 0.3s;
        background: #f8fafc;
        color: #64748b !important;
        border: 1px solid #e2e8f0;
    }
    .cat-pill:hover,
    .cat-pill.active {
        background: #ff6c00;
        color: white !important;
        border-color: #ff6c00;
        box-shadow: 0 4px 12px rgba(255, 108, 0, 0.3);
    }

    /* ═══ LAYOUT ═══ */
    .blog-section {
        background: #f8fafc;
        padding: 60px 20px 80px;
    }
    .blog-layout {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 40px;
        align-items: flex-start;
    }
    @media (max-width: 992px) {
        .blog-layout { grid-template-columns: 1fr; }
    }
    .blog-main { min-width: 0; }

    /* ═══ RÉSULTAT DE RECHERCHE ═══ */
    .search-results-info {
        background: #fff7ed;
        border: 1px solid #ffedd5;
        border-radius: 12px;
        padding: 15px 20px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }
    .search-results-info p { margin: 0; color: #92400e; font-size: 14px; }
    .search-results-info strong { color: #ff6c00; }
    .search-results-info a {
        color: #ff6c00;
        font-weight: 600;
        font-size: 13px;
        text-decoration: none;
        background: white;
        padding: 6px 14px;
        border-radius: 20px;
        transition: all 0.2s;
    }
    .search-results-info a:hover { background: #ff6c00; color: white !important; }

    /* ═══ ARTICLE EN VEDETTE ═══ */
    .featured-section { margin-bottom: 60px; }
    .featured-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #ff6c00;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 20px;
    }
    .featured-card {
        display: grid;
        grid-template-columns: 1fr 1fr;
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 10px 40px -10px rgba(15, 23, 42, 0.15);
        text-decoration: none !important;
        transition: all 0.4s;
    }
    .featured-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 25px 50px -12px rgba(255, 108, 0, 0.25);
    }
    @media (max-width: 768px) {
        .featured-card { grid-template-columns: 1fr; }
    }
    .featured-img {
        height: 380px;
        overflow: hidden;
    }
    @media (max-width: 768px) { .featured-img { height: 220px; } }
    .featured-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s;
    }
    .featured-card:hover .featured-img img { transform: scale(1.05); }

    .featured-content {
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    @media (max-width: 768px) { .featured-content { padding: 25px; } }
    .featured-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 15px;
        font-size: 13px;
        color: #64748b;
        margin-bottom: 15px;
    }
    .featured-cat {
        background: #fff7ed;
        color: #ff6c00;
        padding: 6px 14px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .featured-meta span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .featured-meta svg {
        width: 14px;
        height: 14px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
    }
    .featured-title {
        font-size: 1.9rem;
        font-weight: 800;
        color: #0f172a !important;
        line-height: 1.2;
        letter-spacing: -1px;
        margin-bottom: 15px;
    }
    @media (max-width: 768px) { .featured-title { font-size: 1.4rem; } }
    .featured-excerpt {
        font-size: 1rem;
        line-height: 1.7;
        color: #475569;
        margin-bottom: 25px;
    }
    .featured-cta {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #ff6c00 !important;
        font-weight: 700;
        font-size: 15px;
        transition: gap 0.2s;
    }
    .featured-card:hover .featured-cta { gap: 15px; }
    .featured-cta svg {
        width: 18px;
        height: 18px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* ═══ GRILLE ═══ */
    .section-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 25px;
        letter-spacing: -0.5px;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .section-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: linear-gradient(to right, #e2e8f0, transparent);
    }
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }
    @media (max-width: 600px) { .blog-grid { grid-template-columns: 1fr; } }

    .blog-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
        display: flex;
        flex-direction: column;
        border: 1px solid #f1f5f9;
        text-decoration: none !important;
    }
    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    .blog-card-img {
        height: 180px;
        overflow: hidden;
        background: #e2e8f0;
    }
    .blog-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }
    .blog-card:hover .blog-card-img img { transform: scale(1.08); }
    .blog-card-content {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .blog-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 12px;
        color: #64748b;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }
    .blog-badge {
        background: #fff7ed;
        color: #ff6c00;
        padding: 4px 10px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .blog-meta span {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .blog-meta svg {
        width: 13px;
        height: 13px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
    }
    .blog-card h3 {
        font-size: 1.1rem;
        font-weight: 800;
        color: #0f172a !important;
        margin: 0 0 10px 0;
        line-height: 1.4;
        transition: color 0.2s;
    }
    .blog-card:hover h3 { color: #ff6c00 !important; }
    .blog-card p {
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 15px;
        flex: 1;
    }
    .blog-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        padding-top: 15px;
        border-top: 1px solid #f1f5f9;
        margin-top: auto;
    }
    .blog-card-author {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: #64748b;
        font-weight: 600;
    }
    .blog-card-author svg {
        width: 14px;
        height: 14px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
    }
    .blog-card-read {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #ff6c00;
        font-weight: 700;
        font-size: 13px;
        transition: gap 0.2s;
    }
    .blog-card:hover .blog-card-read { gap: 10px; }
    .blog-card-read svg {
        width: 15px;
        height: 15px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* ═══ SIDEBAR ═══ */
    .blog-sidebar {
        position: sticky;
        top: 100px;
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
    @media (max-width: 992px) { .blog-sidebar { position: static; } }

    .sidebar-widget {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        border: 1px solid #f1f5f9;
    }
    .sidebar-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: #0f172a !important;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .sidebar-title svg {
        width: 20px;
        height: 20px;
        stroke: #ff6c00;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .sidebar-posts { display: flex; flex-direction: column; gap: 20px; }
    .sidebar-post {
        display: flex;
        gap: 12px;
        text-decoration: none !important;
        padding-bottom: 20px;
        border-bottom: 1px solid #f1f5f9;
        transition: all 0.3s;
    }
    .sidebar-post:last-child { padding-bottom: 0; border-bottom: none; }
    .sidebar-post:hover { transform: translateX(4px); }
    .sidebar-post-img {
        width: 70px;
        height: 70px;
        border-radius: 12px;
        overflow: hidden;
        flex-shrink: 0;
        background: #e2e8f0;
    }
    .sidebar-post-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }
    .sidebar-post:hover .sidebar-post-img img { transform: scale(1.1); }
    .sidebar-post-info { flex: 1; min-width: 0; }
    .sidebar-post-date {
        font-size: 11px;
        color: #94a3b8;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
    .sidebar-post-title {
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
    .sidebar-post:hover .sidebar-post-title { color: #ff6c00 !important; }

    /* ═══ PAGINATION CUSTOM ═══ */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }
    .pagination-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
        width: 100%;
        background: white;
        padding: 20px 25px;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }
    .pagination-info {
        font-size: 14px;
        color: #64748b;
        margin: 0;
    }
    .pagination-info strong {
        color: #0f172a;
        font-weight: 700;
    }
    .pagination-buttons {
        display: flex;
        gap: 6px;
        align-items: center;
        flex-wrap: wrap;
        justify-content: center;
    }
    .page-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 14px;
        border-radius: 10px;
        background: white;
        color: #475569 !important;
        text-decoration: none !important;
        font-weight: 600;
        font-size: 14px;
        border: 1px solid #e2e8f0;
        transition: all 0.2s;
        cursor: pointer;
    }
    .page-btn:hover {
        background: #fff7ed;
        color: #ff6c00 !important;
        border-color: #ffedd5;
        transform: translateY(-2px);
    }
    .page-btn.active {
        background: #ff6c00;
        color: white !important;
        border-color: #ff6c00;
        box-shadow: 0 6px 15px rgba(255, 108, 0, 0.3);
    }
    .page-btn.disabled {
        opacity: 0.4;
        cursor: not-allowed;
        pointer-events: none;
    }
    .page-btn svg {
        width: 16px;
        height: 16px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2.5;
        stroke-linecap: round;
        stroke-linejoin: round;
    }
    .page-btn.nav {
        padding: 0 12px;
    }

    @media (max-width: 640px) {
        .pagination-inner { flex-direction: column; padding: 15px; }
        .page-btn { min-width: 36px; height: 36px; font-size: 13px; padding: 0 10px; }
        .pagination-info { text-align: center; font-size: 13px; }
    }

    /* ═══ EMPTY STATE ═══ */
    .empty-state {
        text-align: center;
        padding: 80px 40px;
        background: white;
        border-radius: 20px;
        border: 1px solid #f1f5f9;
    }
    .empty-state svg {
        width: 64px;
        height: 64px;
        stroke: #cbd5e1;
        fill: none;
        stroke-width: 1.5;
        margin-bottom: 20px;
    }
    .empty-state h3 {
        color: #0f172a;
        margin-bottom: 10px;
        font-size: 1.3rem;
        font-weight: 700;
    }
    .empty-state p { color: #64748b; margin-bottom: 20px; }
    .empty-state a {
        color: #ff6c00;
        font-weight: 600;
        text-decoration: none;
    }
</style>
@endpush

@section('content')
<div class="blog-wrapper">

    {{-- HERO + RECHERCHE --}}
    <div class="blog-hero">
        <h1>Le Blog</h1>
        <p>Conseils, astuces et actualités sur le développement web, le SEO et l'entrepreneuriat digital au Mali.</p>

        <form action="{{ route('blog') }}" method="GET" class="search-bar">
            <svg class="search-icon" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text"
                   name="q"
                   value="{{ request('q') }}"
                   placeholder="Rechercher un article…"
                   autocomplete="off">
            <button type="submit" aria-label="Rechercher">
                <svg viewBox="0 0 24 24">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </button>
        </form>
    </div>

    {{-- FILTRES CATÉGORIES --}}
    @if(isset($categories) && $categories->count() > 0)
    <div class="categories-bar">
        <div class="categories-inner">
            <a href="{{ route('blog') }}" class="cat-pill {{ !isset($category) ? 'active' : '' }}">Tous les articles</a>
            @foreach($categories as $cat)
                <a href="{{ route('blog.category', $cat->slug) }}"
                   class="cat-pill {{ isset($category) && $category->id === $cat->id ? 'active' : '' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- CONTENU --}}
    <div class="blog-section">
        <div class="blog-layout">

            {{-- COLONNE PRINCIPALE --}}
            <div class="blog-main">

                {{-- Info recherche --}}
                @if(request('q'))
                <div class="search-results-info">
                    <p>
                        <strong>{{ $posts->total() }}</strong> résultat(s) pour
                        <strong>« {{ request('q') }} »</strong>
                    </p>
                    <a href="{{ route('blog') }}">✕ Effacer la recherche</a>
                </div>
                @endif

                @if(isset($posts) && $posts->count() > 0)

                    @php
                        $featuredPost = $posts->first();
                        $otherPosts = $posts->slice(1);
                    @endphp

                    {{-- ARTICLE EN VEDETTE --}}
                    @if($featuredPost && !request('q'))
                    <div class="featured-section">
                        <div class="featured-label">
                            <svg viewBox="0 0 24 24" style="width:16px; height:16px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                            À la une
                        </div>
                        <a href="{{ route('blog.show', $featuredPost->slug) }}" class="featured-card">
                            <div class="featured-img">
                                <img src="{{ $featuredPost->image_url }}" alt="{{ $featuredPost->title }}">
                            </div>
                            <div class="featured-content">
                                <div class="featured-meta">
                                    @if($featuredPost->category)
                                        <span class="featured-cat">{{ $featuredPost->category->name }}</span>
                                    @endif
                                    <span>
                                        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        {{ $featuredPost->published_at ? $featuredPost->published_at->translatedFormat('d F Y') : $featuredPost->created_at->translatedFormat('d F Y') }}
                                    </span>
                                    <span>
                                        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        {{ $featuredPost->author ?? 'Tiefing Sangare' }}
                                    </span>
                                    <span>
                                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        {{ $featuredPost->reading_time }} min
                                    </span>
                                </div>
                                <h2 class="featured-title">{{ $featuredPost->title }}</h2>
                                <p class="featured-excerpt">{{ Str::limit($featuredPost->excerpt, 150) }}</p>
                                <span class="featured-cta">
                                    Lire l'article
                                    <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </span>
                            </div>
                        </a>
                    </div>
                    @endif

                    {{-- AUTRES ARTICLES --}}
                    @if($otherPosts->count() > 0 || request('q'))
                    <h2 class="section-title">
                        @if(request('q'))
                            Résultats de recherche
                        @elseif(isset($category))
                            Dans "{{ $category->name }}"
                        @else
                            Tous les articles
                        @endif
                    </h2>
                    <div class="blog-grid">
                        @foreach((request('q') ? $posts : $otherPosts) as $post)
                        <a href="{{ route('blog.show', $post->slug) }}" class="blog-card">
                            <div class="blog-card-img">
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-meta">
                                    @if($post->category)
                                        <span class="blog-badge">{{ $post->category->name }}</span>
                                    @else
                                        <span class="blog-badge">Article</span>
                                    @endif
                                    <span>
                                        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        {{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : $post->created_at->translatedFormat('d M Y') }}
                                    </span>
                                </div>
                                <h3>{{ $post->title }}</h3>
                                <p>{{ Str::limit($post->excerpt, 90) }}</p>
                                <div class="blog-card-footer">
                                    <span class="blog-card-author">
                                        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        {{ $post->author ?? 'Tiefing Sangare' }}
                                    </span>
                                    <span class="blog-card-read">
                                        Lire
                                        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif

                    {{-- PAGINATION CUSTOM --}}
                    @if(method_exists($posts, 'links') && $posts->hasPages())
                    <div class="pagination-wrapper">
                        <div class="pagination-inner">
                            {{-- Info --}}
                            <p class="pagination-info">
                                <strong>{{ $posts->firstItem() }}</strong>–<strong>{{ $posts->lastItem() }}</strong>
                                sur <strong>{{ $posts->total() }}</strong> article(s)
                            </p>

                            {{-- Boutons --}}
                            <div class="pagination-buttons">
                                {{-- Précédent --}}
                                @if($posts->onFirstPage())
                                    <span class="page-btn nav disabled">
                                        <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                    </span>
                                @else
                                    <a href="{{ $posts->previousPageUrl() }}" class="page-btn nav">
                                        <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                    </a>
                                @endif

                                {{-- Numéros de page --}}
                                @php
                                    $currentPage = $posts->currentPage();
                                    $lastPage = $posts->lastPage();
                                    $start = max(1, $currentPage - 2);
                                    $end = min($lastPage, $currentPage + 2);
                                @endphp

                                @if($start > 1)
                                    <a href="{{ $posts->url(1) }}" class="page-btn">1</a>
                                    @if($start > 2)
                                        <span class="page-btn disabled">…</span>
                                    @endif
                                @endif

                                @for($i = $start; $i <= $end; $i++)
                                    @if($i == $currentPage)
                                        <span class="page-btn active">{{ $i }}</span>
                                    @else
                                        <a href="{{ $posts->url($i) }}" class="page-btn">{{ $i }}</a>
                                    @endif
                                @endfor

                                @if($end < $lastPage)
                                    @if($end < $lastPage - 1)
                                        <span class="page-btn disabled">…</span>
                                    @endif
                                    <a href="{{ $posts->url($lastPage) }}" class="page-btn">{{ $lastPage }}</a>
                                @endif

                                {{-- Suivant --}}
                                @if($posts->hasMorePages())
                                    <a href="{{ $posts->nextPageUrl() }}" class="page-btn nav">
                                        <svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </a>
                                @else
                                    <span class="page-btn nav disabled">
                                        <svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                @else
                    <div class="empty-state">
                        <svg viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <h3>
                            @if(request('q'))
                                Aucun résultat pour "{{ request('q') }}"
                            @else
                                Aucun article pour le moment
                            @endif
                        </h3>
                        <p>
                            @if(request('q'))
                                Essayez avec un autre mot-clé.
                            @else
                                Revenez bientôt pour découvrir de nouveaux contenus.
                            @endif
                        </p>
                        @if(request('q'))
                            <a href="{{ route('blog') }}">← Voir tous les articles</a>
                        @endif
                    </div>
                @endif
            </div>

            {{-- SIDEBAR --}}
            <aside class="blog-sidebar">
                @if(isset($latestPosts) && $latestPosts->count() > 0)
                <div class="sidebar-widget">
                    <h3 class="sidebar-title">
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        Les 5 derniers articles
                    </h3>
                    <div class="sidebar-posts">
                        @foreach($latestPosts as $latest)
                        <a href="{{ route('blog.show', $latest->slug) }}" class="sidebar-post">
                            <div class="sidebar-post-img">
                                <img src="{{ $latest->image_url }}" alt="{{ $latest->title }}">
                            </div>
                            <div class="sidebar-post-info">
                                <div class="sidebar-post-date">
                                    {{ $latest->published_at ? $latest->published_at->translatedFormat('d M Y') : $latest->created_at->translatedFormat('d M Y') }}
                                </div>
                                <div class="sidebar-post-title">{{ $latest->title }}</div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Widget CTA --}}
                <div class="sidebar-widget" style="background: linear-gradient(135deg, #ff6c00, #e05a00); color: white; border: none;">
                    <h3 style="color: white; font-size: 1.2rem; font-weight: 800; margin-bottom: 12px;">Besoin d'un site web ?</h3>
                    <p style="color: rgba(255,255,255,0.9); font-size: 14px; line-height: 1.6; margin-bottom: 20px;">Discutons de votre projet et trouvons la meilleure solution.</p>
                    <a href="{{ route('contact') }}" style="background: white; color: #ff6c00 !important; padding: 10px 20px; border-radius: 30px; font-weight: 700; text-decoration: none !important; display: inline-flex; align-items: center; gap: 8px; font-size: 14px;">
                        Me contacter
                        <svg viewBox="0 0 24 24" style="width:16px; height:16px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </aside>

        </div>
    </div>

</div>
@endsection
