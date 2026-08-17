<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

        public function store(Request $request)
    {


        // Validation avec taille max 20MB
        $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:500',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20480', // 20MB = 20480KB
        ]);

         //dd($request->all());

        // Déterminer si c'est une publication ou un brouillon
        $isPublished = $request->has('is_published') && !$request->has('save_draft');

        // Préparer les données
        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'meta_description' => Str::limit($request->excerpt, 160),
        ];

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('blog', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        // Création de l'article
        BlogPost::create($data);

        // Message de succès
        $message = $request->has('save_draft') ? 'Brouillon enregistré avec succès' : 'Article publié avec succès';

        return redirect()->route('admin.blog.index')->with('success', $message);
    }

    public function show($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('admin.blog.show', compact('post'));
    }

    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:500',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10048',
            'is_published' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') ? ($post->published_at ?? now()) : null,
            'meta_description' => Str::limit($request->excerpt, 160),
        ];

        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('blog', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        $post->update($data);

        return redirect()->route('admin.blog.index')->with('success', 'Article modifié avec succès');
    }

    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);

        // Supprimer l'image associée
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Article supprimé avec succès');
    }
}
