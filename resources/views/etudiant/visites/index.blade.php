@extends('layouts.app')

@section('title','Mes demandes de visite')

@section('content')

<div class="max-w-7xl mx-auto py-8">

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-primary">
            Mes demandes de visite
        </h1>

        <p class="text-on-surface-variant mt-2">
            Consultez l'état de toutes vos demandes de visite.
        </p>

    </div>

    @forelse($visites as $visite)

        <div
            class="bg-white rounded-2xl shadow-sm border border-outline-variant p-6 mb-6">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="text-xl font-bold">

                        {{ $visite->logement->titre }}

                    </h2>

                    <p class="text-sm text-on-surface-variant">

                        {{ $visite->logement->adresse }}

                    </p>

                </div>

                {{-- Badge statut --}}

                @switch($visite->statut)

                    @case('en_attente')

                        <span
                            class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">

                            En attente

                        </span>

                    @break

                    @case('proposee')

                        <span
                            class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">

                            Date proposée

                        </span>

                    @break

                    @case('confirmee')

                        <span
                            class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                            Confirmée

                        </span>

                    @break

                    @case('annulee')

                        <span
                            class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                            Annulée

                        </span>

                    @break

                    @case('terminee')

                        <span
                            class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm font-semibold">

                            Terminée

                        </span>

                    @break

                @endswitch

            </div>

            <div class="grid md:grid-cols-2 gap-4 mt-6">

                <div>

                    <p class="text-sm text-on-surface-variant">

                        Date proposée

                    </p>

                    <p class="font-semibold">

                        {{ optional($visite->date_visite)->format('d/m/Y') ?? '--' }}

                    </p>

                </div>

                <div>

                    <p class="text-sm text-on-surface-variant">

                        Heure

                    </p>

                    <p class="font-semibold">

                        {{ $visite->heure_visite ?? '--' }}

                    </p>

                </div>

            </div>

            @if($visite->message)

                <div class="mt-5">

                    <h4 class="font-semibold mb-2">

                        Votre message

                    </h4>

                    <p class="text-on-surface-variant">

                        {{ $visite->message }}

                    </p>

                </div>

            @endif

            @if($visite->note_admin)

                <div
                    class="mt-5 bg-blue-50 border border-blue-200 rounded-xl p-4">

                    <h4 class="font-semibold text-blue-700">

                        Message de l'administration

                    </h4>

                    <p class="mt-2">

                        {{ $visite->note_admin }}

                    </p>

                </div>

            @endif

            <div class="flex gap-3 mt-6">

                <a
                    href="{{ route('visites.show',$visite) }}"
                    class="px-5 py-2 rounded-xl bg-primary text-white">

                    Voir

                </a>

                @if($visite->statut=='proposee')

                    <form
                        action="{{ route('visites.confirmer',$visite) }}"
                        method="POST">

                        @csrf
                        @method('PATCH')

                        <button
                            class="px-5 py-2 rounded-xl bg-green-600 text-white">

                            Confirmer

                        </button>

                    </form>

                @endif

                @if(in_array($visite->statut,['en_attente','proposee']))

                    <form
                        action="{{ route('visites.annuler',$visite) }}"
                        method="POST">

                        @csrf
                        @method('PATCH')

                        <button
                            class="px-5 py-2 rounded-xl bg-red-600 text-white">

                            Annuler

                        </button>

                    </form>

                @endif

                @if(in_array($visite->statut, ['en_attente', 'annulee']))

                    <form
                        action="{{ route('visites.destroy', $visite) }}"
                        method="POST"
                        onsubmit="return confirm('Voulez-vous vraiment supprimer cette demande ?')">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">

                            <span class="material-symbols-outlined align-middle mr-1">
                                delete
                            </span>

                            Supprimer

                        </button>

                    </form>

                @endif

            </div>

        </div>

    @empty

        <div
            class="bg-white rounded-2xl p-12 border border-outline-variant text-center">

            <span class="material-symbols-outlined text-6xl text-outline">

                calendar_month

            </span>

            <h2 class="mt-4 text-2xl font-bold">

                Aucune demande

            </h2>

            <p class="mt-2 text-on-surface-variant">

                Vous n'avez encore effectué aucune demande de visite.

            </p>

            <a
                href="{{ route('logements.index') }}"
                class="inline-block mt-6 px-6 py-3 bg-primary text-white rounded-xl">

                Trouver un logement

            </a>

        </div>

    @endforelse

    <div class="mt-8">

        {{ $visites->links() }}

    </div>

</div>

@endsection
