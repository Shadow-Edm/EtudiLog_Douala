@extends('layouts.guest')

@section('title', 'Connexion')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-orange-50">

    <div class="max-w-7xl mx-auto min-h-screen grid lg:grid-cols-2">

        {{-- Partie gauche --}}

        <section class="hidden lg:flex flex-col justify-center px-16">

            <span class="text-primary text-4xl font-bold">

                EtudiLog Douala

            </span>

            <h1 class="text-5xl font-extrabold mt-8 leading-tight">

                Trouvez votre logement étudiant en quelques clics.

            </h1>

            <p class="mt-6 text-gray-600 text-lg leading-relaxed">

                Découvrez des chambres, studios et appartements
                proches de votre université.

            </p>

            <div class="grid grid-cols-2 gap-5 mt-12">

                <div class="bg-white rounded-2xl shadow-lg p-6">

                    <h3 class="text-4xl font-bold text-primary">
                        500+
                    </h3>

                    <p class="text-gray-500">
                        Logements
                    </p>

                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">

                    <h3 class="text-4xl font-bold text-secondary">
                        300+
                    </h3>

                    <p class="text-gray-500">
                        Étudiants
                    </p>

                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">

                    <h3 class="text-4xl font-bold text-primary">
                        120
                    </h3>

                    <p class="text-gray-500">
                        Propriétaires
                    </p>

                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">

                    <h3 class="text-4xl font-bold text-secondary">
                        100%
                    </h3>

                    <p class="text-gray-500">
                        Sécurisé
                    </p>

                </div>

            </div>

        </section>

        {{-- Partie droite --}}

        <section class="flex items-center justify-center p-8">

            <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-10">
                <h2 class="text-3xl font-bold text-primary">

                Connexion

                </h2>

                <p class="text-gray-500 mt-2">

                Accédez à votre espace personnel.

                </p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mt-6">

                        <x-input-label
                            for="email"
                            value="Adresse e-mail"
                            class="mb-2"/>

                        <div class="relative">

                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                mail
                            </span>

                            <x-text-input
                                id="email"
                                name="email"
                                type="email"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username"
                                class="block w-full pl-12 pr-4 py-3 rounded-xl border-gray-300 focus:border-primary focus:ring-primary"/>

                        </div>

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"/>

                    </div>

                    <div class="mt-5">

                        <x-input-label
                            for="password"
                            value="Mot de passe"
                            class="mb-2"/>

                        <div class="relative">

                            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                lock
                            </span>

                            <x-text-input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="current-password"
                                class="block w-full pl-12 pr-4 py-3 rounded-xl border-gray-300 focus:border-primary focus:ring-primary"/>

                        </div>

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2" required/>

                    </div>

                    <div class="flex items-center justify-between mt-6">

                        <label class="inline-flex items-center">

                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded border-gray-300 text-primary focus:ring-primary">

                            <span class="ml-2 text-sm text-gray-600">

                                Se souvenir de moi

                            </span>

                        </label>

                    </div>


                    <x-primary-button
                        class="w-full justify-center gap-2 py-3 mt-8 rounded-xl">

                        <span class="material-symbols-outlined">
                            login
                        </span>

                        Se connecter

                    </x-primary-button>
                </form>

                @if (Route::has('password.request'))

                <div class="text-center mt-5">

                    <a
                        href="{{ route('password.request') }}"
                        class="text-primary hover:underline">

                        Mot de passe oublié ?

                    </a>

                </div>

            @endif

            <div class="mt-8 text-center">

                <p class="text-gray-600">

                    Vous n'avez pas encore de compte ?

                </p>

                <a
                    href="{{ route('register') }}"
                    class="font-semibold text-primary hover:underline">

                    Créer un compte étudiant

                </a>

            </div>

            <div class="mt-8 border-t pt-6">

                <h3 class="font-semibold text-gray-800">

                    Vous êtes propriétaire ?

                </h3>

                <p class="text-gray-500 text-sm mt-2">

                    Publiez vos logements
                    et trouvez rapidement des étudiants.

                </p>

                <a
                    href="{{ route('register', ['role' => 'proprietaire']) }}"
                    class="mt-5 flex items-center justify-center gap-2 rounded-xl bg-secondary py-3 text-white font-semibold hover:opacity-90 transition">

                    <span class="material-symbols-outlined">
                        apartment
                    </span>

                    Devenir partenaire

                </a>

            </div>

            </div>




        </section>



    </div>

</div>

@endsection
