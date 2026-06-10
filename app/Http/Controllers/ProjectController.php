<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_active', true)
            ->orderBy('order')
            ->paginate(9);
       // dd($projects);
        return view('pages.projects.index', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $otherProjects = Project::where('is_active', true)
            ->where('id', '!=', $project->id)
            ->limit(3)
            ->get();

        return view('pages.projects.show', compact('project', 'otherProjects'));
    }
}
