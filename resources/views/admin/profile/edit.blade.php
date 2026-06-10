@extends('layouts.admin')

@section('header', 'Mon profil')
@section('subheader', 'Modifier vos informations personnelles et réseaux sociaux')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Avatar / Photo de profil -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">🖼️ Photo de profil</h3>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-6">
                    <!-- Avatar actuel -->
                    <div class="relative">
                        @if($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}"
                                 class="w-24 h-24 rounded-full object-cover border-4 border-orange-500 shadow-lg">
                        @else
                            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center text-white text-3xl font-bold shadow-lg">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        @endif
                    </div>

                    <!-- Upload d'avatar -->
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Changer la photo de profil</label>
                        <div class="mt-1 flex items-center gap-4">
                            <label class="cursor-pointer bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition">
                                <span>📁 Choisir un fichier</span>
                                <input type="file" name="avatar" class="hidden" accept="image/*" onchange="previewAvatar(this)">
                            </label>
                            <span class="text-sm text-gray-500">PNG, JPG jusqu'à 2MB</span>
                        </div>
                        <div id="avatar-preview" class="mt-3 hidden">
                            <img id="preview" class="w-20 h-20 rounded-full object-cover border-2 border-orange-500">
                            <p class="text-xs text-gray-500 mt-1">Nouvelle image</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informations personnelles -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">👤 Informations personnelles</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Localisation</label>
                        <input type="text" name="location" value="{{ old('location', $user->location) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Titre professionnel</label>
                        <input type="text" name="title" value="{{ old('title', $user->title) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Entreprise</label>
                        <input type="text" name="company" value="{{ old('company', $user->company) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bio (courte description)</label>
                    <textarea name="bio" rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">{{ old('bio', $user->bio) }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Apparaît dans la sidebar et les sections courtes</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">À propos (description longue)</label>
                    <textarea name="about" rows="6"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">{{ old('about', $user->about) }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Apparaît sur la page "À propos"</p>
                </div>
            </div>
        </div>

        <!-- Réseaux sociaux -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">🌐 Réseaux sociaux</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-youtube text-red-500"></i> YouTube
                        </label>
                        <input type="url" name="youtube" value="{{ old('youtube', $user->youtube) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-facebook text-blue-600"></i> Facebook
                        </label>
                        <input type="url" name="facebook" value="{{ old('facebook', $user->facebook) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-twitter text-blue-400"></i> Twitter/X
                        </label>
                        <input type="url" name="twitter" value="{{ old('twitter', $user->twitter) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-instagram text-pink-500"></i> Instagram
                        </label>
                        <input type="url" name="instagram" value="{{ old('instagram', $user->instagram) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-linkedin text-blue-700"></i> LinkedIn
                        </label>
                        <input type="url" name="linkedin" value="{{ old('linkedin', $user->linkedin) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-github text-gray-800 dark:text-gray-400"></i> GitHub
                        </label>
                        <input type="url" name="github" value="{{ old('github', $user->github) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-whatsapp text-green-500"></i> WhatsApp
                        </label>
                        <input type="url" name="whatsapp" value="{{ old('whatsapp', $user->whatsapp) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-telegram text-blue-500"></i> Telegram
                        </label>
                        <input type="url" name="telegram" value="{{ old('telegram', $user->telegram) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-tiktok text-black dark:text-white"></i> TikTok
                        </label>
                        <input type="url" name="tiktok" value="{{ old('tiktok', $user->tiktok) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-discord text-indigo-500"></i> Discord
                        </label>
                        <input type="url" name="discord" value="{{ old('discord', $user->discord) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>
            </div>
        </div>

        <!-- Liens professionnels -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800"> Liens professionnels</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Portfolio / Site web</label>
                        <input type="url" name="portfolio_url" value="{{ old('portfolio_url', $user->portfolio_url) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Blog</label>
                        <input type="url" name="blog_url" value="{{ old('blog_url', $user->blog_url) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">CV en ligne</label>
                        <input type="url" name="cv_url" value="{{ old('cv_url', $user->cv_url) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Calendly (prise de RDV)</label>
                        <input type="url" name="calendly_url" value="{{ old('calendly_url', $user->calendly_url) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500">
                    </div>
                </div>
            </div>
        </div>

        <!-- Boutons -->
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                Annuler
            </a>
            <button type="submit" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition">
                Enregistrer les modifications
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function previewAvatar(input) {
        const previewDiv = document.getElementById('avatar-preview');
        const previewImg = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewDiv.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
@endsection
