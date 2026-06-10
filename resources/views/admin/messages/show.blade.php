@extends('layouts.admin')

@section('header', 'Détail du message')
@section('subheader', 'Message de ' . $message->name)

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Contenu principal -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">📝 Contenu du message</h3>
            </div>
            <div class="p-6">
                <div class="mb-4 pb-4 border-b border-gray-100">
                    <h4 class="text-sm font-medium text-gray-500">Sujet</h4>
                    <p class="text-lg font-semibold text-gray-800 mt-1">{{ $message->subject }}</p>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-gray-500">Message</h4>
                    <div class="mt-2 p-4 bg-gray-50 rounded-lg">
                        <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $message->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Colonne latérale -->
    <div class="space-y-6">
        <!-- Informations expéditeur -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">👤 Expéditeur</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                        {{ substr($message->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-xl font-semibold text-gray-800">{{ $message->name }}</p>
                        <p class="text-gray-500">{{ $message->email }}</p>
                        @if($message->phone)
                            <p class="text-gray-500">{{ $message->phone }}</p>
                        @endif
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <div class="flex justify-between py-2">
                        <span class="text-gray-500">Envoyé le</span>
                        <span class="text-gray-700">{{ $message->created_at->format('d/m/Y à H:i') }}</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-gray-500">Il y a</span>
                        <span class="text-gray-700">{{ $message->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-gray-500">Statut</span>
                        @if($message->is_read)
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Lu</span>
                        @else
                            <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs">Non lu</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">🛠️ Actions</h3>
            </div>
            <div class="p-6 space-y-3">
                <a href="mailto:{{ $message->email }}" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Répondre par email
                </a>

                @if(!$message->is_read)
                <form action="{{ route('admin.message.mark-read', $message->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-green-500 text-green-600 rounded-lg hover:bg-green-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Marquer comme lu
                    </button>
                </form>
                @else
                <form action="{{ route('admin.message.mark-unread', $message->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 border border-yellow-500 text-yellow-600 rounded-lg hover:bg-yellow-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Marquer comme non lu
                    </button>
                </form>
                @endif

                <form action="{{ route('admin.message.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Supprimer ce message ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Supprimer le message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-6">
    <a href="{{ route('admin.messages') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Retour à la liste des messages
    </a>
</div>
@endsection
