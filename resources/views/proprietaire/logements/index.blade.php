@extends('layouts.app')

@section('title','Mes annonces')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-8">

        <div>

            <h1 class="text-3xl font-bold text-primary">
                Mes annonces
            </h1>

            <p class="text-on-surface-variant">
                Gérez facilement tous vos logements.
            </p>

        </div>

        <a
            href="{{ route('proprietaire.logements.create') }}"
            class="bg-primary text-white px-6 py-3 rounded-xl shadow hover:opacity-90">

            + Ajouter un logement

        </a>

    </div>

    @include('proprietaire.logements._stats')

    <div class="grid gap-8 sm:grid-cols-2 xl:grid-cols-3 mt-10">

        @forelse($logements as $logement)

            @include('proprietaire.logements._card')

        @empty

            <div class="col-span-full bg-white rounded-xl border p-16 text-center">

                <h2 class="text-2xl font-bold">

                    Aucune annonce

                </h2>

                <p class="mt-2 text-gray-500">

                    Commencez par publier votre premier logement.

                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection
