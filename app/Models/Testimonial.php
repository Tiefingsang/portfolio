<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $fillable = [
        'author_name',
        'author_role',
        'author_avatar',
        'quote',
        'rating',
        'company',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rating'    => 'integer',
        'order'     => 'integer',
    ];

    // Scope : témoignages actifs ordonnés
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    // Accessor avatar URL
    public function getAvatarUrlAttribute(): string
    {
        if ($this->author_avatar && Storage::disk('public')->exists($this->author_avatar)) {
            return Storage::url($this->author_avatar);
        }
        // Fallback : initiale avec fond orange
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->author_name) . '&background=ff6c00&color=fff&size=200&bold=true';
    }
}
