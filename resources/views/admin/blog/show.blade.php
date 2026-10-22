@extends('layouts.admin')

@section('header', 'Détail de l\'article')
@section('subheader', 'Aperçu et informations de l\'article')

@push('styles')
<style>
    /* Rendu du contenu HTML généré par TinyMCE */
    .article-content {
        font-size: 16px;
        line-height: 1.75;
        color: #1f2937;
    }
    .article-content h1 { font-size: 2rem; font-weight: 700; margin: 2rem 0 1rem; color: #111827; }
    .article-content h2 { font-size: 1.5rem; font-weight: 700; margin: 2rem 0 1rem; color: #111827; }
    .article-content h3 { font-size: 1.25rem; font-weight: 600; margin: 1.5rem 0 0.75rem; color: #111827; }
    .article-content p { margin-bottom: 1.25rem; }
    .article-content a { color: #ff6c00; text-decoration: underline; }
    .article-content a:hover { color: #e55f00; }
    .article-content ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.25rem; }
    .article-content ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1.25rem; }
    .article-content li { margin-bottom: 0.5rem; }
    .article-content blockquote {
        border-left: 4px solid #ff6c00;
        padding-left: 1.25rem;
        margin: 1.5rem 0;
        font-style: italic;
        color: #4b5563;
        background: #f9fafb;
        padding: 1rem 1rem 1rem 1.5rem;
        border-radius: 0 0.5rem 0.5rem 0;
    }
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 1.5rem 0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .article-content pre {
        background: #1f2937;
        color: #f3f4f6;
        padding: 1.25rem;
        border-radius: 0.5rem;
        overflow-x: auto;
        font-size: 0.875rem;
        margin-bottom: 1.25rem;
    }
    .article-content code {
        background: #f3f4f6;
        color: #ef4444;
        padding: 0.125rem 0.375rem;
        border-radius: 0.25rem;
        font-size: 0.875em;
        font-family: monospace;
    }
    .article-content pre code {
        background: none;
        color: inherit;
        padding: 0;
    }
    .article-content table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1.5rem;
    }
    .article-content th, .article-content td {
        border: 1px solid #e5e7eb;
        padding: 0.75rem;
        text-align: left;
    }
    .article-content th {
        background: #f9fafb;
        font-weight: 600;
    }
</style>
@endpush

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- COLONNE PRINCIPALE (L'article) --}}
    <div class="lg:col-span-2 space-y-6">

        {{-- Image de couverture --}}
        @if($post->image)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <img src="{{ Storage::url($post->image) }}"
                 alt="{{ $post->title }}"
                 class="w-full h-auto max-h-[400px] object-cover">
        </div>
        @endif

        {{-- Contenu de l'article --}}
        <div class="bg-white rounded-xl shadow-md p-6 lg:p-8">

            {{-- Badges d'état --}}
            <div class="flex flex-wrap items-center gap-2 mb-4">
                @if($post->is_published)
                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                        <i class="fas fa-check-circle mr-1"></i> Publié
                    </span>
                @else
                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                        <i class="fas fa-clock mr-1"></i> Brouillon
                    </span>
                @endif

                @if($post->is_featured)
                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                        <i class="fas fa-star mr-1"></i> À la une
                    </span>
                @endif

                <span class="text-xs text-gray-500 ml-auto">
                    <i class="far fa-calendar mr-1"></i>
                    {{ $post->published_at?->format('d/m/Y à H:i') ?? $post->created_at->format('d/m/Y à H:i') }}
                </span>
            </div>

            {{-- Titre --}}
            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                {{ $post->title }}
            </h1>

            {{-- Résumé / Extrait --}}
            @if($post->excerpt)
            <p class="text-lg text-gray-600 italic mb-8 border-l-4 border-orange-500 pl-4 py-2">
                {{ $post->excerpt }}
            </p>
            @endif

            <hr class="my-8 border-gray-200">

            {{-- Contenu HTML (TinyMCE) --}}
            <div class="article-content">
                {!! $post->content !!}
            </div>

        </div>

        <div class="mt-4">
            <a href="{{ route('admin.blog.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-orange-500 transition font-medium">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
    </div>

    {{-- SIDEBAR (Métadonnées & Actions) --}}
    <div class="space-y-6">

        {{-- Actions rapides --}}
        <div class="bg-white rounded-xl shadow-md">
            <div class="px-6 py-4 bg-gray-50 border-b rounded-t-xl">
                <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-bolt text-orange-500"></i> Actions
                </h3>
            </div>
            <div class="p-6 space-y-3">
                <a href="{{ route('admin.blog.edit', $post->id) }}"
                   class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition">
                    <i class="fas fa-edit"></i> Modifier l'article
                </a>

                @if($post->is_published)
                <a href="{{ route('blog.show', $post->slug) }}" target="_blank"
                   class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    <i class="fas fa-external-link-alt"></i> Voir sur le site
                </a>
                @endif

                <form action="{{ route('admin.blog.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition"
                            onclick="return confirm('Supprimer définitivement cet article ?')">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>

        {{-- Statistiques du contenu --}}
        <div class="bg-white rounded-xl shadow-md">
            <div class="px-6 py-4 bg-gray-50 border-b rounded-t-xl">
                <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-chart-pie text-orange-500"></i> Statistiques
                </h3>
            </div>
            <div class="p-6 space-y-3 text-sm">
                <div class="flex justify-between items-center">
                    <span class="text-gray-500"><i class="fas fa-file-word mr-2"></i> Mots</span>
                    <span class="font-medium">{{ $post->word_count }} mots</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-500"><i class="fas fa-clock mr-2"></i> Lecture</span>
                    <span class="font-medium">{{ $post->reading_time }} min</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-500"><i class="far fa-eye mr-2"></i> Vues</span>
                    <span class="font-medium">{{ $post->views ?? 0 }}</span>
                </div>
            </div>
        </div>

        {{-- SEO & Métadonnées --}}
        <div class="bg-white rounded-xl shadow-md">
            <div class="px-6 py-4 bg-gray-50 border-b rounded-t-xl">
                <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-search text-orange-500"></i> SEO & Infos
                </h3>
            </div>
            <div class="p-6 space-y-4 text-sm">
                <div>
                    <span class="text-gray-500 block mb-1">Lien (Slug)</span>
                    <span class="font-mono text-xs text-orange-600 bg-orange-50 px-2 py-1 rounded break-all block">
                        /blog/{{ $post->slug }}
                    </span>
                </div>
                <div>
                    <span class="text-gray-500 block mb-1">Auteur</span>
                    <span class="font-medium flex items-center gap-2">
                        <i class="fas fa-user-circle text-gray-400"></i> {{ $post->author ?? 'Tiefing Sangare' }}
                    </span>
                </div>
                <div class="pt-2 border-t border-gray-100">
                    <span class="text-gray-500 block mb-1">Créé le</span>
                    <span class="text-gray-800">{{ $post->created_at->format('d/m/Y à H:i') }}</span>
                </div>
                <div>
                    <span class="text-gray-500 block mb-1">Dernière modification</span>
                    <span class="text-gray-800">{{ $post->updated_at->format('d/m/Y à H:i') }}</span>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
