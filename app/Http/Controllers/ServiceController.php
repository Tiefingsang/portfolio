<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Afficher la liste des services
     */
    public function index()
    {
        // Récupérer tous les services actifs, triés par ordre
        $services = Service::where('is_active', true)
            ->orderBy('order', 'asc')
            ->paginate(12);

        // Vérifier si des services existent
        // dd($services); // Décommentez pour déboguer

        return view('pages.services.index', compact('services'));
    }

    /**
     * Afficher un service en détail
     */
    public function show($slug)
    {
        // Rechercher le service par son slug
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // dd($service); // Décommentez pour déboguer

        // Services connexes (autres services actifs, sauf celui-ci)
        $relatedServices = Service::where('is_active', true)
            ->where('id', '!=', $service->id)
            ->orderBy('order', 'asc')
            ->limit(3)
            ->get();

        return view('pages.services.show', compact('service', 'relatedServices'));
    }

    /**
     * Script de correction des slugs (à exécuter une fois)
     */
    public function fixSlugs()
    {
        $services = Service::whereNull('slug')
            ->orWhere('slug', '')
            ->get();

        $count = 0;
        foreach ($services as $service) {
            $slug = Str::slug($service->title);

            // Vérifier si le slug existe déjà
            $existing = Service::where('slug', $slug)
                ->where('id', '!=', $service->id)
                ->exists();

            if ($existing) {
                $service->slug = $slug . '-' . $service->id;
            } else {
                $service->slug = $slug;
            }

            $service->save();
            $count++;
        }

        return "✅ {$count} slug(s) corrigé(s) !";
    }
}
