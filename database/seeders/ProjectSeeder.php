<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Barayoro - Plateforme E-commerce',
                'slug' => 'barayoro-plateforme-ecommerce',
                'description' => 'Barayoro est une plateforme e-commerce complète permettant aux commerçants maliens de vendre leurs produits en ligne. Solution sécurisée avec paiement mobile et livraison intégrée.',
                'technologies' => 'Laravel, MySQL, Tailwind CSS, Stripe, Orange Money',
                'client' => 'Barayoro SARL',
                'project_url' => 'https://barayoro.com',
                'order' => 1,
                'is_featured' => true,
                'is_active' => true,
                'meta_keywords' => json_encode(['e-commerce', 'Mali', 'vente en ligne', 'Orange Money']),
                'meta_description' => 'Plateforme e-commerce malienne pour vendre vos produits en ligne avec paiement mobile sécurisé.',
            ],
            [
                'title' => 'Agent IA WhatsApp - Chatbot Intelligent',
                'slug' => 'agent-ia-whatsapp-chatbot',
                'description' => 'Solution innovante utilisant l\'intelligence artificielle pour automatiser les conversations WhatsApp. Idéal pour le service client, la prise de rendez-vous et les réponses automatiques 24h/24.',
                'technologies' => 'Node.js, OpenAI API, WhatsApp Business API, MongoDB',
                'client' => 'Masadigitale',
                'project_url' => null,
                'order' => 2,
                'is_featured' => true,
                'is_active' => true,
                'meta_keywords' => json_encode(['IA', 'WhatsApp', 'chatbot', 'automatisation', 'Mali']),
                'meta_description' => 'Agent IA intelligent pour automatiser vos conversations WhatsApp et améliorer votre service client.',
            ],
            [
                'title' => 'Plateforme de Gestion d\'Entreprise (ERP)',
                'slug' => 'plateforme-gestion-entreprise-erp',
                'description' => 'Solution ERP complète pour la gestion des entreprises : facturation, stocks, RH, comptabilité et reporting. Adaptée aux PME et startups maliennes.',
                'technologies' => 'Laravel, Livewire, MySQL, Chart.js, Tailwind',
                'client' => 'Plusieurs entreprises',
                'project_url' => null,
                'order' => 3,
                'is_featured' => true,
                'is_active' => true,
                'meta_keywords' => json_encode(['ERP', 'gestion entreprise', 'facturation', 'Mali', 'startup']),
                'meta_description' => 'Plateforme ERP complète pour gérer votre entreprise : facturation, stocks, RH et comptabilité.',
            ],
            [
                'title' => 'Application Mobile - Livraison Express',
                'slug' => 'application-mobile-livraison-express',
                'description' => 'Application mobile de livraison à la demande connectant livreurs et commerçants. Géolocalisation en temps réel, notifications push et suivi des commandes.',
                'technologies' => 'Flutter, Firebase, Google Maps API, Node.js',
                'client' => 'Express Mali',
                'project_url' => null,
                'order' => 4,
                'is_featured' => true,
                'is_active' => true,
                'meta_keywords' => json_encode(['mobile', 'livraison', 'Flutter', 'géolocalisation', 'Mali']),
                'meta_description' => 'Application mobile de livraison à la demande avec géolocalisation en temps réel.',
            ],
            [
                'title' => 'Site Vitrine - Agence Digital Mali',
                'slug' => 'site-vitrine-agence-digital-mali',
                'description' => 'Site web vitrine moderne pour une agence digitale malienne. Design premium, animations fluides et SEO optimisé pour le référencement local.',
                'technologies' => 'React, Tailwind CSS, SEO, Laravel API',
                'client' => 'Digital Mali Agency',
                'project_url' => null,
                'order' => 5,
                'is_featured' => false,
                'is_active' => true,
                'meta_keywords' => json_encode(['site vitrine', 'agence digitale', 'design moderne', 'SEO Mali']),
                'meta_description' => 'Site vitrine moderne et optimisé SEO pour agence digitale au Mali.',
            ],
            [
                'title' => 'Application de Gestion Scolaire',
                'slug' => 'application-gestion-scolaire',
                'description' => 'Plateforme complète de gestion scolaire : inscriptions, notes, emplois du temps, communication parents-professeurs et paiements en ligne.',
                'technologies' => 'Laravel, Vue.js, MySQL, Bootstrap',
                'client' => 'Groupe Scolaire Salam',
                'project_url' => null,
                'order' => 6,
                'is_featured' => false,
                'is_active' => true,
                'meta_keywords' => json_encode(['gestion scolaire', 'école', 'notes', 'Mali', 'éducation']),
                'meta_description' => 'Plateforme de gestion scolaire complète pour écoles et établissements au Mali.',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
