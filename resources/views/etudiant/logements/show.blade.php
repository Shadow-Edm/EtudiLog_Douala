@extends('layouts.app')

@section('title', $logement->titre)

@section('content')
@php
use Illuminate\Support\Facades\Storage;

$images = $logement->images;
@endphp


<div class="max-w-container-max mx-auto px-4 lg:px-6 py-8">

    {{-- Ici viendra tout le contenu --}}
    <nav class="flex items-center gap-2 mb-8 text-sm text-on-surface-variant">

        <a href="{{ route('logements.index') }}" class="hover:text-primary">
            Accueil
        </a>

        <span class="material-symbols-outlined text-base">
            chevron_right
        </span>

        <a href="{{ route('logements.index') }}"
        class="hover:text-primary">
            Logements
        </a>

        <span class="material-symbols-outlined text-base">
            chevron_right
        </span>

        <span class="text-primary font-semibold">

            {{ $logement->titre }}

        </span>

    </nav>

    <div
        x-data="{

            open:false,

            current:0,

            images:[
                @foreach($images as $image)
                    '{{ Storage::url($image->image) }}',
                @endforeach
            ]

        }"
    >
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- Galerie --}}
            <div class="lg:col-span-8">

                <div class="grid grid-cols-4 grid-rows-2 gap-3 h-[550px]">

                    <div class="col-span-3 row-span-2 rounded-2xl overflow-hidden relative">

                        <img
                            @click="open=true;current=0"
                            src="{{ $logement->coverImage
                                ? Storage::url($logement->coverImage->image)
                                : asset('images/no-image.jpg') }}"
                            class="w-full h-full object-cover cursor-pointer hover:scale-105 transition">

                        {{-- Badges --}}
                        <div class="absolute top-4 left-4 flex gap-2">

                            @if($logement->statut == 'disponible')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Disponible
                                </span>
                            @endif

                            @if($logement->est_verifie)
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                    Vérifié
                                </span>
                            @endif

                        </div>

                    </div>

                    @foreach($images->skip(1)->take(2) as $image)


                        <div class="rounded-2xl overflow-hidden">

                            <img
                                @click="open=true;current={{ $loop->iteration }}"
                                src="{{ Storage::url($image->image) }}"
                                class="w-full h-full object-cover cursor-pointer hover:opacity-80 transition">

                        </div>

                    @endforeach

                    @if($images->count() >= 4)

                        <div
                        class="rounded-2xl
                        overflow-hidden
                        relative">

                        <img

                        src="{{ Storage::url($images->get(3)->image) }}"

                        class="w-full h-full object-cover">

                            <div
                                @click="open=true;current=3"
                                class="absolute inset-0 bg-black/50 flex items-center justify-center text-white font-bold text-xl cursor-pointer hover:bg-black/60 transition">

                                +{{ $images->count()-3 }} photos

                            </div>

                        </div>

                    @endif


                </div>

                <hr class="my-10 border-outline-variant">

                <h2 class="text-3xl font-bold mb-5">

                    Description

                </h2>

                <p class="leading-8 text-on-surface-variant">

                    {{ $logement->description }}

                </p>

            </div>

            {{-- Carte de droite --}}
            <aside class="lg:col-span-4">

                <div class="sticky top-24 space-y-6">

                    {{-- Carte Prix --}}
                    <div class="bg-surface-container-lowest border border-outline-variant rounded-2xl shadow-sm p-6">

                        <div class="flex justify-between items-end mb-6">

                            <div>

                                <span class="text-sm text-on-surface-variant">
                                    Loyer mensuel
                                </span>

                                <h2 class="text-4xl font-extrabold text-primary mt-1">
                                    {{ number_format($logement->prix,0,',',' ') }}
                                </h2>

                            </div>

                            <span class="text-on-surface-variant">
                                FCFA / mois
                            </span>

                        </div>

                        <div class="space-y-3 mb-6">

                            <div class="flex justify-between border-b border-outline-variant pb-2">

                                <span>Caution</span>

                                <strong>

                                    {{ number_format($logement->prix * 2,0,',',' ') }}

                                    FCFA

                                </strong>

                            </div>

                            <div class="flex justify-between border-b border-outline-variant pb-2">

                                <span>Frais de dossier</span>

                                <strong>10 000 FCFA</strong>

                            </div>

                        </div>

                        <button
                            class="w-full bg-secondary text-white rounded-xl py-4 font-semibold flex justify-center items-center gap-2 hover:opacity-90 transition">

                            <span class="material-symbols-outlined">

                                chat

                            </span>

                            Contacter le propriétaire

                        </button>

                        <form
                            action="{{ route('visites.store', $logement) }}"
                            method="POST">

                            @csrf

                            <textarea
                                name="message"
                                rows="3"
                                class="w-full rounded-xl border"
                                placeholder="Message au gestionnaire (facultatif)">
                            </textarea>

                            <button
                                type="submit"
                                class="mt-4 w-full bg-primary text-white rounded-xl py-3">

                                Demander une visite

                            </button>

                        </form>

                    </div>

                    {{-- Carte propriétaire --}}
                    <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant shadow-sm p-5">

                        <div class="flex items-center gap-4">

                            <div
                                class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center">

                                <span class="material-symbols-outlined text-3xl text-primary">

                                    person

                                </span>

                            </div>

                            <div>

                                <p class="text-sm text-on-surface-variant">

                                    Propriétaire

                                </p>

                                <h3 class="font-bold text-lg">

                                    {{ $logement->proprietaire->name }}

                                </h3>

                                <p class="text-sm text-primary">

                                    ✔ Membre vérifié

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </aside>

        </div>

        <div
            x-show="open"
            x-transition
            class="fixed inset-0 bg-black/90 z-[9999] flex items-center justify-center"
            style="display:none;">

            {{-- Fermer --}}
            <button
                @click="open=false"
                class="absolute top-6 right-6 text-white">

                <span class="material-symbols-outlined text-5xl">

                    close

                </span>

            </button>

            {{-- Précédent --}}
            <button
                @click="current=(current-1+images.length)%images.length"
                class="absolute left-6 text-white">

                <span class="material-symbols-outlined text-6xl">

                    chevron_left

                </span>

            </button>

            {{-- Image --}}
            <img
                :src="images[current]"
                class="max-w-6xl max-h-[90vh] rounded-xl shadow-2xl">

            {{-- Suivant --}}
            <button
                @click="current=(current+1)%images.length"
                class="absolute right-6 text-white">

                <span class="material-symbols-outlined text-6xl">

                    chevron_right

                </span>

            </button>

        </div>

    </div>
    {{-- Titre --}}
    <div class="mt-8">

        <h1
            class="text-4xl
            font-bold
            text-primary">

            {{ $logement->titre }}

        </h1>

        <div class="flex flex-wrap gap-6 mt-4">

            <div class="flex items-center gap-2">

                <span class="material-symbols-outlined">

                    location_on

                </span>

                {{ $logement->adresse }}

            </div>

            <div class="flex items-center gap-2">

                <span class="material-symbols-outlined">

                    bed

                </span>

                {{ $logement->nombre_chambres }}

                chambre(s)

            </div>

            <div class="flex items-center gap-2">

                <span class="material-symbols-outlined">

                    shower

                </span>

                {{ $logement->nombre_douches }}

                douche(s)

            </div>

        </div>

    </div>

    {{-- Equipement --}}

    <div class="mt-10">

        <h2 class="text-3xl font-bold mb-6">

            Equipements

        </h2>

        <div class="flex flex-wrap gap-3">

            @if($logement->wifi)

                <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700">

                    📶 WiFi

                </span>

            @endif

            @if($logement->forage)

                <span class="px-4 py-2 rounded-full bg-cyan-100 text-cyan-700">

                    💧 Forage

                </span>

            @endif

            @if($logement->gardien)

                <span class="px-4 py-2 rounded-full bg-orange-100 text-orange-700">

                    🛡 Gardien

                </span>

            @endif

        </div>

    </div>

    <hr class="my-12 border-outline-variant">

