<header
    class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200 shadow-sm">

    <div class="h-16 px-6 flex items-center justify-between">

        {{-- ====================== LOGO ====================== --}}

        <div class="flex items-center gap-4">

            {{-- Bouton mobile --}}
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="lg:hidden">

                <span class="material-symbols-outlined">

                    menu

                </span>

            </button>

            <a
                href="{{ url('/') }}"
                class="text-2xl font-bold text-primary">

                EtudiLog Douala

            </a>

        </div>





        {{-- ====================== RECHERCHE ====================== --}}

        @auth

            @if(auth()->user()->isAdmin() || auth()->user()->isManager())

                <div class="hidden lg:block w-full max-w-xl mx-8">

                    <form>

                        <div class="relative">

                            <span
                                class="material-symbols-outlined absolute left-3 top-3 text-slate-400">

                                search

                            </span>

                            <input
                                type="text"
                                placeholder="Rechercher un logement, un étudiant, un propriétaire..."
                                class="w-full pl-11 pr-4 py-2 rounded-xl border border-slate-300 focus:ring-2 focus:ring-primary">

                        </div>

                    </form>

                </div>

            @endif

        @endauth





        {{-- ====================== PARTIE DROITE ====================== --}}

        <div class="flex items-center gap-5">

            @auth

                {{-- ================= Notifications ================= --}}

                <button
                    class="relative">

                    <span
                        class="material-symbols-outlined">

                        notifications

                    </span>

                    <span
                        class="absolute
                        -top-1
                        -right-1
                        w-5
                        h-5
                        rounded-full
                        bg-red-600
                        text-white
                        text-xs
                        flex
                        items-center
                        justify-center">

                        0

                    </span>

                </button>






                {{-- ====================== PROFIL ====================== --}}

                <div
                    x-data="{open:false}"
                    class="relative">

                    <button

                        @click="open=!open"

                        class="flex items-center gap-3">

                        <img

                            src="{{ auth()->user()->photo_profil_url }}"

                            class="w-10 h-10 rounded-full object-cover">

                        <div
                            class="hidden md:block text-left">

                            <p class="font-semibold">

                                {{ auth()->user()->name }}

                            </p>

                            <p class="text-xs text-slate-500">

                                {{ ucfirst(auth()->user()->role) }}

                            </p>

                        </div>

                        <span
                            class="material-symbols-outlined">

                            expand_more

                        </span>

                    </button>






                    {{-- ================= MENU ================= --}}

                    <div

                        x-show="open"

                        @click.outside="open=false"

                        x-transition

                        class="absolute right-0 mt-3 w-72 bg-white rounded-xl shadow-xl border overflow-hidden">




                        <div class="p-5 border-b">

                            <div class="flex gap-4">

                                <img

                                    src="{{ auth()->user()->photo_profil_url }}"

                                    class="w-14 h-14 rounded-full">

                                <div>

                                    <h3 class="font-bold">

                                        {{ auth()->user()->name }}

                                    </h3>

                                    <p class="text-sm text-slate-500">

                                        {{ auth()->user()->email }}

                                    </p>





                                    {{-- Statut du compte --}}

                                    @if(auth()->user()->is_suspended)

                                        <span
                                            class="text-red-600 text-sm">

                                            ● Suspendu

                                        </span>

                                    @elseif(auth()->user()->is_verified)

                                        <span
                                            class="text-green-600 text-sm">

                                            ● Vérifié

                                        </span>

                                    @else

                                        <span
                                            class="text-yellow-600 text-sm">

                                            ● En attente

                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>







                        <a

                            href="#"

                            class="flex items-center gap-3 px-5 py-3 hover:bg-slate-100">

                            <span
                                class="material-symbols-outlined">

                                person

                            </span>

                            Mon profil

                        </a>





                        <a

                            href="#"

                            class="flex items-center gap-3 px-5 py-3 hover:bg-slate-100">

                            <span
                                class="material-symbols-outlined">

                                edit

                            </span>

                            Modifier le profil

                        </a>






                        <a

                            href="#"

                            class="flex items-center gap-3 px-5 py-3 hover:bg-slate-100">

                            <span
                                class="material-symbols-outlined">

                                lock

                            </span>

                            Changer le mot de passe

                        </a>






                        <form

                            method="POST"

                            action="{{ route('logout') }}">

                            @csrf

                            <button

                                class="w-full text-left flex items-center gap-3 px-5 py-3 hover:bg-red-50 text-red-600">

                                <span
                                    class="material-symbols-outlined">

                                    logout

                                </span>

                                Déconnexion

                            </button>

                        </form>

                    </div>

                </div>

            @else

                <a

                    href="{{ route('login') }}"

                    class="bg-primary text-white px-5 py-2 rounded-xl">

                    Connexion

                </a>

            @endauth

        </div>

    </div>

</header>
