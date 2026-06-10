@extends('layouts.admin')

@section('header', 'Détail de l\'article')
@section('subheader', 'Informations complètes de l\'article')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        @if($post->image)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
        </div>
        @endif

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
                <div class="prose max-w-none">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b">
                <h3 class="font-semibold text-gray-800">📊 Informations</h3>
            </div>
            <div class="p-6 space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-500">Auteur</span>
                    <span class="font-medium">{{ $post->author }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Vues</span>
                    <span class="font-medium">{{ $post->views }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Statut</span>
                    @if($post->is_published)
                        <span class="text-green-600">Publié</span>
                    @else
                        <span class="text-yellow-600">Brouillon</span>
                    @endif
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Date de publication</span>
                    <span>{{ $post->published_at ? $post->published_at->format('d/m/Y') : '-' }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b">
                <h3 class="font-semibold text-gray-800">🛠️ Actions</h3>
            </div>
            <div class="p-6 space-y-3">
                <a href="{{ route('admin.blog.edit', $post->id) }}" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition">
                    Modifier l'article
                </a>
                <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    Voir sur le site
                </a>
                <form action="{{ route('admin.blog.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition" onclick="return confirm('Supprimer cet article ?')">
                        Supprimer l'article
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-6">
    <a href="{{ route('admin.blog.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800">
        ← Retour à la liste des articles
    </a>
</div>
@endsection
