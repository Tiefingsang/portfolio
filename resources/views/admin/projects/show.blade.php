@extends('layouts.admin')

@section('header', 'Détail du projet')
@section('subheader', 'Informations complètes du projet')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Colonne principale -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Image du projet -->
        @if($project->image)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">🖼️ Image du projet</h3>
            </div>
            <div class="p-6 text-center">
                <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}"
                     class="max-w-full max-h-96 rounded-lg shadow-lg mx-auto object-cover">
            </div>
        </div>
        @endif

        <!-- Informations générales -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">📋 Informations générales</h3>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Titre</h4>
                    <p class="text-xl font-semibold text-gray-800 mt-1">{{ $project->title }}</p>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-gray-500">Slug (URL unique)</h4>
                    <p class="text-sm text-gray-600 mt-1 font-mono">{{ $project->slug }}</p>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-gray-500">Description</h4>
                    <div class="mt-2 p-4 bg-gray-50 rounded-lg">
                        <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $project->description }}</p>
                    </div>
                </div>

                @if($project->technologies)
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Technologies utilisées</h4>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach(explode(',', $project->technologies) as $tech)
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-sm rounded-full">{{ trim($tech) }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($project->client)
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Client</h4>
                    <p class="text-gray-700 mt-1 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{ $project->client }}
                    </p>
                </div>
                @endif

                @if($project->project_url)
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Lien du projet</h4>
                    <a href="{{ $project->project_url }}" target="_blank" class="text-orange-500 hover:text-orange-600 mt-1 inline-flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                        {{ $project->project_url }}
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Métadonnées SEO -->
        @if($project->meta_keywords || $project->meta_description)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">🔍 Référencement SEO</h3>
            </div>
            <div class="p-6 space-y-4">
                @if($project->meta_keywords)
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Mots-clés</h4>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach(json_decode($project->meta_keywords ?? '[]', true) as $keyword)
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 text-sm rounded-full">{{ $keyword }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($project->meta_description)
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Meta description</h4>
                    <p class="text-gray-600 mt-1">{{ $project->meta_description }}</p>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>

    <!-- Colonne latérale -->
    <div class="space-y-6">
        <!-- Statut -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">⚡ Statut</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-gray-600">Visibilité</span>
                    @if($project->is_active)
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Publié
                        </span>
                    @else
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Brouillon
                        </span>
                    @endif
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-gray-600">Mis en avant</span>
                    @if($project->is_featured)
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                            En vedette
                        </span>
                    @else
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm">Non mis en avant</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">📊 Informations</h3>
            </div>
            <div class="p-6 space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-gray-500">Position</span>
                    <span class="font-semibold text-gray-800">{{ $project->order }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-500">Date de création</span>
                    <span class="text-gray-700">{{ $project->created_at ? $project->created_at->format('d/m/Y à H:i') : '-' }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-500">Dernière modification</span>
                    <span class="text-gray-700">{{ $project->updated_at ? $project->updated_at->format('d/m/Y à H:i') : '-' }}</span>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">🛠️ Actions</h3>
            </div>
            <div class="p-6 space-y-3">
                <a href="{{ route('admin.projects.edit', $project->id) }}"
                   class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Modifier le projet
                </a>

                <a href="{{ route('project.show', $project->slug) }}" target="_blank"
                   class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    Voir sur le site
                </a>

                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline-block w-full">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition" onclick="return confirm('Supprimer définitivement ce projet ?')">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Supprimer le projet
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Navigation retour -->
<div class="mt-6">
    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Retour à la liste des projets
    </a>
</div>
@endsection
