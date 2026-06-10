@extends('layouts.admin')

@section('header', 'Détail du service')
@section('subheader', 'Informations complètes du service')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        @if($service->image)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="w-full h-64 object-cover">
        </div>
        @endif

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">📋 Description</h3>
            </div>
            <div class="p-6">
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-500">Description courte</h4>
                    <p class="text-gray-700 mt-1">{{ $service->description }}</p>
                </div>

                @if($service->full_description)
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Description complète</h4>
                    <div class="mt-2 p-4 bg-gray-50 rounded-lg">
                        <p class="text-gray-700 whitespace-pre-line">{{ $service->full_description }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        @if($service->features)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">✨ Caractéristiques</h3>
            </div>
            <div class="p-6">
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @foreach(json_decode($service->features, true) as $feature)
                        <li class="flex items-center gap-2 text-gray-700">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            {{ $feature }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>

    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">⚙️ Informations</h3>
            </div>
            <div class="p-6 space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-500">Icône</span>
                    <span class="text-2xl">{{ $service->icon ?? '📦' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Slug</span>
                    <span class="text-sm font-mono">{{ $service->slug }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Ordre</span>
                    <span>{{ $service->order }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Statut</span>
                    @if($service->is_active)
                        <span class="text-green-600">Actif</span>
                    @else
                        <span class="text-red-600">Inactif</span>
                    @endif
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Mise en avant</span>
                    @if($service->is_featured)
                        <span class="text-yellow-600">En vedette</span>
                    @else
                        <span class="text-gray-500">Non</span>
                    @endif
                </div>
            </div>
        </div>

        @if($service->button_text || $service->button_link)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">🔗 Bouton d'action</h3>
            </div>
            <div class="p-6 space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-500">Texte</span>
                    <span>{{ $service->button_text }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Lien</span>
                    <a href="{{ $service->button_link }}" target="_blank" class="text-orange-500 hover:underline">{{ $service->button_link }}</a>
                </div>
            </div>
        </div>
        @endif

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">🛠️ Actions</h3>
            </div>
            <div class="p-6 space-y-3">
                <a href="{{ route('admin.services.edit', $service->id) }}" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Modifier le service
                </a>

                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Supprimer ce service ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Supprimer le service
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-6">
    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Retour à la liste des services
    </a>
</div>
@endsection
