@extends('layouts.admin')

@section('header', 'Modifier le témoignage')
@section('subheader', 'Mettre à jour les informations')

@section('content')
<form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" id="testimonialForm">
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

        <div class="xl:col-span-2 bg-white rounded-xl shadow-md p-6 space-y-4">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Citation *
                    <span class="text-xs text-gray-400 font-normal">(max 500 caractères)</span>
                </label>
                <textarea name="quote" rows="6" required maxlength="500"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 @error('quote') border-red-500 @enderror"
                          oninput="document.getElementById('quoteCount').textContent = this.value.length">{{ old('quote', $testimonial->quote) }}</textarea>
                <div class="flex justify-between mt-1">
                    <span class="text-xs text-gray-400">Pas de HTML autorisé</span>
                    <span class="text-xs text-gray-400"><span id="quoteCount">0</span>/500</span>
                </div>
                @error('quote')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nom *</label>
                    <input type="text" name="author_name" required value="{{ old('author_name', $testimonial->author_name) }}"
                           maxlength="100"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 @error('author_name') border-red-500 @enderror">
                    @error('author_name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Fonction</label>
                    <input type="text" name="author_role" value="{{ old('author_role', $testimonial->author_role) }}"
                           maxlength="100"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Entreprise</label>
                <input type="text" name="company" value="{{ old('company', $testimonial->company) }}"
                       maxlength="100"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Note</label>
                <select name="rating" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ $i }} étoile{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="space-y-6">

            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-cog text-orange-500"></i> Publication
                </h3>
                <label class="flex items-center gap-2 cursor-pointer mb-3">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}
                           class="rounded text-orange-500 focus:ring-orange-500">
                    <span class="text-sm text-gray-700">Actif</span>
                </label>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ordre</label>
                    <input type="number" name="order" value="{{ old('order', $testimonial->order) }}" min="0" max="999"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-user-circle text-orange-500"></i> Avatar
                </h3>

                <div class="flex flex-col items-center mb-4">
                    <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center border-4 border-orange-100 shadow">
                        <img id="avatarPreview" src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->author_name }}" class="w-full h-full object-cover">
                    </div>
                    <p id="avatarInfo" class="text-xs text-gray-500 mt-2 text-center">Avatar actuel</p>
                </div>

                <input type="file" name="author_avatar" id="avatarInput" accept="image/jpeg,image/png,image/webp"
                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                <p class="text-xs text-gray-500 mt-2">
                    <i class="fas fa-info-circle"></i> JPG, PNG, WEBP · <strong>compression automatique</strong>
                </p>

                @error('author_avatar')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>
    </div>

    <div class="mt-6 px-6 py-4 bg-white border-t border-gray-200 shadow-lg flex justify-end gap-3 rounded-xl">
        <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Annuler</a>
        <button type="submit" id="submitBtn" class="px-5 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg flex items-center gap-2">
            <i class="fas fa-save"></i> Mettre à jour
        </button>
    </div>
</form>
@endsection

@push('scripts')
<script>
function compressImage(file, maxSize = 400, quality = 0.85) {
    return new Promise((resolve, reject) => {
        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        if (!allowedTypes.includes(file.type)) {
            return reject(new Error('Format non autorisé. Utilisez JPG, PNG ou WEBP.'));
        }

        if (file.size > 20 * 1024 * 1024) {
            return reject(new Error('Image trop lourde (max 20 Mo).'));
        }

        const reader = new FileReader();
        reader.onerror = () => reject(new Error('Erreur de lecture du fichier.'));

        reader.onload = function (e) {
            const img = new Image();
            img.onerror = () => reject(new Error('Erreur de chargement de l\'image.'));

            img.onload = function () {
                const size = Math.min(img.width, img.height);
                const offsetX = (img.width - size) / 2;
                const offsetY = (img.height - size) / 2;

                const canvas = document.createElement('canvas');
                canvas.width = maxSize;
                canvas.height = maxSize;
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, offsetX, offsetY, size, size, 0, 0, maxSize, maxSize);

                canvas.toBlob(function (blob) {
                    if (!blob) return reject(new Error('Erreur de compression.'));

                    const baseName = file.name.replace(/\.[^/.]+$/, '');
                    const compressedFile = new File([blob], baseName + '.jpg', {
                        type: 'image/jpeg',
                        lastModified: Date.now(),
                    });

                    resolve(compressedFile);
                }, 'image/jpeg', quality);
            };

            img.src = e.target.result;
        };

        reader.readAsDataURL(file);
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('avatarInput');
    const preview = document.getElementById('avatarPreview');
    const info = document.getElementById('avatarInfo');
    const submitBtn = document.getElementById('submitBtn');

    const quoteField = document.querySelector('textarea[name="quote"]');
    if (quoteField) {
        document.getElementById('quoteCount').textContent = quoteField.value.length;
    }

    input.addEventListener('change', async function (e) {
        const originalFile = e.target.files[0];
        if (!originalFile) return;

        info.textContent = '⏳ Compression en cours...';
        info.className = 'text-xs text-gray-500 mt-2 text-center';

        try {
            const compressedFile = await compressImage(originalFile, 400, 0.85);

            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(compressedFile);
            input.files = dataTransfer.files;

            const url = URL.createObjectURL(compressedFile);
            preview.src = url;

            const reduction = Math.round((1 - compressedFile.size / originalFile.size) * 100);
            info.innerHTML = `
                <span class="text-green-600 font-semibold">✅ Compressée</span><br>
                ${(originalFile.size / 1024).toFixed(0)} Ko → ${(compressedFile.size / 1024).toFixed(0)} Ko
                <span class="text-green-600">(-${reduction}%)</span>
            `;
            info.className = 'text-xs text-center mt-2';

        } catch (error) {
            input.value = '';
            info.textContent = '❌ ' + error.message;
            info.className = 'text-xs text-red-600 mt-2 text-center font-semibold';
            alert('❌ ' + error.message);
        }
    });

    document.getElementById('testimonialForm').addEventListener('submit', function () {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi...';
    });
});
</script>
@endpush
