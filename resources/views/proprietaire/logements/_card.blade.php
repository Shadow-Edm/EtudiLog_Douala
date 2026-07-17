@php

use Illuminate\Support\Facades\Storage;

$image = $logement->coverImage
        ? Storage::url($logement->coverImage->image)
        : asset('images/no-image.jpg');

@endphp

<div class="bg-white rounded-2xl border overflow-hidden shadow hover:shadow-xl transition">

    <div class="relative">

        <img
            src="{{ $image }}"
            class="w-full aspect-[4/3] object-cover">

        <div class="absolute top-4 left-4 flex gap-2">

            <span
                class="px-3 py-1 rounded-full text-xs font-semibold
                {{ $logement->statut == 'disponible'
                    ? 'bg-green-100 text-green-700'
                    : 'bg-red-100 text-red-700' }}">

                {{ ucfirst($logement->statut) }}

            </span>

            @if($logement->est_verifie)

                <span class="px-3 py-1 rounded-full bg-blue-500 text-white text-xs">

                    Vérifié

                </span>

            @endif

        </div>

    </div>

    <div class="p-5">

        <div class="flex justify-between">

            <div>

                <h2 class="font-bold text-xl">

                    {{ $logement->titre }}

                </h2>

                <p class="text-gray-500">

                    {{ $logement->adresse }}

                </p>

            </div>

            <div class="text-right">

                <h3 class="font-bold text-primary text-2xl">

                    {{ number_format($logement->prix) }}

                </h3>

                <span class="text-sm">

                    FCFA

                </span>

            </div>

        </div>

        <div class="grid grid-cols-3 gap-3 py-5 border-y mt-5">

            <div class="text-center">

                🛏

                <p>{{ $logement->nombre_chambres }}</p>

            </div>

            <div class="text-center">

                🚿

                <p>{{ $logement->nombre_douches }}</p>

            </div>

            <div class="text-center">

                📐

                <p>{{ $logement->superficie ?? '--' }}</p>

            </div>

        </div>

        <div class="flex flex-wrap gap-2 mt-5">

            @if($logement->wifi)

                <span class="px-3 py-1 rounded-full bg-blue-100 text-xs">

                    📶 Wifi

                </span>

            @endif

            @if($logement->forage)

                <span class="px-3 py-1 rounded-full bg-cyan-100 text-xs">

                    💧 Forage

                </span>

            @endif

            @if($logement->gardien)

                <span class="px-3 py-1 rounded-full bg-orange-100 text-xs">

                    🛡 Gardien

                </span>

            @endif

        </div>

        <div class="mt-5 flex items-center justify-between text-sm">

            <div class="flex items-center gap-2 text-on-surface-variant">

                <span class="material-symbols-outlined text-base">
                    visibility
                </span>

                <span>

                    {{ number_format($logement->vues) }} vue(s)

                </span>

            </div>

        </div>

        <div class="grid grid-cols-2 gap-3 mt-6">

            <a
                href="{{ route('proprietaire.logements.edit',$logement) }}"
                class="bg-primary text-white text-center py-3 rounded-xl">

                Modifier

            </a>

            <form
                action="{{ route('proprietaire.logements.toggle-status', $logement) }}"
                method="POST">

                @csrf
                @method('PATCH')

                <button
                    class="w-full rounded-xl py-3 font-semibold
                    {{ $logement->statut == 'disponible'
                        ? 'bg-orange-500 hover:bg-orange-600 text-white'
                        : 'bg-green-600 hover:bg-green-700 text-white' }}">

                    @if($logement->statut == 'disponible')

                        Rendre indisponible

                    @else

                        Rendre disponible

                    @endif

                </button>

            </form>

        </div>

        <form
            action="{{ route('proprietaire.logements.destroy',$logement) }}"
            method="POST"
            class="mt-3">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Supprimer définitivement cette annonce ?')"
                class="w-full py-3 rounded-xl bg-red-600 text-white">

                Supprimer

            </button>

        </form>

    </div>

</div>
