<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class AutomatedBlogController extends Controller
{
    /**
     * Recevoir et publier automatiquement un article.
     */
    public function store(Request $request)
    {
        // 1. Validation des données reçues
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string|min:100',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|array',
            'meta_keywords.*' => 'string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Les données de l’article sont invalides.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        // 2. Génération du slug
        $slug = Str::slug($data['slug'] ?? $data['title']);

        if (empty($slug)) {
            return response()->json([
                'success' => false,
                'message' => 'Impossible de générer le slug de cet article.',
            ], 422);
        }

        // 3. Vérification des doublons
        if (BlogPost::where('slug', $slug)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Un article avec ce slug existe déjà.',
                'slug' => $slug,
            ], 409);
        }

        // 4. Nettoyage du contenu HTML
        $cleanContent = Purifier::clean($data['content']);

        // 5. Préparation des métadonnées SEO
        $metaDescription = $data['meta_description']
            ?? Str::limit(strip_tags($data['excerpt']), 160);

        // 6. Création et publication immédiate
        $post = BlogPost::create([
            'title' => $data['title'],
            'slug' => $slug,
            'excerpt' => $data['excerpt'],
            'content' => $cleanContent,
            'author' => 'Tiefing Sangare',

            // Publication automatique
            'is_published' => true,
            'is_featured' => false,
            'published_at' => now(),

            // SEO
            'meta_description' => $metaDescription,
            'meta_keywords' => $data['meta_keywords'] ?? [],
        ]);

        // 7. Réponse API
        return response()->json([
            'success' => true,
            'message' => 'Article publié automatiquement avec succès.',
            'article' => [
                'id' => $post->id,
                'title' => $post->title,
                'slug' => $post->slug,
                'url' => url('/blog/' . $post->slug),
                'author' => $post->author,
                'is_published' => $post->is_published,
                'published_at' => $post->published_at,
            ],
        ], 201);
    }
}

