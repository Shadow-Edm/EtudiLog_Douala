@extends('layouts.app')

@section('title','Mes favoris')

@section('content')

<div class="max-w-7xl mx-auto py-8">

    <h1 class="text-3xl font-bold mb-8">

        Mes favoris

    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @forelse($favoris as $logement)

            @include(
                'etudiant.logements._card',
                compact('logement')
            )

        @empty

            <p>Aucun favori.</p>

        @endforelse

    </div>

    <div class="mt-8">

        {{ $favoris->links() }}

    </div>

</div>

@endsection
