<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Mes Annonces') - EtudiLog Douala</title>

    {{-- Pour la prod, migre idéalement vers un build Tailwind (Vite) plutôt que le CDN --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
        }
        .material-symbols-outlined.filled {
            font-variation-settings:
                'FILL' 1,
                'wght' 500,
                'GRAD' 0,
                'opsz' 24;
        }
        body { font-family: 'Inter', sans-serif; }
        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-container-high": "#dce9ff",
                        "surface-container-highest": "#d3e4fe",
                        "on-primary-fixed-variant": "#264191",
                        "on-secondary-fixed-variant": "#783200",
                        "on-surface": "#0b1c30",
                        "inverse-primary": "#b6c4ff",
                        "secondary-fixed": "#ffdbca",
                        "on-primary": "#ffffff",
                        "error": "#ba1a1a",
                        "surface-dim": "#cbdbf5",
                        "inverse-on-surface": "#eaf1ff",
                        "primary-fixed-dim": "#b6c4ff",
                        "primary-container": "#1e3a8a",
                        "outline-variant": "#c5c5d3",
                        "inverse-surface": "#213145",
                        "primary-fixed": "#dce1ff",
                        "surface-container": "#e5eeff",
                        "secondary": "#9d4300",
                        "tertiary-container": "#384055",
                        "surface-tint": "#4059aa",
                        "on-primary-container": "#90a8ff",
                        "on-tertiary-fixed": "#131b2e",
                        "secondary-fixed-dim": "#ffb690",
                        "on-secondary": "#ffffff",
                        "primary": "#00236f",
                        "on-secondary-container": "#5c2400",
                        "on-error-container": "#93000a",
                        "on-surface-variant": "#444651",
                        "tertiary": "#222a3e",
                        "surface-bright": "#f8f9ff",
                        "on-error": "#ffffff",
                        "on-primary-fixed": "#00164e",
                        "tertiary-fixed": "#dae2fd",
                        "surface-container-low": "#eff4ff",
                        "background": "#f8f9ff",
                        "surface": "#f8f9ff",
                        "on-tertiary-container": "#a4acc5",
                        "tertiary-fixed-dim": "#bec6e0",
                        "on-background": "#0b1c30",
                        "secondary-container": "#fd761a",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary-fixed": "#341100",
                        "on-tertiary": "#ffffff",
                        "surface-variant": "#d3e4fe",
                        "on-tertiary-fixed-variant": "#3f465c",
                        "error-container": "#ffdad6",
                        "outline": "#757682"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "md": "16px",
                        "sm": "8px",
                        "lg": "24px",
                        "gutter": "20px",
                        "xs": "4px",
                        "base": "4px",
                        "xl": "40px",
                        "container-max": "1280px"
                    },
                    "fontFamily": {
                        "caption": ["Inter"],
                        "headline-lg": ["Inter"],
                        "display": ["Inter"],
                        "headline-md": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-md": ["Inter"]
                    },
                    "fontSize": {
                        "caption": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "display": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "label-md": ["14px", {"lineHeight": "20px", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-background text-on-background min-h-screen">

    {{-- ====================== TOP NAVBAR ====================== --}}
    <header class="sticky top-0 w-full z-50 flex justify-between items-center px-lg py-md bg-surface-container-lowest border-b border-outline-variant shadow-sm mx-auto">
        <button onclick="toggleSidebar()" class="lg:hidden text-primary text-3xl"> ☰ </button>
        <script> function toggleSidebar(){

                    let sidebar = document.getElementById('sidebar');

                    sidebar.classList.toggle('-translate-x-full');

                }

        </script>

        <div class="flex items-center gap-lg">
            <span class="text-headline-md font-headline-md font-bold text-primary">EtudiLog Douala</span>
            <nav class="hidden md:flex gap-md">
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/') }}">Accueil</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ Route::has('logements.index') ? route('logements.index') : '#' }}">Logements</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200" href="{{ url('/faq') }}">FAQ</a>
            </nav>
        </div>
        <div class="flex items-center gap-md">

            @auth

                @if(auth()->user()->role === 'proprietaire')

                    <button class="font-label-md text-label-md text-primary font-bold border-b-2 border-primary pb-1 active:scale-95 transition-transform">
                        Tableau de bord
                    </button>

                @elseif(auth()->user()->role === 'etudiant')

                    <a href="{{ route('logements.index') }}"
                    class="font-label-md text-label-md text-primary font-bold border-b-2 border-primary pb-1 active:scale-95 transition-transform">
                        Explorer
                    </a>

                @elseif(auth()->user()->role === 'admin')

                    <a href="{{ route('admin.dashboard') }}"
                    class="font-label-md text-label-md text-primary font-bold border-b-2 border-primary pb-1 active:scale-95 transition-transform">
                        Administration
                    </a>

                @endif


                <form method="POST" action="{{ Route::has('logout') ? route('logout') : '#' }}">
                    @csrf
                    <button type="submit" class="font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-low px-md py-sm rounded-lg transition-all active:scale-95">
                        Déconnexion
                    </button>
                </form>
            @else
                <a href="{{ Route::has('login') ? route('login') : '#' }}" class="font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-low px-md py-sm rounded-lg transition-all active:scale-95">
                    Connexion
                </a>
            @endauth
        </div>
    </header>

    <div class="flex">

        {{-- ====================== SIDE NAVBAR ====================== --}}
        <aside id="sidebar"
            class="fixed left-0 top-16 w-64 h-[calc(100vh-64px)]
            bg-surface-container-low border-r border-outline-variant
            p-md flex-col shadow-md z-50
            transform -translate-x-full lg:translate-x-0 transition-transform duration-300">

            <div class="flex items-center gap-3">

    <img
        src="{{ auth()->user()->photo_profil_url }}"
        alt="Photo profil"
        class="
            w-10
            h-10
            rounded-full
            object-cover
            border
            border-outline-variant
        "
    >

    <div class="hidden md:block">

        <p class="font-semibold">
            {{ auth()->user()->name }}
        </p>

        <p class="text-sm text-on-surface-variant">
            {{ ucfirst(auth()->user()->role) }}
        </p>

    </div>

</div>

            <nav class="flex flex-col gap-sm flex-grow">


                @auth


                    @if(auth()->user()->isProprietaire())


                        <!-- PROPRIETAIRE -->

                        <a href="{{ route('proprietaire.logements.index') }}"
                        class="rounded-lg flex items-center gap-md px-md py-sm cursor-pointer active:opacity-80 transition-all
                        {{ request()->routeIs('logements.index') ? 'bg-primary-container text-on-primary-container' : 'text-on-surface-variant hover:bg-surface-container-high' }}">

                        <span class="material-symbols-outlined">list_alt</span>

                        <span class="font-label-md text-label-md">
                            Mes annonces
                        </span>

                        </a>



                        <a href="{{ route('proprietaire.logements.create') }}"
                        class="rounded-lg flex items-center gap-md px-md py-sm cursor-pointer active:opacity-80 transition-all text-on-surface-variant hover:bg-surface-container-high">

                        <span class="material-symbols-outlined">
                        add_box
                        </span>

                        <span class="font-label-md text-label-md">
                        Ajouter
                        </span>

                        </a>



                        <a href="#"
                        class="text-on-surface-variant flex items-center gap-md px-md py-sm hover:bg-surface-container-high rounded-lg">

                        <span class="material-symbols-outlined">
                        mail
                        </span>

                        <span class="font-label-md text-label-md">
                        Demandes reçues
                        </span>

                        </a>



                    @elseif(auth()->user()->isEtudiant())


                        <!-- ETUDIANT -->


                        <a href="{{ route('logements.index') }}"
                        class="rounded-lg flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container-high">

                        <span class="material-symbols-outlined">
                            search
                        </span>

                        <span class="font-label-md text-label-md">
                        Trouver un logement
                        </span>

                        </a>



                        <a href="{{ route('favoris.index') }}"
                        class="rounded-lg flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container-high">

                        <span class="material-symbols-outlined">
                        favorite
                        </span>

                        <span class="font-label-md text-label-md">
                        Mes favoris
                        </span>

                        </a>



                        <a href="{{ route('visites.index') }}"
                        class="rounded-lg flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container-high">

                        <span class="material-symbols-outlined">
                        send
                        </span>

                        <span class="font-label-md text-label-md">
                        Mes demandes
                        </span>

                        </a>



                    @elseif(auth()->user()->isAdmin())


                        <!-- ADMIN -->

                        <a href="{{ route('admin.visites.index') }}"
                        class="rounded-lg flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container-high">

                        <span class="material-symbols-outlined">
                        admin_panel_settings
                        </span>

                        <span class="font-label-md text-label-md">
                        Administration
                        </span>

                        </a>


                    @endif



                @endauth


            </nav>

            <a href="{{ url('/aide') }}"
               class="mt-auto bg-secondary text-on-secondary px-md py-sm rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity active:scale-95 text-center">
                Besoin d'aide ?
            </a>

        </aside>

        {{-- ====================== CONTENU ====================== --}}
        <main class="flex-grow lg:ml-64 p-lg bg-background">
            @yield('content')
        </main>

    </div>

    {{-- ====================== FOOTER ====================== --}}
    <footer class="lg:ml-64 w-full  py-xl px-lg bg-surface-container-highest border-t border-outline-variant">
        <div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-4 gap-lg">

            <div class="col-span-1 md:col-span-1">
                <span class="font-headline-md text-headline-md text-primary font-bold">EtudiLog Douala</span>
                <p class="font-caption text-caption text-on-surface-variant mt-sm">© {{ date('Y') }} EtudiLog Douala. Tous droits réservés. Douala, Cameroun.</p>
            </div>

            <div>
                <h4 class="font-label-md text-label-md text-on-surface mb-md">Contact</h4>
                <ul class="flex flex-col gap-sm">
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors" href="#">686-650-063</a></li>
                </ul>
            </div>

        </div>
    </footer>

    @stack('scripts')
</body>
</html>

