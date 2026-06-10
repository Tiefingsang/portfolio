@extends('layouts.admin')

@section('header', 'Modifier le service')
@section('subheader', 'Modifier les informations du service')

@section('content')
<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Titre du service *</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Icône (emoji ou HTML)</label>
                    <input type="text" name="icon" value="{{ old('icon', $service->icon) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description courte *</label>
                <textarea name="description" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500" required>{{ old('description', $service->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description complète</label>
                <textarea name="full_description" rows="8"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">{{ old('full_description', $service->full_description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Caractéristiques (une par ligne)</label>
                <textarea name="features" rows="5"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 font-mono text-sm"
                          placeholder="Design responsive
Optimisé SEO
Performance garantie">{{ is_array($features) ? implode("\n", $features) : '' }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Image actuelle</label>
                @if($service->image)
                    <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="h-32 w-auto rounded-lg shadow">
                @else
                    <p class="text-gray-500">Aucune image</p>
                @endif
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Changer l'image</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-orange-500 transition">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m-4-4l-4 4m8-24l4-4m0 0l4 4m-4-4v12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-orange-600 hover:text-orange-500">
                                <span>Choisir une nouvelle image</span>
                                <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF, WEBP jusqu'à 2MB</p>
                    </div>
                </div>
                <div id="image-preview" class="mt-3 hidden">
                    <img id="preview" class="h-32 w-auto rounded-lg shadow">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Texte du bouton</label>
                    <input type="text" name="button_text" value="{{ old('button_text', $service->button_text) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lien du bouton</label>
                    <input type="url" name="button_link" value="{{ old('button_link', $service->button_link) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ordre d'affichage</label>
                    <input type="number" name="order" value="{{ old('order', $service->order) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta titre (SEO)</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title', $service->meta_title) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Meta description (SEO)</label>
                <textarea name="meta_description" rows="2"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">{{ old('meta_description', $service->meta_description) }}</textarea>
            </div>

            <div class="flex gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1"
                           {{ old('is_featured', $service->is_featured) ? 'checked' : '' }}
                           class="rounded focus:ring-orange-500">
                    <span class="text-sm text-gray-700">⭐ Mettre en avant</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1"
                           {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                           class="rounded focus:ring-orange-500">
                    <span class="text-sm text-gray-700">✅ Actif</span>
                </label>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
            <a href="{{ route('admin.services.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                Annuler
            </a>
            <button type="submit" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition">
                Mettre à jour
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('image-preview').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
