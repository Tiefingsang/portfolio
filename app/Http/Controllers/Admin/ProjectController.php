<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order', 'asc')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'              => 'required|max:255',
            'description'        => 'required',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'technologies'       => 'nullable',
            'client'             => 'nullable',
            'project_url'        => 'nullable|url',
            'order'              => 'nullable|integer',
            'is_featured'        => 'boolean',
            'is_active'          => 'boolean',
            // Étude de cas
            'client_name'        => 'nullable|max:255',
            'client_industry'    => 'nullable|max:255',
            'problem'            => 'nullable',
            'process'            => 'nullable',
            'solution'           => 'nullable',
            'results'            => 'nullable',
            'testimonial'        => 'nullable',
            'testimonial_author' => 'nullable|max:255',
            'case_study_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'metric_value.*'     => 'nullable|string|max:50',
            'metric_label.*'     => 'nullable|string|max:100',
        ]);

        $data = [
            'title'              => $request->title,
            'slug'               => Str::slug($request->title),
            'description'        => $request->description,
            'technologies'       => $request->technologies,
            'client'             => $request->client,
            'project_url'        => $request->project_url,
            'order'              => $request->order ?? 0,
            'is_featured'        => $request->boolean('is_featured'),
            'is_active'          => $request->boolean('is_active'),
            'client_name'        => $request->client_name,
            'client_industry'    => $request->client_industry,
            'problem'            => $request->problem,
            'process'            => $request->process,
            'solution'           => $request->solution,
            'results'            => $request->results,
            'testimonial'        => $request->testimonial,
            'testimonial_author' => $request->testimonial_author,
        ];

        // Métriques (tableau de {value, label})
        $metrics = [];
        if ($request->has('metric_value') && is_array($request->metric_value)) {
            foreach ($request->metric_value as $i => $value) {
                if (!empty($value) && !empty($request->metric_label[$i])) {
                    $metrics[] = [
                        'value' => $value,
                        'label' => $request->metric_label[$i],
                    ];
                }
            }
        }
        $data['metrics'] = !empty($metrics) ? $metrics : null;

        // Image principale
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $data['image'] = $file->storeAs('projects', $name, 'public');
        }

        // Image étude de cas
        if ($request->hasFile('case_study_image')) {
            $file = $request->file('case_study_image');
            $name = time() . '_cs_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $data['case_study_image'] = $file->storeAs('projects', $name, 'public');
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet créé avec succès');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title'              => 'required|max:255',
            'description'        => 'required',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'technologies'       => 'nullable',
            'client'             => 'nullable',
            'project_url'        => 'nullable|url',
            'order'              => 'nullable|integer',
            'is_featured'        => 'boolean',
            'is_active'          => 'boolean',
            'client_name'        => 'nullable|max:255',
            'client_industry'    => 'nullable|max:255',
            'problem'            => 'nullable',
            'process'            => 'nullable',
            'solution'           => 'nullable',
            'results'            => 'nullable',
            'testimonial'        => 'nullable',
            'testimonial_author' => 'nullable|max:255',
            'case_study_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'metric_value.*'     => 'nullable|string|max:50',
            'metric_label.*'     => 'nullable|string|max:100',
        ]);

        $data = [
            'title'              => $request->title,
            'slug'               => Str::slug($request->title),
            'description'        => $request->description,
            'technologies'       => $request->technologies,
            'client'             => $request->client,
            'project_url'        => $request->project_url,
            'order'              => $request->order ?? 0,
            'is_featured'        => $request->boolean('is_featured'),
            'is_active'          => $request->boolean('is_active'),
            'client_name'        => $request->client_name,
            'client_industry'    => $request->client_industry,
            'problem'            => $request->problem,
            'process'            => $request->process,
            'solution'           => $request->solution,
            'results'            => $request->results,
            'testimonial'        => $request->testimonial,
            'testimonial_author' => $request->testimonial_author,
        ];

        // Métriques
        $metrics = [];
        if ($request->has('metric_value') && is_array($request->metric_value)) {
            foreach ($request->metric_value as $i => $value) {
                if (!empty($value) && !empty($request->metric_label[$i])) {
                    $metrics[] = [
                        'value' => $value,
                        'label' => $request->metric_label[$i],
                    ];
                }
            }
        }
        $data['metrics'] = !empty($metrics) ? $metrics : null;

        // Image principale
        if ($request->hasFile('image')) {
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            $file = $request->file('image');
            $name = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $data['image'] = $file->storeAs('projects', $name, 'public');
        }

        // Image étude de cas
        if ($request->hasFile('case_study_image')) {
            if ($project->case_study_image && Storage::disk('public')->exists($project->case_study_image)) {
                Storage::disk('public')->delete($project->case_study_image);
            }
            $file = $request->file('case_study_image');
            $name = time() . '_cs_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $data['case_study_image'] = $file->storeAs('projects', $name, 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet modifié avec succès');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }
        if ($project->case_study_image && Storage::disk('public')->exists($project->case_study_image)) {
            Storage::disk('public')->delete($project->case_study_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet supprimé avec succès');
    }
}
