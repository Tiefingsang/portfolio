<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Message;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects'        => Project::count(),
            'blog_posts'      => BlogPost::count(),
            'messages'        => Message::count(),
            'unread_messages' => Message::where('is_read', false)->count(),
            'testimonials'    => Testimonial::count(),
        ];

        $recentMessages = Message::orderBy('created_at', 'desc')->limit(3)->get();
        $recentProjects = Project::orderBy('created_at', 'desc')->limit(3)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentProjects'));
    }
}
