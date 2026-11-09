@extends('layouts.admin')

@section('header', 'Nouveau projet / étude de cas')
@section('subheader', 'Créez un projet avec sa fiche complète')

@section('content')
<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" id="projectForm">
    @csrf

    @if($errors->any())
    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
        <ul class="list-disc list-inside text-red-700 text-sm">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <div class="xl:col-span-2 space-y-6">

            {{-- Infos générales --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-info-circle text-orange-500"></i> Informations générales
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Titre du projet *</label>
                        <input type="text" name="title" required value="{{ old('title') }}"
                               placeholder="Ex : Site e-commerce pour une boutique de cosmétiques"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nom du client</label>
                            <input type="text" name="client_name" value="{{ old('client_name') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Secteur d'activité</label>
                            <input type="text" name="client_industry" value="{{ old('client_industry') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description courte *</label>
                        <textarea name="description" required rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">{{ old('description') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                            <input type="text" name="category" value="{{ old('category') }}"
                                   placeholder="Ex : E-commerce"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Lien du projet</label>
                            <input type="url" name="project_url" value="{{ old('project_url') }}"
                                   placeholder="https://..."
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Technologies utilisées</label>
                        <input type="text" name="technologies" value="{{ old('technologies') }}"
                               placeholder="Laravel, MySQL, Orange Money, Tailwind"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                        <p class="text-xs text-gray-500 mt-1">Séparez par des virgules</p>
                    </div>
                </div>
            </div>

            {{-- Étude de cas --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-book-open text-orange-500"></i> Étude de cas
                </h3>
                <p class="text-sm text-gray-500 mb-4">Ces sections apparaîtront sur la page publique de l'étude de cas.</p>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <span class="inline-block bg-orange-500 text-white rounded-full w-6 h-6 text-center text-xs leading-6 mr-2">1</span>
                            Le défi du client
                        </label>
                        <textarea name="problem" rows="4"
                                  placeholder="Quel était le problème du client avant votre intervention ?"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">{{ old('problem') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <span class="inline-block bg-orange-500 text-white rounded-full w-6 h-6 text-center text-xs leading-6 mr-2">2</span>
                            Votre approche / processus
                        </label>
                        <textarea name="process" rows="4"
                                  placeholder="Comment avez-vous abordé le problème ? Vos choix techniques et stratégiques..."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">{{ old('process') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <span class="inline-block bg-orange-500 text-white rounded-full w-6 h-6 text-center text-xs leading-6 mr-2">3</span>
                            La solution livrée
                        </label>
                        <textarea name="solution" rows="4"
                                  placeholder="Décrivez ce que vous avez livré concrètement..."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">{{ old('solution') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <span class="inline-block bg-orange-500 text-white rounded-full w-6 h-6 text-center text-xs leading-6 mr-2">4</span>
                            Les résultats
                        </label>
                        <textarea name="results" rows="4"
                                  placeholder="Ex : +40% de ventes en 3 mois, 100 commandes/mois..."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">{{ old('results') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Métriques (chiffres clés)</label>
                        <div id="metrics-container" class="space-y-2"></div>
                        <button type="button" onclick="addMetric()"
                                class="mt-2 text-sm text-orange-600 hover:text-orange-800 font-medium flex items-center gap-1">
                            <i class="fas fa-plus"></i> Ajouter une métrique
                        </button>
                    </div>
                </div>
            </div>

            {{-- Témoignage --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-quote-left text-orange-500"></i> Témoignage client
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Citation du client</label>
                        <textarea name="testimonial" rows="3"
                                  placeholder="« Grâce à Tiefing, j'ai pu vendre en ligne pour la première fois... »"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">{{ old('testimonial') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Auteur du témoignage</label>
                        <input type="text" name="testimonial_author" value="{{ old('testimonial_author') }}"
                               placeholder="Ex : Mariam Traoré, fondatrice de Belle Cosmétique"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>
            </div>
        </div>

        {{-- SIDEBAR --}}
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-cog text-orange-500"></i> Publication
                </h3>

                <label class="flex items-center gap-2 cursor-pointer mb-3">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                           class="rounded text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">Actif (visible sur le site)</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer mb-3">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                           class="rounded text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">⭐ Mettre en avant</span>
                </label>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ordre d'affichage</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-image text-orange-500"></i> Image principale
                </h3>
                <p class="text-xs text-gray-500 mb-3">Utilisée sur la carte et en bannière.</p>

                <div id="image-preview" class="hidden mb-3">
                    <img src="" class="w-full h-32 object-cover rounded-lg">
                </div>

                <label class="block border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-orange-500 transition cursor-pointer">
                    <input type="file" name="image" accept="image/*" class="hidden" onchange="previewImage(this, 'image-preview')">
                    <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                    <p class="text-sm text-gray-600">Cliquez pour uploader</p>
                    <p class="text-xs text-gray-400 mt-1">JPG, PNG, WEBP · max 10 Mo</p>
                </label>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-camera text-orange-500"></i> Image étude de cas
                </h3>
                <p class="text-xs text-gray-500 mb-3">Optionnelle. Affichée dans la section "Solution".</p>

                <div id="cs-image-preview" class="hidden mb-3">
                    <img src="" class="w-full h-32 object-cover rounded-lg">
                </div>

                <label class="block border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-orange-500 transition cursor-pointer">
                    <input type="file" name="case_study_image" accept="image/*" class="hidden" onchange="previewImage(this, 'cs-image-preview')">
                    <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                    <p class="text-sm text-gray-600">Cliquez pour uploader</p>
                </label>
            </div>
        </div>
    </div>

    <div class="sticky bottom-0 mt-6 px-6 py-4 bg-white border-t border-gray-200 shadow-lg flex justify-end gap-3 rounded-xl">
        <a href="{{ route('admin.projects.index') }}"
           class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
            Annuler
        </a>
        <button type="submit"
                class="px-5 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition shadow-sm">
            <i class="fas fa-save"></i> Créer le projet
        </button>
    </div>
</form>
@endsection

@push('scripts')
<script>
    function addMetric(value = '', label = '') {
        const container = document.getElementById('metrics-container');
        const div = document.createElement('div');
        div.className = 'flex gap-2 items-center';
        div.innerHTML = `
            <input type="text" name="metric_value[]" value="${value}" placeholder="+100"
                   class="w-1/3 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-orange-500">
            <input type="text" name="metric_label[]" value="${label}" placeholder="Commandes"
                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-orange-500">
            <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700 p-2">
                <i class="fas fa-trash"></i>
            </button>
        `;
        container.appendChild(div);
    }

    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById(previewId);
                preview.querySelector('img').src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        addMetric();
    });
</script>
@endpush
