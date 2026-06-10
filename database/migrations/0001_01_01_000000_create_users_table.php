<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Informations personnelles
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();                    // Photo de profil
            $table->string('phone')->nullable();                     // Téléphone
            $table->text('bio')->nullable();                         // Biographie courte
            $table->text('about')->nullable();                       // Description longue
            $table->string('title')->nullable();                     // Titre professionnel
            $table->string('company')->nullable();                   // Entreprise
            $table->string('location')->nullable();                  // Localisation

            // Réseaux sociaux
            $table->string('youtube')->nullable();                   // YouTube
            $table->string('facebook')->nullable();                  // Facebook
            $table->string('twitter')->nullable();                   // Twitter/X
            $table->string('instagram')->nullable();                 // Instagram
            $table->string('linkedin')->nullable();                  // LinkedIn
            $table->string('github')->nullable();                    // GitHub
            $table->string('gitlab')->nullable();                    // GitLab
            $table->string('bitbucket')->nullable();                 // Bitbucket
            $table->string('tiktok')->nullable();                    // TikTok
            $table->string('snapchat')->nullable();                  // Snapchat
            $table->string('pinterest')->nullable();                 // Pinterest
            $table->string('reddit')->nullable();                    // Reddit
            $table->string('twitch')->nullable();                    // Twitch
            $table->string('discord')->nullable();                   // Discord
            $table->string('telegram')->nullable();                  // Telegram
            $table->string('whatsapp')->nullable();                  // WhatsApp
            $table->string('signal')->nullable();                    // Signal
            $table->string('medium')->nullable();                    // Medium
            $table->string('devto')->nullable();                     // Dev.to
            $table->string('hashnode')->nullable();                  // Hashnode
            $table->string('stackoverflow')->nullable();             // Stack Overflow
            $table->string('producthunt')->nullable();               // Product Hunt
            $table->string('dribbble')->nullable();                  // Dribbble
            $table->string('behance')->nullable();                   // Behance
            $table->string('figma')->nullable();                     // Figma

            // Liens professionnels
            $table->string('portfolio_url')->nullable();             // Site personnel
            $table->string('blog_url')->nullable();                  // Blog personnel
            $table->string('cv_url')->nullable();                    // CV en ligne
            $table->string('resume_url')->nullable();                // Resume
            $table->string('calendly_url')->nullable();              // Calendly (RDV)

            // Paramètres
            $table->string('role')->default('admin');                // Rôle
            $table->boolean('is_active')->default(true);             // Compte actif
            $table->boolean('show_social')->default(true);           // Afficher les réseaux sociaux
            $table->json('settings')->nullable();                    // Paramètres JSON

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
