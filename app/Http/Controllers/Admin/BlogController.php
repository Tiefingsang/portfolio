<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /* ============================================================
       LISTE
       ============================================================ */
    public function index()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blog.index', compact('posts'));
    }

    /* ============================================================
       FORMULAIRE CRÉATION
       ============================================================ */
    public function create()
    {
        return view('admin.blog.create');
    }

    /* ============================================================
       ENREGISTREMENT
       ============================================================ */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|max:255',
            'slug'         => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt'      => 'required|max:500',
            'content'      => 'required',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'is_published' => 'nullable|in:0,1',
            'is_featured'  => 'nullable|in:0,1',
        ]);

        // ✅ FIX 1 : brouillon = save_draft présent ET is_published à 0
        //             (le bouton "Publier" n'envoie PAS save_draft)
        $isPublished = !$request->has('save_draft')
                    && (int) ($validated['is_published'] ?? 1) === 1;

        // ✅ FIX 4 : slug unique garanti (ajoute -2, -3… si doublon)
        $slug = $validated['slug'] ?: Str::slug($validated['title']);
        $slug = $this->ensureUniqueSlug($slug);

        $data = [
            'title'            => $validated['title'],
            'slug'             => $slug,
            'excerpt'          => $validated['excerpt'],
            'content'          => $validated['content'],
            'meta_description' => Str::limit(strip_tags($validated['excerpt']), 160),
            'is_published'     => $isPublished,
            'is_featured'      => (int) ($validated['is_featured'] ?? 0) === 1, // ✅ FIX 2
            'published_at'     => $isPublished ? now() : null,
            'author'           => auth()->user()->name ?? 'Tiefing Sangare', // ✅ FIX 3
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'), $validated['title']);
        }

        BlogPost::create($data);

        return redirect()->route('admin.blog.index')
            ->with('success', $isPublished ? 'Article publié ✅' : 'Brouillon enregistré ✅');
    }

    /* ============================================================
       AFFICHAGE
       ============================================================ */
    public function show($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('admin.blog.show', compact('post'));
    }

    /* ============================================================
       FORMULAIRE ÉDITION
       ============================================================ */
    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('admin.blog.edit', compact('post'));
    }

    /* ============================================================
       MISE À JOUR
       ============================================================ */
    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        $validated = $request->validate([
            'title'        => 'required|max:255',
            'slug'         => 'nullable|string|max:255|unique:blog_posts,slug,' . $post->id,
            'excerpt'      => 'required|max:500',
            'content'      => 'required',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'is_published' => 'nullable|in:0,1',
            'is_featured'  => 'nullable|in:0,1',
        ]);

        // ✅ FIX 1 bis : côté édition, "is_published" est un checkbox explicite
        $isPublished = (int) ($validated['is_published'] ?? 0) === 1;

        // ✅ FIX 4 : slug unique en excluant l'article courant
        $slug = $validated['slug'] ?: Str::slug($validated['title']);
        $slug = $this->ensureUniqueSlug($slug, $post->id);

        $data = [
            'title'            => $validated['title'],
            'slug'             => $slug,
            'excerpt'          => $validated['excerpt'],
            'content'          => $validated['content'],
            'meta_description' => Str::limit(strip_tags($validated['excerpt']), 160),
            'is_published'     => $isPublished,
            'is_featured'      => (int) ($validated['is_featured'] ?? 0) === 1,
            'published_at'     => $isPublished ? ($post->published_at ?? now()) : null,
        ];

        if ($request->hasFile('image')) {
            // Supprime l'ancienne image
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $this->storeImage($request->file('image'), $validated['title']);
        }

        $post->update($data);

        return redirect()->route('admin.blog.index')->with('success', 'Article modifié ✅');
    }

    /* ============================================================
       SUPPRESSION
       ============================================================ */
    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);

        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Article supprimé ✅');
    }

    /* ============================================================
       UPLOAD IMAGE (Summernote — images dans l'article)
       ============================================================ */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/webp,image/bmp',
        ]);

        $file = $request->file('image');
        $name = date('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('blog/content', $name, 'public');

        return response()->json([
            'url' => Storage::disk('public')->url($path),
        ]);
    }

    /* ============================================================
       HELPERS PRIVÉS
       ============================================================ */

    /**
     * Stocke une image de couverture avec un nom unique.
     */
    private function storeImage($file, string $title): string
    {
        $name = date('YmdHis') . '_' . Str::slug(Str::limit($title, 50, '')) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('blog', $name, 'public');
    }

    /**
     * Garantit un slug unique (ajoute -2, -3, … si déjà pris).
     */
    private function ensureUniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $base = $slug ?: 'article';
        $slug = $base;
        $i = 1;

        while (
            BlogPost::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . (++$i);
        }

        return $slug;
    }
}
