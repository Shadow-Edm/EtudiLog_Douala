@extends('layouts.guest')

@section('title', 'Accueil')

@section('content')

<!-- ================= HERO ================= -->

<section class="relative overflow-hidden bg-gradient-to-br from-primary to-primary-container">

    <div class="absolute inset-0 bg-black/10"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-24">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Texte -->

            <div>

                <span
                    class="inline-flex items-center bg-white/20 text-white px-4 py-2 rounded-full text-sm font-medium">

                    🎓 Plateforme dédiée aux étudiants de Douala

                </span>

                <h1 class="text-5xl lg:text-6xl font-extrabold text-white mt-8 leading-tight">

                    Trouvez votre

                    <span class="text-secondary-fixed">

                        logement étudiant

                    </span>

                    en toute simplicité.

                </h1>

                <p class="text-white/90 text-xl mt-8 leading-relaxed">

                    EtudiLog Douala met en relation les étudiants et les propriétaires
                    afin de faciliter la recherche de logements fiables à proximité des
                    établissements d'enseignement supérieur.

                </p>

                <div class="flex flex-wrap gap-4 mt-10">

                    <a href="{{ route('logements.index') }}"
                        class="bg-secondary-container text-on-secondary-container px-8 py-4 rounded-full font-semibold hover:scale-105 transition">

                        Explorer les logements

                    </a>

                    @guest

                        <a href="{{ route('register') }}"
                            class="bg-white text-primary px-8 py-4 rounded-full font-semibold hover:scale-105 transition">

                            Créer un compte

                        </a>

                    @endguest

                </div>

            </div>

            <!-- Carte de recherche -->

            <div>

                <div class="bg-white rounded-3xl shadow-2xl p-8">

                    <h2 class="text-2xl font-bold text-primary mb-6">

                        Rechercher un logement

                    </h2>

                    <form action="{{ route('logements.index') }}" method="GET">

                        <div class="space-y-5">

                            <div>

                                <label class="block mb-2 font-medium">

                                    Quartier

                                </label>

                                <input
                                    type="text"
                                    name="quartier"
                                    placeholder="Ex : Logbessou"
                                    class="w-full rounded-xl border-gray-300">

                            </div>

                            <div>

                                <label class="block mb-2 font-medium">

                                    Prix maximum

                                </label>

                                <select
                                    name="prix"
                                    class="w-full rounded-xl border-gray-300">

                                    <option value="">Tous les prix</option>

                                    <option>25000</option>

                                    <option>35000</option>

                                    <option>50000</option>

                                    <option>75000</option>

                                </select>

                            </div>

                            <div>

                                <label class="block mb-2 font-medium">

                                    Type de logement

                                </label>

                                <select
                                    name="type"
                                    class="w-full rounded-xl border-gray-300">

                                    <option value="">Tous</option>

                                    <option>Chambre</option>

                                    <option>Studio</option>

                                    <option>Appartement</option>

                                </select>

                            </div>

                            <button
                                class="w-full bg-primary text-white py-4 rounded-xl font-semibold hover:opacity-90">

                                Rechercher

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= STATISTIQUES ================= -->

<section class="bg-white py-16">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="text-center">

                <h2 class="text-4xl font-extrabold text-primary">

                    {{ $logements->count() }}+

                </h2>

                <p class="mt-2 text-on-surface-variant">

                    Logements disponibles

                </p>

            </div>

            <div class="text-center">

                <h2 class="text-4xl font-extrabold text-primary">

                    300+

                </h2>

                <p class="mt-2 text-on-surface-variant">

                    Étudiants inscrits

                </p>

            </div>

            <div class="text-center">

                <h2 class="text-4xl font-extrabold text-primary">

                    50+

                </h2>

                <p class="mt-2 text-on-surface-variant">

                    Propriétaires

                </p>

            </div>

            <div class="text-center">

                <h2 class="text-4xl font-extrabold text-primary">

                    15

                </h2>

                <p class="mt-2 text-on-surface-variant">

                    Quartiers couverts

                </p>

            </div>

        </div>

    </div>

</section>

<!-- ================= POURQUOI ================= -->

