<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'author',
        'views',
        'is_published',
        'is_featured',          // ✅ AJOUT
        'published_at',
        'meta_keywords',
        'meta_description',
    ];

    protected $casts = [
        'meta_keywords' => 'array',
        'is_published'  => 'boolean',
        'is_featured'   => 'boolean',   // ✅ AJOUT
        'published_at'  => 'datetime',
        'views'         => 'integer',
    ];

    /* ============================================================
       AUTO-GÉNÉRATION DU SLUG
       ============================================================ */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });

        // ⚠️ On NE régénère PAS le slug si l'utilisateur a tapé un slug manuel
        // Le contrôleur gère déjà la logique du slug, donc ici on ne fait rien.
        // (ancien code supprimé car il écrasait le slug manuel)
    }

    /* ============================================================
       SCOPES
       ============================================================ */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /* ============================================================
       ACCESSORS
       ============================================================ */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            if (Storage::disk('public')->exists($this->image)) {
                return Storage::disk('public')->url($this->image);
            }
            // Fallback si le fichier n'existe plus
            return asset('storage/' . $this->image);
        }

        return asset('images/blog-default.jpg');
    }

    public function getReadingTimeAttribute(): int
    {
        $text = strip_tags($this->content ?? '');
        $words = $text ? str_word_count($text) : 0;
        return max(1, (int) ceil($words / 200));
    }

    public function getWordCountAttribute(): int
    {
        $text = strip_tags($this->content ?? '');
        return $text ? str_word_count($text) : 0;
    }
}
