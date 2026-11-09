@extends('layouts.admin')

@section('header', 'Détail du projet')
@section('subheader', 'Informations complètes du projet')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
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
                    <h4 class="text-sm font-medium text-gray-500">Slug</h4>
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
                    <h4 class="text-sm font-medium text-gray-500">Technologies</h4>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach(explode(',', $project->technologies) as $tech)
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-sm rounded-full">{{ trim($tech) }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($project->client_name || $project->client_industry)
                <div class="grid grid-cols-2 gap-4">
                    @if($project->client_name)
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Client</h4>
                        <p class="text-gray-700 mt-1">{{ $project->client_name }}</p>
                    </div>
                    @endif
                    @if($project->client_industry)
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Secteur</h4>
                        <p class="text-gray-700 mt-1">{{ $project->client_industry }}</p>
                    </div>
                    @endif
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

        {{-- ÉTUDE DE CAS --}}
        @if($project->problem || $project->process || $project->solution || $project->results || $project->testimonial)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-orange-50 to-white border-b border-orange-200">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-book-open text-orange-500"></i> Étude de cas
                </h3>
            </div>
            <div class="p-6 space-y-6">
                @if($project->problem)
                <div>
                    <h4 class="text-sm font-bold text-orange-600 mb-2">1. Le défi du client</h4>
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $project->problem }}</p>
                    </div>
                </div>
                @endif

                @if($project->process)
                <div>
                    <h4 class="text-sm font-bold text-orange-600 mb-2">2. L'approche</h4>
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $project->process }}</p>
                    </div>
                </div>
                @endif

                @if($project->solution)
                <div>
                    <h4 class="text-sm font-bold text-orange-600 mb-2">3. La solution</h4>
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $project->solution }}</p>
                    </div>
                </div>
                @endif

                @if($project->results)
                <div>
                    <h4 class="text-sm font-bold text-orange-600 mb-2">4. Les résultats</h4>
                    <div class="p-4 bg-green-50 rounded-lg border-l-4 border-green-500">
                        <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $project->results }}</p>
                    </div>
                </div>
                @endif

                @if($project->metrics && is_array($project->metrics) && count($project->metrics) > 0)
                <div>
                    <h4 class="text-sm font-bold text-orange-600 mb-2">Métriques clés</h4>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach($project->metrics as $metric)
                        <div class="p-4 bg-orange-50 rounded-lg text-center border border-orange-200">
                            <div class="text-2xl font-bold text-orange-600">{{ $metric['value'] ?? '' }}</div>
                            <div class="text-xs text-gray-600 mt-1">{{ $metric['label'] ?? '' }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($project->testimonial)
                <div>
                    <h4 class="text-sm font-bold text-orange-600 mb-2">💬 Témoignage client</h4>
                    <div class="p-5 bg-gradient-to-br from-gray-900 to-gray-800 rounded-lg text-white">
                        <p class="italic leading-relaxed">« {{ $project->testimonial }} »</p>
                        @if($project->testimonial_author)
                            <p class="mt-3 text-orange-400 font-semibold">— {{ $project->testimonial_author }}</p>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif

        {{-- SEO --}}
        @if($project->meta_keywords || $project->meta_description)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">🔍 SEO</h3>
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

    {{-- SIDEBAR --}}
    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">⚡ Statut</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-gray-600">Visibilité</span>
                    @if($project->is_active)
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">Publié</span>
                    @else
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm">Brouillon</span>
                    @endif
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-600">Mis en avant</span>
                    @if($project->is_featured)
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">⭐ Oui</span>
                    @else
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm">Non</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">📊 Informations</h3>
            </div>
            <div class="p-6 space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-500">Position</span>
                    <span class="font-semibold text-gray-800">{{ $project->order }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Créé le</span>
                    <span class="text-gray-700">{{ $project->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Modifié le</span>
                    <span class="text-gray-700">{{ $project->updated_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">🛠️ Actions</h3>
            </div>
            <div class="p-6 space-y-3">
                <a href="{{ route('admin.projects.edit', $project->id) }}"
                   class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                <a href="{{ route('project.show', $project->slug) }}" target="_blank"
                   class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    <i class="fas fa-external-link-alt"></i> Voir sur le site
                </a>
                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition"
                            onclick="return confirm('Supprimer définitivement ce projet ?')">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-6">
    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Retour à la liste des projets
    </a>
</div>
@endsection
