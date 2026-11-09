@extends('layouts.admin')

@section('header', 'Modifier la catégorie')
@section('subheader', 'Mettre à jour les informations de la catégorie')

@section('content')
<div class="max-w-3xl mx-auto pb-10">

    <!-- Fil d'Ariane (Breadcrumb) -->
    <nav class="flex mb-6 text-sm text-gray-500" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.categories.index') }}" class="hover:text-orange-500 transition-colors">
                    <i class="fas fa-tags mr-2"></i>Catégories
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-xs mx-2 text-gray-400"></i>
                    <span class="text-gray-800 font-medium truncate max-w-[150px]">{{ $category->name }}</span>
                </div>
            </li>
        </ol>
    </nav>

    @if($errors->any())
    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-sm">
        <div class="flex items-start">
            <i class="fas fa-exclamation-triangle text-red-500 mt-1 mr-3"></i>
            <div>
                <h3 class="text-red-800 font-medium">Veuillez corriger les erreurs suivantes :</h3>
                <ul class="mt-2 list-disc list-inside text-sm text-red-700">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Carte Principale -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            <div class="p-6 md:p-8 space-y-6">
                <!-- Champ Nom -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nom de la catégorie <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-folder text-gray-400"></i>
                        </div>
                        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required
                               class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-gray-800">
                    </div>
                </div>

                <!-- Champ Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description <span class="text-gray-400 font-normal">(Optionnel)</span></label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-gray-800 resize-none">{{ old('description', $category->description) }}</textarea>
                </div>

                <!-- Grille Responsive -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Couleur -->
                    <div>
                        <label for="color" class="block text-sm font-semibold text-gray-700 mb-2">Couleur du thème</label>
                        <div class="flex items-center gap-4 p-2 bg-gray-50 border border-gray-200 rounded-xl">
                            <input type="color" id="color" name="color" value="{{ old('color', $category->color) }}"
                                   class="w-12 h-12 rounded-lg cursor-pointer border-0 p-0 bg-transparent">
                            <span class="text-sm text-gray-600 font-mono uppercase">{{ old('color', $category->color) }}</span>
                        </div>
                    </div>
                    <!-- Ordre -->
                    <div>
                        <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">Ordre d'affichage</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-sort-numeric-down text-gray-400"></i>
                            </div>
                            <input type="number" id="order" name="order" value="{{ old('order', $category->order) }}" min="0"
                                   class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all text-gray-800">
                        </div>
                    </div>
                </div>

                <!-- Statut Actif -->
                <div class="pt-4 border-t border-gray-100">
                    <label for="is_active" class="flex items-center cursor-pointer">
                        <div class="relative">
                            <input type="checkbox" id="is_active" name="is_active" value="1" class="sr-only" {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                            <div class="block bg-gray-300 w-12 h-6 rounded-full transition-colors"></div>
                            <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform"></div>
                        </div>
                        <div class="ml-3">
                            <span class="text-sm font-medium text-gray-900">Catégorie active</span>
                            <p class="text-xs text-gray-500">Si désactivé, la catégorie sera masquée du site public.</p>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="sticky bottom-4 md:static md:bottom-auto z-10">
            <div class="bg-white/90 backdrop-blur-md border border-gray-200 shadow-lg rounded-xl p-4 flex flex-col-reverse md:flex-row justify-between items-center gap-3">
                <!-- Bouton supprimer optionnel si vous avez la route -->
                <div class="w-full md:w-auto">
                    <!-- <button type="button" class="text-red-500 hover:text-red-700 text-sm font-medium"><i class="fas fa-trash"></i> Supprimer</button> -->
                </div>
                <div class="flex flex-col-reverse md:flex-row gap-3 w-full md:w-auto">
                    <a href="{{ route('admin.categories.index') }}" class="w-full md:w-auto text-center px-6 py-2.5 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 font-medium transition-colors">
                        Annuler
                    </a>
                    <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-orange-500 hover:bg-orange-600 text-white rounded-xl font-medium shadow-sm transition-all flex items-center justify-center gap-2">
                        <i class="fas fa-save"></i> Mettre à jour
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Petit script CSS pour animer le bouton Toggle -->
<style>
    input:checked ~ .dot { transform: translateX(100%); }
    input:checked ~ .block { background-color: #ff6c00; }
</style>
@endsection
