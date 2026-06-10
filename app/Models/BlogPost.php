<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogPost extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'image', 'author',
        'views', 'is_published', 'published_at', 'meta_keywords', 'meta_description'
    ];

    protected $casts = [
        'meta_keywords' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime'
    ];

    // Auto-generate slug when creating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });

        static::updating(function ($post) {
            if ($post->isDirty('title') && empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->where('published_at', '<=', now());
    }

        public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Vérifier si l'image existe dans storage
            if (Storage::disk('public')->exists($this->image)) {
                return Storage::url($this->image);
            }
            // Si l'image est un chemin relatif
            return asset('storage/' . $this->image);
        }

        // Image par défaut
        return asset('images/blog-default.jpg');
    }
}
