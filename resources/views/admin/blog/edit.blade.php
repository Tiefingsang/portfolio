@extends('layouts.admin')

@section('header', 'Modifier l\'article')
@section('subheader', 'Mettez à jour les informations de votre article')

@push('styles')
<style>
    .tox-tinymce {
        border-radius: 8px !important;
        border: 1px solid #d1d5db !important;
    }
    .tox-tinymce:focus-within {
        border-color: #ff6c00 !important;
        box-shadow: 0 0 0 3px rgba(255, 108, 0, 0.15) !important;
    }
    .tox .tox-toolbar__primary,
    .tox .tox-toolbar-overlord { background: #f9fafb !important; }
    .tox .tox-tbtn:hover,
    .tox .tox-tbtn--enabled {
        background: #fff7ed !important;
        color: #ff6c00 !important;
    }
    .tox .tox-tbtn--enabled svg { fill: #ff6c00 !important; }
    .tox .tox-edit-area__iframe { background: #fff !important; }
    .tox-statusbar {
        background: #f9fafb !important;
        border-top: 1px solid #e5e7eb !important;
        font-size: 14px !important;
        padding: 8px 12px !important;
    }
    .tox-statusbar__text-container {
        font-size: 14px !important;
        font-weight: 600 !important;
        color: #475569 !important;
    }
    .tox-statusbar__wordcount {
        font-size: 14px !important;
        font-weight: 700 !important;
        color: #ff6c00 !important;
    }

    .dropzone-active {
        border-color: #ff6c00 !important;
        background: #fff7ed !important;
    }

    .editor-stats {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        font-size: 0.95rem;
        font-weight: 600;
        color: #475569;
    }
    .editor-stats span {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }
    .editor-stats i {
        color: #ff6c00;
        font-size: 1rem;
    }
    .editor-stats .stat-value {
        color: #0f172a;
        font-weight: 800;
        font-size: 1rem;
    }

    .char-counter {
        font-size: 0.9rem !important;
        font-weight: 600 !important;
        color: #64748b !important;
        padding: 4px 0 !important;
    }
    .char-counter .count {
        color: #ff6c00 !important;
        font-weight: 800 !important;
        font-size: 0.95rem !important;
    }
    .char-counter .label {
        color: #94a3b8 !important;
        font-weight: 500 !important;
    }
</style>
@endpush

@section('content')
<form action="{{ route('admin.blog.update', $post->id) }}" method="POST" enctype="multipart/form-data" id="blogForm">
    @csrf
    @method('PUT')

    @if($errors->any())
    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
        <ul class="list-disc list-inside text-red-700 text-sm">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <div class="xl:col-span-2 space-y-6">

            {{-- Titre + Slug --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Titre de l'article *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required
                       placeholder="Un titre accrocheur qui donne envie de lire…"
                       class="w-full text-2xl font-bold px-4 py-3 border border-gray-300 rounded-lg
                              focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                              @error('title') border-red-500 @enderror">

                <div class="mt-3 flex items-center gap-2 rounded-lg bg-gray-50 border border-gray-200 px-3 py-2">
                    <i class="fas fa-link text-gray-400 text-sm"></i>
                    <span class="text-xs text-gray-500">/blog/</span>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}"
                           class="flex-1 bg-transparent border-0 text-sm text-orange-600 font-medium
                                  focus:ring-0 focus:outline-none p-0">
                </div>

                <div class="mt-3 flex justify-end">
                    <span class="char-counter">
                        <span id="titleCount" class="count">0</span>
                        <span class="label">caractères</span>
                    </span>
                </div>
                @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            {{-- Résumé (sans limite) --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Résumé / Meta description *
                    <span class="text-xs text-gray-400 font-normal">(affiché sur Google et réseaux sociaux)</span>
                </label>
                <textarea name="excerpt" id="excerpt" rows="5" required
                          placeholder="Résumé percutant de l'article…"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg
                                 focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                 @error('excerpt') border-red-500 @enderror">{{ old('excerpt', $post->excerpt) }}</textarea>

                <div class="mt-3 flex justify-end">
                    <span class="char-counter">
                        <span id="excerptCount" class="count">0</span>
                        <span class="label">caractères</span>
                    </span>
                </div>
                @error('excerpt')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            {{-- Éditeur --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center justify-between mb-3">
                    <label class="text-sm font-medium text-gray-700">Contenu *</label>
                    <div class="editor-stats">
                        <span>
                            <i class="fas fa-file-word"></i>
                            <span id="wordCount" class="stat-value">0</span>
                            <span>mots</span>
                        </span>
                        <span>
                            <i class="fas fa-clock"></i>
                            <span id="readTime" class="stat-value">0</span>
                            <span>min</span>
                        </span>
                    </div>
                </div>

                <textarea name="content" id="content" class="summernote-hidden">{{ old('content', $post->content) }}</textarea>
                <textarea id="editor">{{ old('content', $post->content) }}</textarea>
                @error('content')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            {{-- SEO AVANCÉ --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-search text-orange-500"></i> SEO & Métadonnées
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Meta title (balise &lt;title&gt;)
                        </label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}"
                               placeholder="Titre optimisé pour Google"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">

                        <div class="mt-2 flex justify-between items-center">
                            <span class="text-sm text-gray-500">Si vide, le titre de l'article sera utilisé</span>
                            <span class="char-counter">
                                <span id="metaTitleCount" class="count">0</span>
                                <span class="label">caractères</span>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Mots-clés SEO
                            <span class="text-xs text-gray-400 font-normal">(séparés par virgules)</span>
                        </label>
                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords', is_array($post->meta_keywords) ? implode(', ', $post->meta_keywords) : '') }}"
                               placeholder="développeur web mali, laravel bamako, création site web"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">

            {{-- Publication --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-cog text-orange-500"></i> Publication
                </h3>
                <label class="flex items-center justify-between cursor-pointer mb-3">
                    <span class="text-sm text-gray-700">Statut</span>
                    <select name="is_published" id="is_published"
                            class="text-sm border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                        <option value="1" {{ old('is_published', $post->is_published) ? 'selected' : '' }}>Publié</option>
                        <option value="0" {{ old('is_published', $post->is_published) ? '' : 'selected' }}>Brouillon</option>
                    </select>
                </label>
                <label class="flex items-center gap-2 cursor-pointer mt-4">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}
                           class="rounded text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">⭐ Mettre en avant</span>
                </label>
            </div>

            {{-- Catégorie --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-folder text-orange-500"></i> Catégorie
                </h3>
                <select name="category_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                    <option value="">— Aucune catégorie —</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $post->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                <a href="{{ route('admin.categories.create') }}" target="_blank"
                   class="text-sm text-orange-600 hover:text-orange-800 mt-3 inline-flex items-center gap-1">
                    <i class="fas fa-plus"></i> Créer une nouvelle catégorie
                </a>
            </div>

            {{-- Auteur --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-user text-orange-500"></i> Auteur
                </h3>
                <input type="text" name="author" id="author" value="{{ old('author', $post->author ?? 'Tiefing Sangare') }}"
                       placeholder="Tiefing Sangare"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                <p class="text-sm text-gray-500 mt-2">Par défaut : Tiefing Sangare</p>
            </div>

            {{-- Tags --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-tags text-orange-500"></i> Tags
                </h3>
                <input type="text" name="tags" id="tags" value="{{ old('tags', is_array($post->tags) ? implode(', ', $post->tags) : '') }}"
                       placeholder="laravel, php, mali, freelance"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                <p class="text-sm text-gray-500 mt-2">Séparez par des virgules</p>
                <div id="tagsPreview" class="flex flex-wrap gap-2 mt-3"></div>
            </div>

            {{-- Image couverture --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-image text-orange-500"></i> Image de couverture
                </h3>

                @if($post->image)
                <div class="mb-4">
                    <p class="text-xs text-gray-500 mb-1">Image actuelle :</p>
                    <img src="{{ Storage::url($post->image) }}" class="w-full h-40 object-cover rounded-lg shadow">
                </div>
                @endif

                <div id="dropzone"
                     class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center
                            hover:border-orange-500 transition cursor-pointer">
                    <svg class="mx-auto h-10 w-10 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-sm text-gray-600">{{ $post->image ? 'Remplacer l\'image' : 'Glisser une image' }}</p>
                </div>
                <div id="image-preview" class="mt-3 hidden relative">
                    <img id="preview" class="w-full h-40 object-cover rounded-lg shadow">
                    <button type="button" id="removeImage"
                            class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-7 h-7
                                   flex items-center justify-center hover:bg-red-600">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>
                <input type="file" id="image" name="image" accept="image/*" class="hidden">
                @error('image')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            {{-- SEO Check --}}
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
                    <i class="fas fa-check-circle text-orange-500"></i> SEO Check
                </h3>
                <ul class="space-y-2 text-sm">
                    <li id="seo-title" class="flex items-center gap-2 text-gray-400">
                        <i class="fas fa-circle text-[8px]"></i> Titre entre 30 et 60 caractères
                    </li>
                    <li id="seo-meta" class="flex items-center gap-2 text-gray-400">
                        <i class="fas fa-circle text-[8px]"></i> Meta entre 120 et 160 caractères
                    </li>
                    <li id="seo-slug" class="flex items-center gap-2 text-gray-400">
                        <i class="fas fa-circle text-[8px]"></i> Slug défini
                    </li>
                    <li id="seo-image" class="flex items-center gap-2 text-gray-400">
                        <i class="fas fa-circle text-[8px]"></i> Image de couverture
                    </li>
                    <li id="seo-content" class="flex items-center gap-2 text-gray-400">
                        <i class="fas fa-circle text-[8px]"></i> Contenu &gt; 300 mots
                    </li>
                    <li id="seo-category" class="flex items-center gap-2 text-gray-400">
                        <i class="fas fa-circle text-[8px]"></i> Catégorie définie
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="sticky bottom-0 mt-6 px-6 py-4 bg-white border-t border-gray-200 shadow-lg flex justify-end gap-3 rounded-xl">
        <a href="{{ route('admin.blog.index') }}"
           class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
            Annuler
        </a>
        <button type="submit"
                class="px-5 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition shadow-sm">
            <i class="fas fa-save"></i> Mettre à jour
        </button>
    </div>
</form>
@endsection

@push('scripts')
<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof tinymce === 'undefined') {
        alert('TinyMCE non chargé. Vérifie public/vendor/tinymce/tinymce.min.js');
        return;
    }

    const csrfToken = '{{ csrf_token() }}';
    const uploadUrl = '{{ route("admin.blog.upload-image") }}';

    tinymce.init({
        selector: '#editor',
        license_key: 'gpl',
        height: 650,
        menubar: 'edit view insert format tools table help',
        branding: false,
        promotion: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'visualchars', 'code',
            'fullscreen', 'insertdatetime', 'media', 'table', 'help', 'wordcount',
            'emoticons', 'codesample', 'pagebreak', 'nonbreaking', 'quickbars'
        ],
        toolbar: [
            'undo redo | blocks fontsize | bold italic underline strikethrough | forecolor backcolor',
            'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            'link image media table | charmap emoticons codesample hr pagebreak',
            'removeformat | visualblocks visualchars | code preview fullscreen | help'
        ],
        quickbars_selection_toolbar: 'bold italic underline | h2 h3 blockquote',
        quickbars_insert_toolbar: 'quickimage quicktable',
        automatic_uploads: true,
        paste_data_images: true,
        image_uploadtab: true,
        file_picker_types: 'image',
        image_title: true,
        image_caption: true,
        image_advtab: true,
        extended_valid_elements: 'img[class|src|border=0|alt|title|hspace|vspace|width|height|align|name|style|loading|data-*]',
        relative_urls: false,
        remove_script_host: false,
        convert_urls: false,
        images_upload_handler: function (blobInfo, progress) {
            return new Promise(function (resolve, reject) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', uploadUrl);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.upload.onprogress = function (e) {
                    if (e.lengthComputable) progress(e.loaded / e.total * 100);
                };
                xhr.onload = function () {
                    if (xhr.status !== 200) return reject('Erreur HTTP ' + xhr.status);
                    let json;
                    try { json = JSON.parse(xhr.responseText); }
                    catch (e) { return reject('Réponse non-JSON'); }
                    if (!json || !json.url) return reject('URL manquante');
                    resolve(json.url);
                };
                xhr.onerror = () => reject('Erreur réseau');
                const fd = new FormData();
                fd.append('image', blobInfo.blob(), blobInfo.filename());
                xhr.send(fd);
            });
        },
        content_style: `
            body { font-family: 'Inter', sans-serif; font-size: 16px; line-height: 1.75; color: #1f2937; padding: 1rem; }
            img { max-width: 100%; height: auto; border-radius: 0.5rem; margin: 1rem 0; display: block; }
            h1 { font-size: 2rem; font-weight: 700; margin: 1.5rem 0 1rem; }
            h2 { font-size: 1.5rem; font-weight: 700; margin: 1.5rem 0 0.75rem; }
            h3 { font-size: 1.25rem; font-weight: 600; margin: 1.25rem 0 0.5rem; }
            p { margin-bottom: 1rem; }
            blockquote { border-left: 4px solid #ff6c00; padding-left: 1rem; margin: 1rem 0; font-style: italic; color: #4b5563; }
            a { color: #ff6c00; text-decoration: underline; }
            pre { background: #1f2937; color: #f3f4f6; padding: 1rem; border-radius: 0.5rem; overflow-x: auto; font-size: 0.875rem; }
            code { background: #f3f4f6; padding: 0.125rem 0.375rem; border-radius: 0.25rem; }
            table { width: 100%; border-collapse: collapse; }
            th, td { border: 1px solid #e5e7eb; padding: 0.5rem; text-align: left; }
            th { background: #f9fafb; }
        `,
        setup: function (editor) {
            editor.on('init', function () { updateStats(); checkSeo(); });
            editor.on('input change undo redo setcontent keyup', function () { updateStats(); checkSeo(); });
            editor.on('drop', function (e) {
                const dt = e.dataTransfer;
                if (!dt || !dt.files || dt.files.length === 0) return;
                for (const file of dt.files) {
                    if (!file.type.startsWith('image/')) continue;
                    const fd = new FormData();
                    fd.append('image', file);
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', uploadUrl);
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                    xhr.setRequestHeader('Accept', 'application/json');
                    xhr.onload = function () {
                        if (xhr.status !== 200) return;
                        try {
                            const json = JSON.parse(xhr.responseText);
                            if (json.url) editor.insertContent('<img src="' + json.url + '" alt="" />');
                        } catch (e) {}
                    };
                    xhr.send(fd);
                }
            });
        }
    });

    function updateStats() {
        const editor = tinymce.get('editor');
        if (!editor) return;
        const text = editor.getContent({ format: 'text' }).trim();
        const words = text ? text.split(/\s+/).filter(w => w.length > 0).length : 0;
        document.getElementById('wordCount').textContent = words;
        document.getElementById('readTime').textContent = Math.max(1, Math.ceil(words / 200));
    }

    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    let slugManuallyEdited = true;
    slugInput.addEventListener('input', () => { slugManuallyEdited = true; });
    titleInput.addEventListener('input', function () {
        const t = this.value;
        const countEl = document.getElementById('titleCount');
        countEl.textContent = t.length;
        countEl.style.color = (t.length >= 30 && t.length <= 60) ? '#16a34a' : '#ff6c00';

        if (!slugManuallyEdited) {
            slugInput.value = t.toLowerCase()
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9\s-]/g, '')
                .trim().replace(/\s+/g, '-');
        }
        checkSeo();
    });

    const excerptInput = document.getElementById('excerpt');
    excerptInput.addEventListener('input', function () {
        const n = this.value.length;
        const el = document.getElementById('excerptCount');
        el.textContent = n;
        el.style.color = (n >= 120 && n <= 160) ? '#16a34a' : '#ff6c00';
        checkSeo();
    });

    const metaTitleInput = document.getElementById('meta_title');
    if (metaTitleInput) {
        metaTitleInput.addEventListener('input', function () {
            const el = document.getElementById('metaTitleCount');
            el.textContent = this.value.length;
            el.style.color = this.value.length >= 50 ? '#16a34a' : '#ff6c00';
        });
        metaTitleInput.dispatchEvent(new Event('input'));
    }

    const tagsInput = document.getElementById('tags');
    const tagsPreview = document.getElementById('tagsPreview');
    if (tagsInput) {
        function renderTags() {
            tagsPreview.innerHTML = '';
            const tags = tagsInput.value.split(',').map(t => t.trim()).filter(t => t);
            tags.forEach(tag => {
                const span = document.createElement('span');
                span.className = 'px-2 py-1 bg-orange-100 text-orange-700 text-xs rounded-full';
                span.textContent = tag;
                tagsPreview.appendChild(span);
            });
        }
        tagsInput.addEventListener('input', renderTags);
        renderTags();
    }

    const dropzone = document.getElementById('dropzone');
    const imageInput = document.getElementById('image');
    const preview = document.getElementById('preview');
    const previewWrap = document.getElementById('image-preview');
    const removeBtn = document.getElementById('removeImage');

    dropzone.addEventListener('click', () => imageInput.click());
    dropzone.addEventListener('dragover', e => { e.preventDefault(); dropzone.classList.add('dropzone-active'); });
    dropzone.addEventListener('dragleave', () => dropzone.classList.remove('dropzone-active'));
    dropzone.addEventListener('drop', e => {
        e.preventDefault();
        dropzone.classList.remove('dropzone-active');
        const f = e.dataTransfer.files[0];
        if (f && f.type.startsWith('image/')) {
            imageInput.files = e.dataTransfer.files;
            showPreview(f);
        }
    });
    imageInput.addEventListener('change', e => {
        if (e.target.files[0]) showPreview(e.target.files[0]);
    });

    function showPreview(file) {
        const reader = new FileReader();
        reader.onload = ev => {
            preview.src = ev.target.result;
            previewWrap.classList.remove('hidden');
            checkSeo();
        };
        reader.readAsDataURL(file);
    }

    removeBtn.addEventListener('click', () => {
        imageInput.value = '';
        previewWrap.classList.add('hidden');
        preview.src = '';
        checkSeo();
    });

    function checkSeo() {
        const editor = tinymce.get('editor');
        const words = editor
            ? editor.getContent({ format: 'text' }).split(/\s+/).filter(w => w.length > 0).length
            : 0;
        const hasImage = previewWrap.classList.contains('hidden') ? {{ $post->image ? 'true' : 'false' }} : true;

        toggleSeo('seo-title',   titleInput.value.length >= 30 && titleInput.value.length <= 60);
        toggleSeo('seo-meta',    excerptInput.value.length >= 120 && excerptInput.value.length <= 160);
        toggleSeo('seo-slug',    slugInput.value.length > 0);
        toggleSeo('seo-image',   hasImage);
        toggleSeo('seo-content', words >= 300);
        toggleSeo('seo-category', document.querySelector('[name="category_id"]').value !== '');
    }

    function toggleSeo(id, ok) {
        const li = document.getElementById(id);
        if (!li) return;
        li.classList.toggle('text-green-600', ok);
        li.classList.toggle('text-gray-400', !ok);
        const icon = li.querySelector('i');
        if (icon) icon.className = ok ? 'fas fa-check-circle' : 'fas fa-circle text-[8px]';
    }

    document.getElementById('blogForm').addEventListener('submit', function (e) {
        const editor = tinymce.get('editor');
        if (!editor) { e.preventDefault(); return; }
        const content = editor.getContent();
        if (!content.trim() || content === '<p></p>') {
            e.preventDefault();
            alert('Le contenu ne peut pas être vide.');
            editor.focus();
            return;
        }
        document.getElementById('content').value = content;
    });

    titleInput.dispatchEvent(new Event('input'));
    excerptInput.dispatchEvent(new Event('input'));
});
</script>
@endpush
