<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Service;
use App\Models\Category;

class SitemapController extends Controller
{
    public function index()
    {
        // ═══════════════════════════════════════════════
        // PAGES STATIQUES (routes fixes)
        // ═══════════════════════════════════════════════
        $pages = [
            ['url' => route('home'),       'priority' => '1.0', 'changefreq' => 'weekly',  'lastmod' => now()->format('Y-m-d')],
            ['url' => route('about'),      'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => now()->format('Y-m-d')],
            ['url' => route('services'),   'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => now()->format('Y-m-d')],
            ['url' => route('projects'),   'priority' => '0.9', 'changefreq' => 'weekly',  'lastmod' => now()->format('Y-m-d')],
            ['url' => route('blog'),       'priority' => '0.8', 'changefreq' => 'daily',   'lastmod' => now()->format('Y-m-d')],
            ['url' => route('pricing'),    'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => now()->format('Y-m-d')],
            ['url' => route('process'),    'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => now()->format('Y-m-d')],
            ['url' => route('contact'),    'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => now()->format('Y-m-d')],

            // ═══════════════════════════════════════════════
            // ✅ NOUVELLE PAGE : Masasugu (entreprise)
            // ═══════════════════════════════════════════════
            ['url' => route('masasugu'),   'priority' => '0.9', 'changefreq' => 'weekly',  'lastmod' => now()->format('Y-m-d')],
        ];

        // ═══════════════════════════════════════════════
        // DONNÉES DYNAMIQUES
        // ═══════════════════════════════════════════════
        $projects  = Project::where('is_active', true)->latest('updated_at')->get();
        $posts     = BlogPost::where('is_published', true)
                        ->where('published_at', '<=', now())
                        ->latest('updated_at')
                        ->get();
        $services  = Service::where('is_active', true)->latest('updated_at')->get();
        $categories = Category::where('is_active', true)->get();

        return response()->view('sitemap', compact('pages', 'projects', 'posts', 'services', 'categories'))
                         ->header('Content-Type', 'application/xml');
    }
}