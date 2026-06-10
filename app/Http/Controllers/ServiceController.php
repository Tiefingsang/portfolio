<?php

namespace App\Http\Controllers;

class ServiceController extends Controller
{
    public function index()
    {
        $services = [
            [
                'name' => 'Création de sites web',
                'description' => 'Sites vitrine, e-commerce, sur mesure avec SEO intégré',
                'icon' => '🌐',
                'features' => ['Responsive design', 'SEO optimisé', 'Admin panel']
            ],
            [
                'name' => 'Applications mobiles',
                'description' => 'Applications iOS et Android natives ou cross-platform',
                'icon' => '📱',
                'features' => ['React Native', 'Flutter', 'Performance optimale']
            ],
            [
                'name' => 'Agent IA WhatsApp',
                'description' => 'Chatbot intelligent pour automatiser vos conversations',
                'icon' => '🤖',
                'features' => ['IA intégrée', '24/7', 'Réponses instantanées']
            ],
            [
                'name' => 'Agence digitale',
                'description' => 'Stratégie digitale, référencement et marketing',
                'icon' => '🚀',
                'features' => ['SEO', 'Google Ads', 'Social Media']
            ],
            [
                'name' => 'Maintenance technique',
                'description' => 'Support et maintenance de vos applications',
                'icon' => '⚙️',
                'features' => ['Sécurité', 'Mises à jour', 'Backup']
            ],
            [
                'name' => 'Formation',
                'description' => 'Formation en développement web et digital',
                'icon' => '📚',
                'features' => ['Laravel', 'React', 'SEO']
            ]
        ];

        return view('pages.services', compact('services'));
    }

    
}
