<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\BlogPost;
use App\Models\SeoSetting;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use stdClass;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){
        // Récupérer TOUS les projets (pas seulement les featured)
        $projects = Project::where('is_active', true)
            ->orderBy('order')
            ->get();

        // Récupérer les projets en avant pour la section featured
        $featuredProjects = Project::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->limit(6)
            ->get();

        // Récupérer les derniers articles
        $posts = BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        // Récupérer TOUS les services
        $servicesData = Service::where('is_active', true)
            ->orderBy('order')
            ->get();

        // Créer une nouvelle collection pour les services
        $services = collect();

        if ($servicesData->isNotEmpty()) {
            foreach ($servicesData as $service) {
                $newService = new stdClass();
                $newService->icon = $service->icon;
                $newService->title = $service->title;
                $newService->description = $service->description;
                $newService->icon_class = $this->getIconClass($service->title);
                $services->push($newService);
            }
        } else {
            // Données par défaut
            $defaultServices = [
                ['icon' => '🌐', 'title' => 'Sites Web', 'description' => 'Création de sites vitrine, e-commerce et applications web sur mesure avec SEO intégré.', 'icon_class' => 'ion-ios-browsers-outline'],
                ['icon' => '📱', 'title' => 'Apps Mobiles', 'description' => 'Applications iOS et Android natives ou cross-platform (Flutter, React Native).', 'icon_class' => 'ion-social-android-outline'],
                ['icon' => '🤖', 'title' => 'Agent IA WhatsApp', 'description' => 'Chatbot intelligent pour automatiser vos conversations 24h/24 et 7j/7.', 'icon_class' => 'ion-ios-chatbubble-outline'],
                ['icon' => '📈', 'title' => 'Référencement SEO', 'description' => 'Optimisation de votre visibilité sur Google et les moteurs de recherche.', 'icon_class' => 'ion-ios-analytics-outline'],
                ['icon' => '🎨', 'title' => 'UI/UX Design', 'description' => 'Design d\'interfaces modernes et intuitives pour une expérience utilisateur optimale.', 'icon_class' => 'ion-ios-color-wand-outline'],
                ['icon' => '⚙️', 'title' => 'Maintenance technique', 'description' => 'Support et maintenance de vos applications web et mobiles.', 'icon_class' => 'ion-ios-settings'],
            ];

            foreach ($defaultServices as $default) {
                $newService = new stdClass();
                $newService->icon = $default['icon'];
                $newService->title = $default['title'];
                $newService->description = $default['description'];
                $newService->icon_class = $default['icon_class'];
                $services->push($newService);
            }
        }

        // Statistiques
        $stats = [
            'projects_count' => Project::where('is_active', true)->count(),
            'clients_count' => Project::whereNotNull('client')->distinct('client')->count('client'),
            'support' => '24/7',
            'seo_optimized' => '100%'
        ];

        // Récupérer les données SEO
        $seoData = SeoSetting::where('page', 'home')->first();

        $seo = new stdClass();
        if ($seoData) {
            $seo->title = $seoData->title;
            $seo->description = $seoData->description;
        } else {
            $seo->title = 'Tiefing Sangare - Développeur Web & Agence Digitale Mali';
            $seo->description = 'Développeur web et agence digitale basé à Bamako, Mali. Création de sites web, applications mobiles, IA WhatsApp et solutions digitales sur mesure.';
        }

        // Passer toutes les variables à la vue
        return view('pages.home', compact('projects', 'featuredProjects', 'posts', 'services', 'stats', 'seo'));
    }

    private function getIconClass($title){
        $icons = [
            'Site' => 'ion-ios-browsers-outline',
            'Web' => 'ion-ios-browsers-outline',
            'Mobile' => 'ion-social-android-outline',
            'App' => 'ion-social-android-outline',
            'IA' => 'ion-ios-chatbubble-outline',
            'WhatsApp' => 'ion-ios-chatbubble-outline',
            'SEO' => 'ion-ios-analytics-outline',
            'Référencement' => 'ion-ios-analytics-outline',
            'UI' => 'ion-ios-color-wand-outline',
            'UX' => 'ion-ios-color-wand-outline',
            'Design' => 'ion-ios-color-wand-outline',
            'Maintenance' => 'ion-ios-settings',
            'Support' => 'ion-ios-settings',
        ];

        foreach ($icons as $key => $icon) {
            if (str_contains($title, $key)) {
                return $icon;
            }
        }

        return 'ion-ios-browsers-outline';
    }

    // public function contact()
    // {
    //     return view('pages.contact');
    // }


    // public function about()
    // {
    //     return view('pages.about');
    // }

    public function serviceIndex()
    {
        //$services = $this->getServices();
        $services = Service::get();
        //dd($services);
        return view('pages.services', compact('services'));
    }


}
