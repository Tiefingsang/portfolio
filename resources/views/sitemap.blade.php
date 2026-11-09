<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- ═══════════════════════════════════════════════
         PAGES STATIQUES (dont /masasugu)
    ═══════════════════════════════════════════════ --}}
    @foreach($pages as $page)
    <url>
        <loc>{{ $page['url'] }}</loc>
        <lastmod>{{ $page['lastmod'] ?? now()->format('Y-m-d') }}</lastmod>
        <changefreq>{{ $page['changefreq'] }}</changefreq>
        <priority>{{ $page['priority'] }}</priority>
    </url>
    @endforeach

    {{-- ═══════════════════════════════════════════════
         SERVICES (pages individuelles)
    ═══════════════════════════════════════════════ --}}
    @foreach($services as $service)
    <url>
        <loc>{{ route('services.show', $service->slug) }}</loc>
        <lastmod>{{ $service->updated_at->format('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    {{-- ═══════════════════════════════════════════════
         PROJETS (études de cas)
    ═══════════════════════════════════════════════ --}}
    @foreach($projects as $project)
    <url>
        <loc>{{ route('project.show', $project->slug) }}</loc>
        <lastmod>{{ $project->updated_at->format('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    {{-- ═══════════════════════════════════════════════
         CATÉGORIES DE BLOG
    ═══════════════════════════════════════════════ --}}
    @foreach($categories as $category)
    <url>
        <loc>{{ route('blog.category', $category->slug) }}</loc>
        <lastmod>{{ $category->updated_at->format('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

    {{-- ═══════════════════════════════════════════════
         ARTICLES DE BLOG
    ═══════════════════════════════════════════════ --}}
    @foreach($posts as $post)
    <url>
        <loc>{{ route('blog.show', $post->slug) }}</loc>
        <lastmod>{{ $post->updated_at->format('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

</urlset>