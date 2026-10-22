<header class="header">
    <div class="fw">
        <div class="logo">
            <a href="{{ route('home') }}">Tiefing SANGARE</a>
        </div>
        <a href="#" class="menu-btn"><span></span></a>
        <div class="top-menu">
            <ul>
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        Accueil
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        À propos
                    </a>
                </li>
                <li>
                    <a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">
                        Mes services
                    </a>
                </li>
                <li>
                    <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects*') ? 'active' : '' }}">
                        Réalisations
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog*') ? 'active' : '' }}">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        Contact
                    </a>
                </li>
            </ul>
            <a href="#" class="close"></a>
        </div>
    </div>
</header>

@push('styles')
<style>
    /* ═══════════════════════════════════════════════
       STYLE DU LIEN ACTIF (Header) - FORCÉ
    ═══════════════════════════════════════════════ */

    /* On cible avec plusieurs sélecteurs pour être sûr de passer */
    .header .top-menu ul li a.active,
    .header .top-menu ul li a.active:hover,
    .top-menu ul li a.active,
    .top-menu ul li a.active:visited {
        color: #ff6c00 !important; /* Couleur orange */
        font-weight: 700 !important;
        position: relative;
        opacity: 1 !important;
    }

    /* Petite barre orange sous le lien actif */
    .header .top-menu ul li a.active::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 2px;
        background: #ff6c00;
        border-radius: 2px;
    }

    /* Sur mobile, le lien actif a un fond orange léger */
    @media (max-width: 992px) {
        .header .top-menu ul li a.active {
            background-color: rgba(255, 108, 0, 0.1) !important;
            padding-left: 15px;
            border-left: 3px solid #ff6c00;
        }
        .header .top-menu ul li a.active::after {
            display: none;
        }
    }
</style>
@endpush
