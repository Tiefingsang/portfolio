<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\BlogPost;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $pages = [
            ['url' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['url' => route('about'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('services'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['url' => route('projects'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => route('blog'), 'priority' => '0.8', 'changefreq' => 'daily'],
            ['url' => route('contact'), 'priority' => '0.7', 'changefreq' => 'monthly'],
        ];

        $projects = Project::where('is_active', true)->get();
        $posts = BlogPost::where('is_published', true)->get();

        return response()->view('sitemap', compact('pages', 'projects', 'posts'))
                         ->header('Content-Type', 'application/xml');
    }
}
