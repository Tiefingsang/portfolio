<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'image', 'technologies',
        'client', 'project_url', 'order', 'is_featured', 'is_active',
        'meta_keywords', 'meta_description',
        // Nouveaux champs pour les études de cas
        'client_name', 'client_industry', 'problem', 'process', 'solution',
        'results', 'metrics', 'testimonial', 'testimonial_author', 'case_study_image',
    ];

    protected $casts = [
        'meta_keywords' => 'array',
        'is_featured'   => 'boolean',
        'is_active'     => 'boolean',
        'metrics'       => 'array',
        'order'         => 'integer',
    ];

    // Auto-génération du slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('title') && empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    // Accessor image simple
    public function getImageUrlAttribute(): string
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        }
        return asset('images/t1.jpg');
    }

    // Accessor image étude de cas (fallback sur image principale)
    public function getCaseStudyImageUrlAttribute(): ?string
    {
        if ($this->case_study_image && Storage::disk('public')->exists($this->case_study_image)) {
            return Storage::url($this->case_study_image);
        }
        return $this->image_url;
    }
}
