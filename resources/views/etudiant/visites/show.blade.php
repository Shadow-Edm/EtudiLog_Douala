@extends('layouts.app')

@section('title','Détails de la demande')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Titre --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-primary">
            Demande de visite
        </h1>

        <p class="text-on-surface-variant mt-2">
            Consultez et gérez cette demande.
        </p>

    </div>



    <div class="grid lg:grid-cols-3 gap-8">

        {{-- ========================================= --}}
        {{-- COLONNE GAUCHE --}}
        {{-- ========================================= --}}

        <div class="lg:col-span-2 space-y-8">

            {{-- ETUDIANT --}}
            <div class="bg-white rounded-2xl shadow border p-6">

                <h2 class="text-xl font-bold mb-5">
                    👨‍🎓 Étudiant
                </h2>

                <div class="grid md:grid-cols-2 gap-5">

                    <div>

                        <p class="text-sm text-gray-500">
                            Nom
                        </p>

                        <p class="font-semibold">
                            {{ $visite->etudiant->name }}
                        </p>

                    </div>

                    <div>

                        <p class="text-sm text-gray-500">
                            Email
                        </p>

                        <p class="font-semibold">
                            {{ $visite->etudiant->email }}
                        </p>

                    </div>

                    <div>

                        <p class="text-sm text-gray-500">
                            Téléphone
                        </p>

                        <p class="font-semibold">
                            {{ $visite->etudiant->telephone ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>



            {{-- LOGEMENT --}}
            <div class="bg-white rounded-2xl shadow border overflow-hidden">

                @php

                    use Illuminate\Support\Facades\Storage;

                    $image = $visite->logement->coverImage
                        ? Storage::url($visite->logement->coverImage->image)
                        : asset('images/no-image.jpg');

                @endphp

                <img
                    src="{{ $image }}"
                    class="h-72 w-full object-cover">

                <div class="p-6">

                    <h2 class="text-2xl font-bold">

                        {{ $visite->logement->titre }}

                    </h2>

                    <p class="text-gray-500 mt-2">

                        📍 {{ $visite->logement->adresse }}

                    </p>

                    <p class="text-primary font-bold text-2xl mt-4">

                        {{ number_format($visite->logement->prix,0,',',' ') }}

                        FCFA / mois

                    </p>

                    <div class="mt-6">

                        <p class="text-sm text-gray-500">

                            Propriétaire

                        </p>

                        <p class="font-semibold">

                            {{ $visite->logement->proprietaire->name }}

                        </p>

                    </div>

                </div>

            </div>



            {{-- MESSAGE --}}
            <div class="bg-white rounded-2xl shadow border p-6">

                <h2 class="font-bold text-xl mb-4">

                    💬 Message

                </h2>

                <p class="leading-7">

                    {{ $visite->message ?: 'Aucun message.' }}

                </p>

            </div>

        </div>



        {{-- ========================================= --}}
        {{-- COLONNE DROITE --}}
        {{-- ========================================= --}}

        <div class="space-y-6">

            {{-- STATUT --}}
            <div class="bg-white rounded-2xl shadow border p-6">

                <h2 class="font-bold mb-5">

                    Statut

                </h2>

                @php

                    $colors = [

                        'en_attente'=>'bg-yellow-100 text-yellow-700',

                        'proposee'=>'bg-blue-100 text-blue-700',

                        'confirmee'=>'bg-green-100 text-green-700',

                        'annulee'=>'bg-red-100 text-red-700',

                        'terminee'=>'bg-gray-100 text-gray-700',

                    ];

                @endphp

                <span class="px-4 py-2 rounded-full font-semibold {{ $colors[$visite->statut] }}">

                    {{ ucfirst(str_replace('_',' ',$visite->statut)) }}

                </span>

            </div>



            {{-- EN ATTENTE --}}
            @if($visite->statut=='en_attente')

            <div class="bg-white rounded-2xl shadow border p-6">

                <h2 class="font-bold mb-5">

                    📅 Proposer une visite

                </h2>

                <form
                    method="POST"
                    action="{{ route('admin.visites.proposer',$visite) }}">

                    @csrf

                    @method('PATCH')

                    <label class="block mb-2">

                        Date

                    </label>

                    <input
                        type="date"
                        name="date_visite"
                        class="w-full border rounded-lg p-3 mb-4"
                        required>

                    <label class="block mb-2">

                        Heure

                    </label>

                    <input
                        type="time"
                        name="heure_visite"
                        class="w-full border rounded-lg p-3 mb-4"
                        required>

                    <label class="block mb-2">

                        Note

                    </label>

                    <textarea
                        name="note_admin"
                        rows="4"
                        class="w-full border rounded-lg p-3 mb-5"></textarea>

                    <button
                        class="w-full bg-primary text-white rounded-xl py-3">

                        Proposer la visite

                    </button>

                </form>

            </div>

            @endif



            {{-- PROPOSEE --}}
            @if($visite->statut=='proposee')

            <div class="bg-white rounded-2xl shadow border p-6">

                <h2 class="font-bold mb-5">

                    Proposition envoyée

                </h2>

                <p>

                    <strong>Date :</strong>

                    {{ \Carbon\Carbon::parse($visite->date_visite)->format('d/m/Y') }}

                </p>

                <p class="mt-2">

                    <strong>Heure :</strong>

                    {{ substr($visite->heure_visite,0,5) }}

                </p>

                <p class="mt-4">

                    {{ $visite->note_admin }}

                </p>

                <a
                    href="#modifier"
                    class="block text-center mt-6 bg-blue-600 text-white rounded-xl py-3">

                    Modifier la proposition

                </a>

            </div>

            @endif



            {{-- CONFIRMEE --}}
            @if($visite->statut=='confirmee')

            <div class="bg-white rounded-2xl shadow border p-6">

                <div class="text-green-600 font-bold text-xl mb-5">

                    ✓ Visite confirmée

                </div>

                <p>

                    <strong>Date :</strong>

                    {{ \Carbon\Carbon::parse($visite->date_visite)->format('d/m/Y') }}

                </p>

                <p class="mt-2">

                    <strong>Heure :</strong>

                    {{ substr($visite->heure_visite,0,5) }}

                </p>

                <p class="mt-5">

                    {{ $visite->note_admin }}

                </p>

                <form
                    method="POST"
                    action="{{ route('admin.visites.terminer',$visite) }}"
                    class="mt-6">

                    @csrf

                    @method('PATCH')

                    <button
                        class="w-full bg-green-600 text-white rounded-xl py-3">

                        Terminer la visite

                    </button>

                </form>

            </div>

            @endif

        </div>
        <div class="bg-white rounded-2xl shadow border p-6">

            <h2 class="font-bold text-lg mb-6">
                📜 Historique
            </h2>

            <div class="relative border-l-2 border-gray-300 ml-3">

                {{-- Création --}}
                <div class="relative pl-8 pb-8">

                    <span
                        class="absolute -left-[11px] w-5 h-5 rounded-full bg-yellow-500">
                    </span>

                    <h3 class="font-semibold">
                        Demande créée
                    </h3>

                    <p class="text-sm text-gray-500">

                        {{ $visite->created_at->format('d/m/Y à H:i') }}

                    </p>

                </div>



                {{-- Proposition --}}
                @if(in_array($visite->statut,['proposee','confirmee','terminee']))

                <div class="relative pl-8 pb-8">

                    <span
                        class="absolute -left-[11px] w-5 h-5 rounded-full bg-blue-500">
                    </span>

                    <h3 class="font-semibold">
                        Proposition envoyée
                    </h3>

                    <p class="text-sm text-gray-500">

                        {{ optional($visite->updated_at)->format('d/m/Y à H:i') }}

                    </p>

                    <div class="mt-2 text-sm">

                        <p>

                            📅 {{ \Carbon\Carbon::parse($visite->date_visite)->format('d/m/Y') }}

                        </p>

                        <p>

                            🕒 {{ substr($visite->heure_visite,0,5) }}

                        </p>

                    </div>

                </div>

                @endif



                {{-- Confirmation --}}
                @if(in_array($visite->statut,['confirmee','terminee']))

                <div class="relative pl-8 pb-8">

                    <span
                        class="absolute -left-[11px] w-5 h-5 rounded-full bg-green-500">
                    </span>

                    <h3 class="font-semibold">

                        Visite confirmée

                    </h3>

                    <p class="text-sm text-gray-500">

                        {{ optional($visite->confirmee_at)?->format('d/m/Y à H:i') }}

                    </p>

                </div>

                @endif



                {{-- Annulation --}}
                @if($visite->statut=='annulee')

                <div class="relative pl-8 pb-8">

                    <span
                        class="absolute -left-[11px] w-5 h-5 rounded-full bg-red-500">
                    </span>

                    <h3 class="font-semibold">

                        Demande annulée

                    </h3>

                    <p class="text-sm text-gray-500">

                        {{ $visite->updated_at->format('d/m/Y à H:i') }}

                    </p>

                </div>

                @endif



                {{-- Terminée --}}
                @if($visite->statut=='terminee')

                <div class="relative pl-8">

                    <span
                        class="absolute -left-[11px] w-5 h-5 rounded-full bg-gray-600">
                    </span>

                    <h3 class="font-semibold">

                        Visite terminée

                    </h3>

                    <p class="text-sm text-gray-500">

                        {{ $visite->updated_at->format('d/m/Y à H:i') }}

                    </p>

                </div>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection
