<header class="header">
    <div class="fw">
        <div class="logo">
            <a href="{{ route('home') }}" class="logo-link">
                <span class="logo-name">Tiefing SANGARE</span>
                
            </a>
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
                        Services
                    </a>
                </li>
                <li>
                    <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects*') || request()->routeIs('project.*') ? 'active' : '' }}">
                        Réalisations
                    </a>
                </li>

                {{-- ✅ NOUVEAU : Menu déroulant Entreprises --}}
                
                <li>
                    <a href="{{ route('masasugu') }}" class="{{ request()->routeIs('pricing') ? 'active' : '' }}">
                        masasugu
                    </a>
                </li>
                <li>

                <li>
                    <a href="{{ route('pricing') }}" class="{{ request()->routeIs('pricing') ? 'active' : '' }}">
                        Tarifs
                    </a>
                </li>
                <li>
                    <a href="{{ route('process') }}" class="{{ request()->routeIs('process') ? 'active' : '' }}">
                        Process
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
    /* ═══ LOGO AVEC SLOGAN ═══ */
    .header .logo-link {
        display: flex !important;
        flex-direction: column;
        align-items: flex-start;
        gap: 2px;
        text-decoration: none !important;
        line-height: 1.2;
    }
    .header .logo-name {
        font-size: 1.4rem;
        font-weight: 800;
        letter-spacing: -0.5px;
        color: inherit;
        transition: color 0.3s;
    }
    .header .logo-tagline {
        font-size: 0.65rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #ff6c00;
        transition: all 0.3s;
    }
    .header .logo-link:hover .logo-name {
        color: #ff6c00;
    }

    /* ═══ LIEN ACTIF ═══ */
    .header .top-menu ul li a.active,
    .header .top-menu ul li a.active:hover,
    .top-menu ul li a.active,
    .top-menu ul li a.active:visited {
        color: #ff6c00 !important;
        font-weight: 700 !important;
        position: relative;
        opacity: 1 !important;
    }

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

    /* ═══ MENU DÉROULANT ENTREPRISES ═══ */
    .header .top-menu ul li.has-dropdown {
        position: relative;
    }
    .header .top-menu ul li.has-dropdown > a {
        display: inline-flex;
        align-items: center;
        cursor: pointer;
    }
    .header .top-menu ul li.has-dropdown .dropdown-arrow {
        transition: transform 0.3s;
    }
    .header .top-menu ul li.has-dropdown:hover .dropdown-arrow {
        transform: rotate(180deg);
    }

    .header .top-menu ul li.has-dropdown .dropdown {
        position: absolute;
        top: calc(100% + 15px);
        left: 50%;
        transform: translateX(-50%) translateY(10px);
        background: white;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        padding: 10px;
        min-width: 220px;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s;
        z-index: 100;
        list-style: none;
        margin: 0;
    }
    .header .top-menu ul li.has-dropdown .dropdown::before {
        content: '';
        position: absolute;
        top: -8px;
        left: 50%;
        transform: translateX(-50%) rotate(45deg);
        width: 16px;
        height: 16px;
        background: white;
        border-radius: 2px;
    }
    .header .top-menu ul li.has-dropdown:hover .dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
    }

    .header .top-menu ul li.has-dropdown .dropdown li {
        display: block;
        margin: 0;
    }
    .header .top-menu ul li.has-dropdown .dropdown li a {
        display: flex !important;
        align-items: center;
        padding: 12px 16px;
        border-radius: 10px;
        color: #0f172a !important;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none !important;
        transition: all 0.2s;
        white-space: nowrap;
    }
    .header .top-menu ul li.has-dropdown .dropdown li a:hover,
    .header .top-menu ul li.has-dropdown .dropdown li a.active {
        background: #fff7ed;
        color: #ff6c00 !important;
    }
    .header .top-menu ul li.has-dropdown .dropdown li a svg {
        color: #ff6c00;
    }

    /* ═══ RESPONSIVE ═══ */
    @media (max-width: 992px) {
        .header .top-menu ul li a.active {
            background-color: rgba(255, 108, 0, 0.1) !important;
            padding-left: 15px;
            border-left: 3px solid #ff6c00;
        }
        .header .top-menu ul li a.active::after {
            display: none;
        }

        /* Menu déroulant en version mobile */
        .header .top-menu ul li.has-dropdown .dropdown {
            position: static;
            transform: none;
            box-shadow: none;
            padding: 0 0 0 20px;
            opacity: 1;
            visibility: visible;
            display: none;
            background: transparent;
            border-radius: 0;
        }
        .header .top-menu ul li.has-dropdown .dropdown::before {
            display: none;
        }
        .header .top-menu ul li.has-dropdown.open .dropdown {
            display: block;
        }
        .header .top-menu ul li.has-dropdown .dropdown li a {
            padding: 10px 15px;
            color: #94a3b8 !important;
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Toggle du menu déroulant sur mobile
    const dropdownParents = document.querySelectorAll('.header .top-menu ul li.has-dropdown > a');

    dropdownParents.forEach(link => {
        link.addEventListener('click', function (e) {
            // Uniquement sur mobile
            if (window.innerWidth <= 992) {
                e.preventDefault();
                this.parentElement.classList.toggle('open');
            }
        });
    });
});
</script>
@endpush