<section class="py-24 bg-surface-container-low">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <h2 class="text-4xl font-bold">

                Pourquoi choisir EtudiLog Douala ?

            </h2>

            <p class="mt-4 text-on-surface-variant">

                Une plateforme pensée spécialement pour les étudiants.

            </p>

        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Carte -->

            <div class="bg-white rounded-3xl p-8 shadow">

                <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center mb-6">

                    🎓

                </div>

                <h3 class="text-xl font-bold mb-4">

                    Proche des campus

                </h3>

                <p class="text-on-surface-variant">

                    Trouvez rapidement un logement situé à proximité
                    de votre établissement.

                </p>

            </div>

            <div class="bg-white rounded-3xl p-8 shadow">

                <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mb-6">

                    ✅

                </div>

                <h3 class="text-xl font-bold mb-4">

                    Propriétaires vérifiés

                </h3>

                <p class="text-on-surface-variant">

                    Tous les logements publiés sont validés par notre équipe.

                </p>

            </div>

            <div class="bg-white rounded-3xl p-8 shadow">

                <div class="w-16 h-16 rounded-full bg-orange-100 flex items-center justify-center mb-6">

                    ⚡

                </div>

                <h3 class="text-xl font-bold mb-4">

                    Demande de visite rapide

                </h3>

                <p class="text-on-surface-variant">

                    Contactez le propriétaire et planifiez votre visite en quelques clics.

                </p>

            </div>

        </div>

    </div>

</section>

<section class="py-24">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-end mb-12">

            <div>

                <h2 class="text-4xl font-bold">

                    Logements récents

                </h2>

                <p class="text-on-surface-variant mt-2">

                    Découvrez les dernières annonces publiées.

                </p>

            </div>

            <a href="{{ route('logements.index') }}"
               class="text-primary font-semibold hover:underline">

                Voir tout →

            </a>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($logements as $logement)

                <div class="bg-white rounded-3xl overflow-hidden shadow hover:shadow-xl transition">

                    {{-- IMAGE --}}

                    <div class="relative">

                        <img
                            src="{{ $logement->coverImage
                                ? asset('storage/'.$logement->coverImage->image)
                                : 'https://placehold.co/600x400?text=EtudiLog' }}"
                            class="w-full h-60 object-cover"
                            alt="{{ $logement->titre }}">

                        <div class="absolute top-4 left-4">

                            <span class="bg-green-600 text-white text-xs px-3 py-1 rounded-full">

                                Disponible

                            </span>

                        </div>

                        @if($logement->est_verifie)

                            <div class="absolute top-4 right-4">

                                <span
                                    class="bg-white text-primary px-3 py-1 rounded-full text-xs font-semibold shadow">

                                    ✔ Vérifié

                                </span>

                            </div>

                            @endif

                    </div>

                    <div class="p-6">

                        <div class="flex justify-between items-start">

                            <h3 class="font-bold text-lg">

                                {{ $logement->titre }}

                            </h3>

                            <span class="font-bold text-primary">

                                {{ number_format($logement->prix,0,' ',' ') }}

                                FCFA

                            </span>



                        </div>


                        <p class="mt-3 text-gray-500">

                            📍 {{ $logement->adresse }}

                        </p>

                        @if($logement->etablissement_proche)

                            <p class="mt-2 text-sm text-gray-500">

                                🎓 {{ $logement->etablissement_proche }}

                                • {{ $logement->distance_ecole }} km

                            </p>

                            @endif

                        <p class="mt-2 text-sm text-gray-600">

                            {{ Str::limit($logement->description,90) }}

                        </p>

                        <div class="mt-5 flex flex-wrap gap-2">

                            <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">

                                {{ ucfirst($logement->type) }}

                            </span>

                            <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">

                                🛏 {{ $logement->nombre_chambres }}

                            </span>

                            <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">

                                🚿 {{ $logement->nombre_douches }}

                            </span>

                        </div>

                        <div class="mt-5 flex flex-wrap gap-2">

                            <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-semibold">
                                {{ ucfirst($logement->type) }}
                            </span>

                            @if($logement->wifi)
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">
                                    📶 Wi-Fi
                                </span>
                            @endif

                            @if($logement->forage)
                                <span class="bg-cyan-100 text-cyan-700 px-3 py-1 rounded-full text-xs">
                                    💧 Forage
                                </span>
                            @endif

                            @if($logement->gardien)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                    🛡 Gardien
                                </span>
                            @endif

                            @if($logement->est_verifie)
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    ✔ Vérifié
                                </span>
                            @endif

                        </div>

                        <div class="mt-6 flex justify-between items-center">

                            <a href="{{ route('logements.show',$logement) }}"
                                class="inline-flex items-center gap-2 bg-primary text-white px-5 py-2 rounded-full hover:bg-primary-container transition">

                                Voir le logement

                                <span class="material-symbols-outlined text-sm">

                                    arrow_forward

                                </span>

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-3 text-center py-20">

                    <h3 class="text-2xl font-semibold">

                        Aucun logement disponible.

                    </h3>

                </div>

            @endforelse

        </div>

    </div>

