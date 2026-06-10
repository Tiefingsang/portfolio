<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Création de Sites Web',
                'icon' => '🌐',
                'description' => 'Création de sites vitrine, e-commerce et applications web sur mesure avec SEO intégré.',
                'full_description' => 'Je crée des sites web modernes, rapides et optimisés SEO. Que vous ayez besoin d\'un site vitrine, d\'un e-commerce ou d\'une application web complexe, je vous accompagne de A à Z. Utilisation des dernières technologies (Laravel, React, Tailwind CSS) pour des performances optimales.',
                'features' => json_encode([
                    'Design responsive (mobile, tablette, desktop)',
                    'SEO optimisé pour Google',
                    'Panel d\'administration facile',
                    'Sécurité renforcée (HTTPS, CSRF)',
                    'Chargement ultra-rapide (Score Pagespeed 90+)',
                    'Formation à l\'utilisation'
                ]),
                'order' => 1,
                'is_featured' => true,
                'is_active' => true,
                'meta_title' => 'Création de sites web professionnels au Mali',
                'meta_description' => 'Création de sites web sur mesure à Bamako, Mali. Sites vitrine, e-commerce, SEO optimisé. Devis gratuit.'
            ],
            [
                'title' => 'Applications Mobiles',
                'icon' => '📱',
                'description' => 'Applications iOS et Android natives ou cross-platform (Flutter, React Native).',
                'full_description' => 'Développement d\'applications mobiles performantes pour iOS et Android. Solutions cross-platform avec Flutter ou React Native pour réduire les coûts de développement. Applications natives pour des performances maximales.',
                'features' => json_encode([
                    'iOS et Android',
                    'UI/UX soignée',
                    'Mode hors-ligne',
                    'Notifications push',
                    'Géolocalisation',
                    'Paiements intégrés'
                ]),
                'order' => 2,
                'is_featured' => true,
                'is_active' => true,
                'meta_title' => 'Développement d\'applications mobiles Mali',
                'meta_description' => 'Création d\'applications mobiles iOS et Android pour entreprises au Mali. Flutter, React Native. Devis gratuit.'
            ],
            [
                'title' => 'Agent IA WhatsApp',
                'icon' => '🤖',
                'description' => 'Chatbot intelligent pour automatiser vos conversations 24h/24 et 7j/7.',
                'full_description' => 'Solution innovante utilisant l\'intelligence artificielle pour automatiser vos conversations WhatsApp. Service client automatisé, prise de rendez-vous, réponses aux FAQs, vente de produits 24h/24.',
                'features' => json_encode([
                    'Disponible 24h/24, 7j/7',
                    'Réponses instantanées',
                    'IA intelligente',
                    'Multi-langues',
                    'Tableau de bord analytique',
                    'Export des conversations'
                ]),
                'order' => 3,
                'is_featured' => true,
                'is_active' => true,
                'meta_title' => 'Agent IA WhatsApp pour entreprises au Mali',
                'meta_description' => 'Automatisez votre service client avec notre agent IA WhatsApp. Disponible 24h/24. Devis gratuit.'
            ],
            [
                'title' => 'Référencement SEO',
                'icon' => '📈',
                'description' => 'Optimisation de votre visibilité sur Google et les moteurs de recherche.',
                'full_description' => 'Service de référencement naturel complet pour améliorer votre positionnement sur Google. Audit SEO, optimisation technique, création de contenu, netlinking local.',
                'features' => json_encode([
                    'Audit SEO complet',
                    'Optimisation technique',
                    'Recherche de mots-clés',
                    'Création de contenu',
                    'Netlinking local Mali',
                    'Suivi mensuel des performances'
                ]),
                'order' => 4,
                'is_featured' => false,
                'is_active' => true,
                'meta_title' => 'Service SEO Mali - Référencement Google',
                'meta_description' => 'Améliorez votre visibilité sur Google avec nos services SEO au Mali. Audit, optimisation, suivi. Devis gratuit.'
            ],
            [
                'title' => 'Formation Développement Web',
                'icon' => '🎓',
                'description' => 'Formation en développement web et technologies digitales.',
                'full_description' => 'Formation pratique en développement web pour débutants et professionnels. Laravel, React, Flutter, SEO. Cours particuliers ou en groupe.',
                'features' => json_encode([
                    'Cours pratiques',
                    'Projets réels',
                    'Certification',
                    'Support après formation',
                    'Programme personnalisé',
                    'Tarifs adaptés'
                ]),
                'order' => 5,
                'is_featured' => false,
                'is_active' => true,
                'meta_title' => 'Formation développement web Mali',
                'meta_description' => 'Formation pratique en développement web (Laravel, React, Flutter) à Bamako, Mali. Inscription ouverte.'
            ],
            [
                'title' => 'Maintenance & Support',
                'icon' => '⚙️',
                'description' => 'Maintenance technique et support pour vos applications web et mobiles.',
                'full_description' => 'Service de maintenance et support technique pour vos sites web et applications. Mises à jour, sécurisation, backup, correction de bugs, assistance continue.',
                'features' => json_encode([
                    'Mises à jour régulières',
                    'Sauvegardes automatiques',
                    'Sécurité renforcée',
                    'Correction de bugs',
                    'Support prioritaire',
                    'Rapports mensuels'
                ]),
                'order' => 6,
                'is_featured' => false,
                'is_active' => true,
                'meta_title' => 'Maintenance site web Mali - Support technique',
                'meta_description' => 'Service de maintenance et support technique pour sites web et applications au Mali. Devis gratuit.'
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
