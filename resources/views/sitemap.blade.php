<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($pages as $page)
    <url>
        <loc>{{ $page['url'] }}</loc>
        <priority>{{ $page['priority'] }}</priority>
        <changefreq>{{ $page['changefreq'] }}</changefreq>
    </url>
    @endforeach

    @foreach($projects as $project)
    <url>
        <loc>{{ route('project.show', $project->slug) }}</loc>
        <lastmod>{{ $project->updated_at->format('Y-m-d') }}</lastmod>
        <priority>0.7</priority>
        <changefreq>monthly</changefreq>
    </url>
    @endforeach

    @foreach($posts as $post)
    <url>
        <loc>{{ route('blog.show', $post->slug) }}</loc>
        <lastmod>{{ $post->updated_at->format('Y-m-d') }}</lastmod>
        <priority>0.6</priority>
        <changefreq>weekly</changefreq>
    </url>
    @endforeach
</urlset>
