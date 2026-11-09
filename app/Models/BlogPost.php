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
        'is_featured',
        'published_at',
        'meta_keywords',
        'meta_description',
        'meta_title',     
        'category',        
        'tags',            
        'category_id',
    ];

    protected $casts = [
        'meta_keywords' => 'array',
        'is_published'  => 'boolean',
        'is_featured'   => 'boolean',
        'published_at'  => 'datetime',
        'views'         => 'integer',
        'tags'          => 'array',  
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            if (Storage::disk('public')->exists($this->image)) {
                return Storage::disk('public')->url($this->image);
            }
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}