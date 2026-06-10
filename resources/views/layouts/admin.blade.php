<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel | Tiefing Sangare</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
        }
        .sidebar {
            transition: all 0.3s ease;
        }
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: #1e293b;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #ff6c00;
            border-radius: 5px;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.15);
        }
        .table-responsive {
            overflow-x: auto;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="sidebar w-72 bg-gradient-to-b from-gray-900 to-gray-800 text-white flex flex-col shadow-2xl fixed h-full z-50">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-700">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-code text-white text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold">Tiefing Sangare</h2>
                        <p class="text-xs text-gray-400">Administration</p>
                    </div>
                </div>
            </div>

            <!-- User Info -->
            <div class="p-4 border-b border-gray-700">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-orange-500/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-orange-500"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-sm">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-400">{{ Auth::user()->email ?? 'admin@site.com' }}</p>
                    </div>
                </div>
            </div>

           <!-- Navigation -->
            <!-- Navigation -->
<nav class="flex-1 p-4 space-y-1 overflow-y-auto">
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-orange-500 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
        <i class="fas fa-tachometer-alt w-5"></i>
        <span>Dashboard</span>
    </a>

    <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.projects.*') ? 'bg-orange-500 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
        <i class="fas fa-folder-open w-5"></i>
        <span>Projets</span>
    </a>

    <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.services.*') ? 'bg-orange-500 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
        <i class="fas fa-cogs w-5"></i>
        <span>Services</span>
    </a>

    <a href="{{ route('admin.blog.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.blog.*') ? 'bg-orange-500 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
        <i class="fas fa-newspaper w-5"></i>
        <span>Blog</span>
    </a>

    <a href="{{ route('admin.messages') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.messages') ? 'bg-orange-500 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
        <i class="fas fa-envelope w-5"></i>
        <span>Messages</span>
        @if($unreadCount ?? 0 > 0)
            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $unreadCount }}</span>
        @endif
    </a>

    <!-- Séparateur -->
    <div class="pt-4 mt-4 border-t border-gray-700"></div>

    <!-- Profil -->
    <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.profile.*') ? 'bg-orange-500 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
        <i class="fas fa-user-circle w-5"></i>
        <span>Mon profil</span>
    </a>

    <!-- Le lien Paramètres est SUPPRIMÉ -->
</nav>

            <!-- Footer Sidebar -->
            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 rounded-lg text-gray-300 hover:bg-red-600 hover:text-white transition-all duration-200">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-72">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm sticky top-0 z-40">
                <div class="px-6 py-4 flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">@yield('header', 'Dashboard')</h1>
                        <p class="text-sm text-gray-500 mt-1">@yield('subheader', 'Bienvenue dans votre espace d\'administration')</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('home') }}" target="_blank" class="text-gray-600 hover:text-orange-500 transition">
                            <i class="fas fa-globe text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6 fade-in">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-lg">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <p class="text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                            <p class="text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