</section>


<!-- ================= COMMENT ÇA MARCHE ================= -->

<section class="py-24 bg-surface-container-low">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">

            <h2 class="text-4xl font-bold">

                Trouver un logement n'a jamais été aussi simple

            </h2>

            <p class="mt-4 text-on-surface-variant text-lg">

                En seulement trois étapes, trouvez un logement adapté à vos besoins.

            </p>

        </div>

        <div class="mt-20 grid lg:grid-cols-3 gap-10">

            <!-- Étape 1 -->

            <div class="bg-white rounded-3xl p-8 shadow-lg hover:-translate-y-2 transition">

                <div class="w-16 h-16 rounded-full bg-primary text-white flex items-center justify-center text-2xl font-bold">

                    1

                </div>

                <span class="material-symbols-outlined text-primary text-5xl mt-8">

                    search

                </span>

                <h3 class="text-2xl font-bold mt-6">

                    Recherchez

                </h3>

                <p class="mt-4 text-on-surface-variant">

                    Parcourez les logements disponibles selon votre budget,
                    votre quartier préféré ou votre établissement.

                </p>

            </div>

            <!-- Étape 2 -->

            <div class="bg-white rounded-3xl p-8 shadow-lg hover:-translate-y-2 transition">

                <div class="w-16 h-16 rounded-full bg-secondary text-white flex items-center justify-center text-2xl font-bold">

                    2

                </div>

                <span class="material-symbols-outlined text-secondary text-5xl mt-8">

                    event_available

                </span>

                <h3 class="text-2xl font-bold mt-6">

                    Planifiez une visite

                </h3>

                <p class="mt-4 text-on-surface-variant">

                    Envoyez une demande de visite.
                    L'administration fixe un rendez-vous entre vous et le propriétaire.

                </p>

            </div>

            <!-- Étape 3 -->

            <div class="bg-white rounded-3xl p-8 shadow-lg hover:-translate-y-2 transition">

                <div class="w-16 h-16 rounded-full bg-green-600 text-white flex items-center justify-center text-2xl font-bold">

                    3

                </div>

                <span class="material-symbols-outlined text-green-600 text-5xl mt-8">

                    home

                </span>

                <h3 class="text-2xl font-bold mt-6">

                    Emménagez

                </h3>

                <p class="mt-4 text-on-surface-variant">

                    Après la visite et votre accord avec le propriétaire,
                    vous pouvez louer votre nouveau logement en toute confiance.

                </p>

            </div>

        </div>

    </div>

</section>


<!-- ================= POURQUOI NOUS FAIRE CONFIANCE ================= -->

<section class="py-24 bg-background">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <h2 class="text-4xl font-bold text-primary">
                Pourquoi choisir EtudiLog Douala ?
            </h2>

            <p class="mt-4 text-lg text-on-surface-variant max-w-3xl mx-auto">
                Nous facilitons la recherche de logement étudiant grâce à une plateforme
                fiable, moderne et pensée pour les étudiants comme pour les propriétaires.
            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Carte 1 -->
            <div class="bg-white rounded-2xl shadow-md p-8 text-center hover:shadow-xl transition">

                <div class="w-16 h-16 mx-auto rounded-full bg-primary/10 flex items-center justify-center">

                    <span class="material-symbols-outlined text-primary text-4xl">
                        verified
                    </span>

                </div>

                <h3 class="font-bold text-xl mt-6">
                    Logements vérifiés
                </h3>

                <p class="mt-4 text-on-surface-variant">
                    Chaque annonce est contrôlée afin de limiter les fausses publications
                    et améliorer la confiance.
                </p>

            </div>

            <!-- Carte 2 -->
            <div class="bg-white rounded-2xl shadow-md p-8 text-center hover:shadow-xl transition">

                <div class="w-16 h-16 mx-auto rounded-full bg-green-100 flex items-center justify-center">

                    <span class="material-symbols-outlined text-green-600 text-4xl">
                        event_available
                    </span>

                </div>

                <h3 class="font-bold text-xl mt-6">
                    Visites organisées
                </h3>

                <p class="mt-4 text-on-surface-variant">
                    Les rendez-vous sont planifiés via la plateforme afin de simplifier les
                    échanges entre étudiants et propriétaires.
                </p>

            </div>

            <!-- Carte 3 -->
            <div class="bg-white rounded-2xl shadow-md p-8 text-center hover:shadow-xl transition">

                <div class="w-16 h-16 mx-auto rounded-full bg-orange-100 flex items-center justify-center">

                    <span class="material-symbols-outlined text-orange-600 text-4xl">
                        shield
                    </span>

                </div>

                <h3 class="font-bold text-xl mt-6">
                    Plateforme sécurisée
                </h3>

                <p class="mt-4 text-on-surface-variant">
                    Les comptes utilisateurs sont authentifiés afin de sécuriser les
                    échanges entre toutes les parties.
                </p>

            </div>

            <!-- Carte 4 -->
            <div class="bg-white rounded-2xl shadow-md p-8 text-center hover:shadow-xl transition">

                <div class="w-16 h-16 mx-auto rounded-full bg-purple-100 flex items-center justify-center">

                    <span class="material-symbols-outlined text-purple-600 text-4xl">
                        support_agent
                    </span>

                </div>

                <h3 class="font-bold text-xl mt-6">
                    Assistance disponible
                </h3>

                <p class="mt-4 text-on-surface-variant">
                    Notre équipe accompagne les étudiants et les propriétaires durant tout
                    le processus.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- ================= DEVENIR PARTENAIRE ================= -->

