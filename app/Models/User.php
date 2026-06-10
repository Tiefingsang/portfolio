<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'phone',
        'bio',
        'about',
        'title',
        'company',
        'location',
        'youtube',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'github',
        'gitlab',
        'bitbucket',
        'tiktok',
        'snapchat',
        'pinterest',
        'reddit',
        'twitch',
        'discord',
        'telegram',
        'whatsapp',
        'signal',
        'medium',
        'devto',
        'hashnode',
        'stackoverflow',
        'producthunt',
        'dribbble',
        'behance',
        'figma',
        'portfolio_url',
        'blog_url',
        'cv_url',
        'resume_url',
        'calendly_url',
        'role',
        'is_active',
        'show_social',
        'settings',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'show_social' => 'boolean',
        'settings' => 'array',
    ];

    // Récupérer tous les réseaux sociaux actifs
    public function getSocialLinksAttribute()
    {
        $socials = [];

        $networks = [
            'youtube' => ['icon' => 'fab fa-youtube', 'color' => '#FF0000', 'name' => 'YouTube'],
            'facebook' => ['icon' => 'fab fa-facebook', 'color' => '#1877F2', 'name' => 'Facebook'],
            'twitter' => ['icon' => 'fab fa-twitter', 'color' => '#1DA1F2', 'name' => 'Twitter'],
            'instagram' => ['icon' => 'fab fa-instagram', 'color' => '#E4405F', 'name' => 'Instagram'],
            'linkedin' => ['icon' => 'fab fa-linkedin', 'color' => '#0077B5', 'name' => 'LinkedIn'],
            'github' => ['icon' => 'fab fa-github', 'color' => '#333333', 'name' => 'GitHub'],
            'gitlab' => ['icon' => 'fab fa-gitlab', 'color' => '#FC6D26', 'name' => 'GitLab'],
            'tiktok' => ['icon' => 'fab fa-tiktok', 'color' => '#000000', 'name' => 'TikTok'],
            'snapchat' => ['icon' => 'fab fa-snapchat', 'color' => '#FFFC00', 'name' => 'Snapchat'],
            'pinterest' => ['icon' => 'fab fa-pinterest', 'color' => '#BD081C', 'name' => 'Pinterest'],
            'reddit' => ['icon' => 'fab fa-reddit', 'color' => '#FF4500', 'name' => 'Reddit'],
            'twitch' => ['icon' => 'fab fa-twitch', 'color' => '#9146FF', 'name' => 'Twitch'],
            'discord' => ['icon' => 'fab fa-discord', 'color' => '#5865F2', 'name' => 'Discord'],
            'telegram' => ['icon' => 'fab fa-telegram', 'color' => '#26A5E4', 'name' => 'Telegram'],
            'whatsapp' => ['icon' => 'fab fa-whatsapp', 'color' => '#25D366', 'name' => 'WhatsApp'],
            'medium' => ['icon' => 'fab fa-medium', 'color' => '#000000', 'name' => 'Medium'],
            'devto' => ['icon' => 'fab fa-dev', 'color' => '#0A0A0A', 'name' => 'Dev.to'],
            'stackoverflow' => ['icon' => 'fab fa-stack-overflow', 'color' => '#F58025', 'name' => 'Stack Overflow'],
            'dribbble' => ['icon' => 'fab fa-dribbble', 'color' => '#EA4C89', 'name' => 'Dribbble'],
            'behance' => ['icon' => 'fab fa-behance', 'color' => '#1769FF', 'name' => 'Behance'],
        ];

        foreach ($networks as $network => $info) {
            if ($this->$network && $this->show_social) {
                $socials[] = [
                    'name' => $info['name'],
                    'url' => $this->$network,
                    'icon' => $info['icon'],
                    'color' => $info['color'],
                ];
            }
        }

        return $socials;
    }

    // Récupérer l'avatar
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=ff6c00&color=fff';
    }
}
