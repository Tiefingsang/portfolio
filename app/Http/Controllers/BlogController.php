<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('pages.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Incrémenter les vues
        $post->increment('views');

        $relatedPosts = BlogPost::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->limit(3)
            ->get();

        return view('pages.blog.show', compact('post', 'relatedPosts'));
    }

    // Ajoute cette méthode pour les commentaires
    public function comment(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // TODO: Sauvegarder le commentaire dans la base de données
        // BlogComment::create([
        //     'blog_post_id' => $post->id,
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'message' => $request->message,
        // ]);

        return back()->with('success', 'Commentaire envoyé avec succès !');
    }
}
