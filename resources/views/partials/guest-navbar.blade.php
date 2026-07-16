<header class="sticky top-0 z-50 bg-surface-container-lowest border-b border-outline-variant shadow-sm">

    <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- Logo --}}
        <a href="{{ route('home') }}"
           class="text-2xl font-bold text-primary">

            EtudiLog Douala

        </a>

        {{-- Menu --}}
        <div class="hidden md:flex items-center gap-8">

            <a href="{{ route('home') }}"
               class="hover:text-primary">

                Accueil

            </a>

            <a href="{{ route('logements.index') }}"
               class="hover:text-primary">

                Logements

            </a>

            <a href="#"
               class="hover:text-primary">

                FAQ

            </a>

            <a href="#"
               class="hover:text-primary">

                Contact

            </a>

        </div>

        {{-- Boutons --}}
        <div class="flex items-center gap-3">

            @guest

                <a href="{{ route('login') }}"
                   class="px-4 py-2 rounded-lg hover:bg-surface-container">

                    Connexion

                </a>

                <a href="{{ route('register') }}"
                   class="px-4 py-2 rounded-lg border border-primary text-primary">

                    S'inscrire

                </a>

                <a href="{{ route('register',['role'=>'proprietaire']) }}"
                   class="px-5 py-2 rounded-full bg-secondary-container text-on-secondary-container font-semibold">

                    Devenir partenaire

                </a>

            @else

                @if(auth()->user()->isEtudiant())

                    <a href="{{ route('logements.index') }}"
                       class="bg-primary text-white px-5 py-2 rounded-full">

                        Explorer

                    </a>

                @elseif(auth()->user()->isProprietaire())

                    <a href="{{ route('proprietaire.dashboard') }}"
                       class="bg-primary text-white px-5 py-2 rounded-full">

                        Tableau de bord

                    </a>

                @else

                    <a href="{{ route('admin.dashboard') }}"
                       class="bg-primary text-white px-5 py-2 rounded-full">

                        Administration

                    </a>

                @endif

            @endguest

        </div>

    </nav>

</header>