<div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

    {{-- ================= Emplacement ================= --}}
    <div>

        <h2 class="text-3xl font-bold mb-6">

            Emplacement

        </h2>

        <div
            class="h-80 rounded-2xl overflow-hidden border border-outline-variant bg-surface-container">

            {{-- Remplacer plus tard par Google Maps --}}
            <img
                src="https://placehold.co/800x500/e8f0ff/00236f?text=Carte+du+quartier"
                class="w-full h-full object-cover">

        </div>

        <div class="mt-5 space-y-3">

            <div class="flex items-center gap-3">

                <span class="material-symbols-outlined text-primary">

                    location_on

                </span>

                <span>

                    {{ $logement->adresse }}

                </span>

            </div>

            @if($logement->etablissement_proche)

                <div class="flex items-center gap-3">

                    <span class="material-symbols-outlined text-primary">

                        school

                    </span>

                    <span>

                        {{ $logement->etablissement_proche }}

                    </span>

                </div>

            @endif

        </div>

    </div>

    {{-- ================= Proximité ================= --}}
    <div>

        <h2 class="text-3xl font-bold mb-6">

            Proximité académique

        </h2>

        <div class="space-y-5">

            @if($logement->etablissement_proche)

                <div
                    class="flex justify-between items-center p-5 rounded-2xl border-l-4 border-primary bg-surface-container-low">

                    <div class="flex items-center gap-4">

                        <div
                            class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">

                            <span class="material-symbols-outlined text-primary">

                                school

                            </span>

                        </div>

                        <div>

                            <h3 class="font-bold">

                                {{ $logement->etablissement_proche }}

                            </h3>

                            <p class="text-sm text-on-surface-variant">

                                Établissement d'enseignement supérieur

                            </p>

                        </div>

                    </div>

                    @if($logement->distance_ecole)

                        <span
                            class="bg-primary/10 text-primary px-4 py-2 rounded-full font-semibold">

                            {{ $logement->distance_ecole }} km

                        </span>

                    @endif

                </div>

            @endif

            {{-- Arrêt de bus --}}
            <div
                class="flex justify-between items-center p-5 rounded-2xl border-l-4 border-secondary bg-surface-container-low">

                <div class="flex items-center gap-4">

                    <div
                        class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center">

                        <span class="material-symbols-outlined text-secondary">

                            directions_bus

                        </span>

                    </div>

                    <div>

                        <h3 class="font-bold">

                            Transport public

                        </h3>

                        <p class="text-sm text-on-surface-variant">

                            Arrêt à proximité

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

@endsection
