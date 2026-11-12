<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /* ============================================================
       LISTE
       ============================================================ */
    public function index(Request $request)
    {
        $query = \App\Models\BlogPost::where('is_published', true)
            ->where('published_at', '<=', now());

        // ✅ Recherche dynamique
        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                ->orWhere('excerpt', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }

        $posts = $query->orderBy('published_at', 'desc')->paginate(9);
        $posts->appends($request->query()); // garde le ?q= dans la pagination

        $categories = \App\Models\Category::active()->get();
        $latestPosts = \App\Models\BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.blog.index', compact('posts', 'categories', 'latestPosts'));
    }

    public function category($slug)
    {
        $category = \App\Models\Category::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $posts = \App\Models\BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->where('category_id', $category->id)
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        $categories = \App\Models\Category::active()->get();
        $latestPosts = \App\Models\BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        return view('pages.blog.index', compact('posts', 'categories', 'latestPosts', 'category'));
    }

    /* ============================================================
       FORMULAIRE CRÉATION
       ============================================================ */
    public function create()
    {
        $categories = Category::active()->get();
        return view('admin.blog.create', compact('categories'));
    }

    /* ============================================================
       ENREGISTREMENT
       ============================================================ */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string',
            'slug'           => 'nullable|string|unique:blog_posts,slug',
            'excerpt'        => 'required|string',       // ✅ Plus de max:500
            'content'        => 'required',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'is_published'   => 'nullable|in:0,1',
            'is_featured'    => 'nullable|in:0,1',
            'category_id'    => 'nullable|exists:categories,id',
            'tags'           => 'nullable|string',
            'meta_title'     => 'nullable|string',
            'meta_keywords'  => 'nullable|string',
        ]);

        $isPublished = !$request->has('save_draft')
                    && (int) ($validated['is_published'] ?? 1) === 1;

        $slug = $validated['slug'] ?: Str::slug($validated['title']);
        $slug = $this->ensureUniqueSlug($slug);

        // Tags
        $tags = null;
        if (!empty($validated['tags'])) {
            $tags = array_map('trim', explode(',', $validated['tags']));
            $tags = array_values(array_filter($tags));
        }

        // Meta keywords
        $metaKeywords = null;
        if (!empty($validated['meta_keywords'])) {
            $metaKeywords = array_map('trim', explode(',', $validated['meta_keywords']));
            $metaKeywords = array_values(array_filter($metaKeywords));
        }

        $data = [
            'title'            => $validated['title'],
            'slug'             => $slug,
            'excerpt'          => $validated['excerpt'],
            'content'          => $validated['content'],
            'meta_description' => Str::limit(strip_tags($validated['excerpt']), 160),
            'meta_title'       => $validated['meta_title'] ?? null,
            'meta_keywords'    => $metaKeywords,
            'category_id'      => $validated['category_id'] ?? null,
            'tags'             => $tags,
            'is_published'     => $isPublished,
            'is_featured'      => (int) ($validated['is_featured'] ?? 0) === 1,
            'published_at'     => $isPublished ? now() : null,
            'author'           => $request->input('author') ?? auth()->user()->name ?? 'Tiefing Sangare',
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
    public function show($slug)
    {
        $post = \App\Models\BlogPost::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $relatedPosts = \App\Models\BlogPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->where('id', '!=', $post->id)
            ->when($post->category_id, function ($q) use ($post) {
                return $q->where('category_id', $post->category_id);
            })
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        // ✅ AJOUT : l'utilisateur (pour l'avatar)
        $user = \App\Models\User::where('email', 'tiefingsangare86@gmail.com')->first()
                ?? \App\Models\User::first();

        return view('pages.blog.show', compact('post', 'relatedPosts', 'user'));
    }

    /* ============================================================
       FORMULAIRE ÉDITION
       ============================================================ */
    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        $categories = Category::active()->get();
        return view('admin.blog.edit', compact('post', 'categories'));
    }

    /* ============================================================
       MISE À JOUR
       ============================================================ */
    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);

        $validated = $request->validate([
            'title'          => 'required|string',
            'slug'           => 'nullable|string|unique:blog_posts,slug,' . $post->id,
            'excerpt'        => 'required|string',       // ✅ Plus de max:500 (le bug était ici)
            'content'        => 'required',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'is_published'   => 'nullable|in:0,1',
            'is_featured'    => 'nullable|in:0,1',
            'category_id'    => 'nullable|exists:categories,id',
            'tags'           => 'nullable|string',
            'meta_title'     => 'nullable|string',
            'meta_keywords'  => 'nullable|string',
        ]);

        $isPublished = (int) ($validated['is_published'] ?? 0) === 1;

        $slug = $validated['slug'] ?: Str::slug($validated['title']);
        $slug = $this->ensureUniqueSlug($slug, $post->id);

        $tags = null;
        if (!empty($validated['tags'])) {
            $tags = array_map('trim', explode(',', $validated['tags']));
            $tags = array_values(array_filter($tags));
        }

        $metaKeywords = null;
        if (!empty($validated['meta_keywords'])) {
            $metaKeywords = array_map('trim', explode(',', $validated['meta_keywords']));
            $metaKeywords = array_values(array_filter($metaKeywords));
        }

        $data = [
            'title'            => $validated['title'],
            'slug'             => $slug,
            'excerpt'          => $validated['excerpt'],
            'content'          => $validated['content'],
            'meta_description' => Str::limit(strip_tags($validated['excerpt']), 160),
            'meta_title'       => $validated['meta_title'] ?? null,
            'meta_keywords'    => $metaKeywords,
            'category_id'      => $validated['category_id'] ?? null,
            'tags'             => $tags,
            'is_published'     => $isPublished,
            'is_featured'      => (int) ($validated['is_featured'] ?? 0) === 1,
            'published_at'     => $isPublished ? ($post->published_at ?? now()) : null,
        ];

        // ✅ Auteur modifiable
        if ($request->filled('author')) {
            $data['author'] = $request->input('author');
        }

        if ($request->hasFile('image')) {
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
       UPLOAD IMAGE (TinyMCE)
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

    private function storeImage($file, string $title): string
    {
        $name = date('YmdHis') . '_' . Str::slug(Str::limit($title, 50, '')) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('blog', $name, 'public');
    }

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
