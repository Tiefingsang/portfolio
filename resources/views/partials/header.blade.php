{{-- <header class="header">
    <div class="fw">
        <div class="logo">
            <a href="#">Tiefing SANGARE</a>
        </div>
        <a href="#" class="menu-btn"><span></span></a>
        <div class="top-menu">
            <ul>
                <li><a href="#about-section">About</a></li>
                <li><a href="#services-section">What I Do</a></li>
                <li><a href="#works-section">Works</a></li>
                <li><a href="#blog-section">Blog</a></li>
                <li><a href="#contact-section">Contact</a></li>
            </ul>
            <a href="#" class="close"></a>
        </div>
    </div>
</header> --}}


<header class="header">
    <div class="fw">
        <div class="logo">
            <a href="{{ route('home') }}">Tiefing SANGARE</a>
        </div>
        <a href="#" class="menu-btn"><span></span></a>
        <div class="top-menu">
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('about') }}">À propos</a></li>
                <li><a href="{{ route('services') }}">Mes services</a></li>
                <li><a href="{{ route('projects') }}">Réalisations</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href={{ route("contact") }}>Contact</a></li>
            </ul>
            <a href="#" class="close"></a>
        </div>
    </div>
</header>