<section class="py-24">

    <div class="max-w-7xl mx-auto px-6">

        <div class="bg-primary rounded-3xl overflow-hidden shadow-2xl">

            <div class="grid lg:grid-cols-2 items-center">

                <!-- Texte -->

                <div class="p-10 lg:p-16">

                    <span class="inline-block px-4 py-2 rounded-full bg-white/20 text-white text-sm font-semibold">
                        Propriétaires
                    </span>

                    <h2 class="text-4xl font-bold text-white mt-6">
                        Publiez vos logements et trouvez rapidement des étudiants sérieux.
                    </h2>

                    <p class="mt-6 text-white/90 text-lg leading-relaxed">

                        Rejoignez EtudiLog Douala et donnez de la visibilité à vos
                        annonces auprès de milliers d'étudiants à la recherche
                        d'un logement proche de leur établissement.

                    </p>

                    <div class="grid sm:grid-cols-2 gap-4 mt-10">

                        <div class="flex items-center gap-3">

                            <span class="material-symbols-outlined text-green-300">
                                check_circle
                            </span>

                            <span class="text-white">
                                Publication rapide
                            </span>

                        </div>

                        <div class="flex items-center gap-3">

                            <span class="material-symbols-outlined text-green-300">
                                check_circle
                            </span>

                            <span class="text-white">
                                Étudiants vérifiés
                            </span>

                        </div>

                        <div class="flex items-center gap-3">

                            <span class="material-symbols-outlined text-green-300">
                                check_circle
                            </span>

                            <span class="text-white">
                                Gestion simplifiée
                            </span>

                        </div>

                        <div class="flex items-center gap-3">

                            <span class="material-symbols-outlined text-green-300">
                                check_circle
                            </span>

                            <span class="text-white">
                                Plus de visibilité
                            </span>

                        </div>

                    </div>

                    <div class="mt-10 flex flex-wrap gap-4">

                        <a href="{{ route('register') }}?role=proprietaire"
                           class="bg-secondary-container text-on-secondary-container px-8 py-4 rounded-full font-semibold hover:scale-105 transition">

                            Devenir partenaire

                        </a>

                        <a href="#"
                           class="border border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-primary transition">

                            En savoir plus

                        </a>

                    </div>

                </div>

                <!-- Illustration -->

                <div class="hidden lg:flex justify-center p-12">

                    <div class="bg-white rounded-3xl p-8 shadow-xl w-96">

                        <div class="flex items-center gap-4">

                            <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center">

                                <span class="material-symbols-outlined text-white text-4xl">

                                    apartment

                                </span>

                            </div>

                            <div>

                                <h3 class="font-bold text-xl">

                                    Vos annonces

                                </h3>

                                <p class="text-gray-500">

                                    Gérées facilement

                                </p>

                            </div>

                        </div>

                        <div class="mt-8 space-y-5">

                            <div class="flex justify-between">

                                <span>Logements publiés</span>

                                <strong>12</strong>

                            </div>

                            <div class="flex justify-between">

                                <span>Demandes reçues</span>

                                <strong>46</strong>

                            </div>

                            <div class="flex justify-between">

                                <span>Visites confirmées</span>

                                <strong>18</strong>

                            </div>

                            <div class="flex justify-between">

                                <span>Taux de satisfaction</span>

                                <strong class="text-green-600">

                                    98%

                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


@endsection
