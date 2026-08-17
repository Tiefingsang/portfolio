@extends('layouts.admin')

@section('header', 'Rédiger un article')
@section('subheader', 'Créez un article de blog professionnel')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
    .note-editor {
        border-radius: 5px !important;
    }
    .note-toolbar {
        background: #f8f9fa !important;
        border-bottom: 1px solid #dee2e6 !important;
    }
    .note-editable {
        min-height: 400px !important;
    }
</style>
@endsection

@section('content')
<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" id="blogForm">
        @csrf

        <div class="p-6 space-y-6">
            <!-- TITRE -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Titre *</label>
                <input type="text" name="title" id="title"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('title') border-red-500 @enderror"
                       value="{{ old('title') }}"
                       placeholder="Titre de l'article" required>
                <div class="mt-1 text-sm text-gray-400">
                    <i class="fas fa-link"></i> Slug : <span id="slugPreview" class="text-orange-500 font-medium">-</span>
                </div>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- RÉSUMÉ -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Résumé *</label>
                <textarea name="excerpt" id="excerpt" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('excerpt') border-red-500 @enderror"
                          placeholder="Court résumé de l'article">{{ old('excerpt') }}</textarea>
                <div class="mt-1 text-sm text-gray-400">
                    <span id="excerptCount" class="text-orange-500 font-medium">0</span> / 500 caractères
                </div>
                @error('excerpt')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- IMAGE -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Image de couverture</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-orange-500 transition @error('image') border-red-500 @enderror">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m-4-4l-4 4m8-24l4-4m0 0l4 4m-4-4v12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-orange-600 hover:text-orange-500">
                                <span>Télécharger une image</span>
                                <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                            </label>
                            <p class="pl-1">ou glisser-déposer</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF, WEBP jusqu'à 20MB</p>
                    </div>
                </div>
                <div id="image-preview" class="mt-3 hidden">
                    <img id="preview" class="h-32 w-auto rounded-lg shadow">
                </div>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- CONTENU -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Contenu *</label>
                <textarea name="content" id="content" rows="15"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 @error('content') border-red-500 @enderror"
                          placeholder="Votre contenu ici...">{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- OPTIONS -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_published" id="is_published" checked
                               class="rounded focus:ring-orange-500">
                        <span class="text-sm text-gray-700">✅ Publier immédiatement</span>
                    </label>
                </div>
                <div>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1"
                               class="rounded focus:ring-orange-500">
                        <span class="text-sm text-gray-700">⭐ Mettre en avant</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
            <a href="{{ route('admin.blog.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                Annuler
            </a>
            <button type="submit" name="save_draft" value="1" class="px-4 py-2 border border-yellow-500 text-yellow-600 hover:bg-yellow-50 rounded-lg transition">
                Brouillon
            </button>
            <button type="submit" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition">
                Publier
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-fr-FR.min.js"></script>

<script>
$(document).ready(function() {
    // Initialisation de Summernote
    $('#content').summernote({
        height: 400,
        placeholder: 'Rédigez votre article ici...',
        lang: 'fr-FR',
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onImageUpload: function(files) {
                for (var i = 0; i < files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#content').summernote('insertImage', e.target.result);
                    };
                    reader.readAsDataURL(files[i]);
                }
            },
            onChange: function(contents, $editable) {
                $('#content').val(contents);
            }
        }
    });

    // Génération du slug
    $('#title').on('keyup', function() {
        var val = $(this).val();
        var slug = val.toLowerCase()
            .replace(/[^\w\s]/g, '')
            .replace(/\s+/g, '-')
            .substring(0, 80);
        $('#slugPreview').text(slug || '-');
    });

    // Compteur de caractères
    $('#excerpt').on('input', function() {
        var count = $(this).val().length;
        var display = $('#excerptCount');
        display.text(count);
        display.css('color', count > 500 ? '#ef4444' : '#ff6c00');
    });

    // Aperçu de l'image
    $('#image').on('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
                $('#image-preview').removeClass('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Synchronisation avant soumission
    $('#blogForm').on('submit', function() {
        if (typeof $('#content').summernote !== 'undefined') {
            var content = $('#content').summernote('code');
            $('#content').val(content);
        }
    });
});
</script>
@endpush
@endsection
