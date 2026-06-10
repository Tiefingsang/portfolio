<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoSettingSeeder extends Seeder
{
    public function run(): void
    {
        $seoSettings = [
            [
                'page' => 'home',
                'title' => 'Tiefing Sangare - Développeur Web & Agence Digitale Mali',
                'description' => 'Tiefing Sangare, développeur web et fondateur de Masadigitale. Création de sites web, applications mobiles et agents IA WhatsApp à Bamako, Mali. Devis gratuit.',
                'keywords' => 'développeur web Mali, agence digitale Bamako, création site web Mali, Tiefing Sangare, Masadigitale',
                'og_image' => 'images/og-home.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page' => 'about',
                'title' => 'À propos - Tiefing Sangare | Développeur Web Mali',
                'description' => 'Découvrez Tiefing Sangare, développeur web passionné basé à Bamako, Mali. Expertise en Laravel, React, Flutter et IA. Plus de 5 ans d\'expérience.',
                'keywords' => 'Tiefing Sangare, développeur web, portfolio, Masadigitale, Bamako Mali',
                'og_image' => 'images/og-about.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page' => 'services',
                'title' => 'Services Digitaux - Création Site Web & Apps Mali',
                'description' => 'Découvrez mes services : création de sites web, applications mobiles, agent IA WhatsApp, SEO et formation digitale. Solutions sur mesure au Mali.',
                'keywords' => 'services web Mali, création site web, application mobile, IA WhatsApp, SEO Mali',
                'og_image' => 'images/og-services.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page' => 'projects',
                'title' => 'Réalisations - Portfolio de Projets Web & Mobile',
                'description' => 'Découvrez mes réalisations : sites e-commerce, applications mobiles, chatbots IA, ERP. Projets innovants pour les entreprises maliennes.',
                'keywords' => 'portfolio développeur, réalisations web, projets Mali, e-commerce Mali, ERP Mali',
                'og_image' => 'images/og-projects.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page' => 'blog',
                'title' => 'Blog SEO - Conseils Web & Digital au Mali',
                'description' => 'Articles sur le développement web, le SEO, l\'intelligence artificielle et les tendances digitales au Mali. Astuces pour booster votre visibilité en ligne.',
                'keywords' => 'blog SEO, conseils web, développement Mali, IA, digital Mali',
                'og_image' => 'images/og-blog.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page' => 'contact',
                'title' => 'Contact - Demandez votre Devis Gratuit | Tiefing Sangare',
                'description' => 'Contactez Tiefing Sangare pour vos projets web, applications mobiles ou agent IA WhatsApp. Réponse sous 24h. Devis gratuit et personnalisé.',
                'keywords' => 'contact développeur, devis gratuit site web, contact Masadigitale, Bamako Mali',
                'og_image' => 'images/og-contact.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('seo_settings')->insert($seoSettings);
    }
}
